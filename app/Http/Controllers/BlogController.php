<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Click;
use App\Models\Career;
use App\Models\Category;
use App\Mail\VerifyEmail;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{

    public function home() {
        if (Auth::id()) {
            $post = Post::where('post_status', '=', 'active')->orderBy('created_at', 'desc')->paginate(3);

            $category = Category::all();

            $ten = Post::where('post_status', '=', 'active')->latest()->take(4)->get();

            $user = User::get();

            $users = User::count();

            $blogs = Post::count();

            $usertype = Auth::user()->usertype;

            switch ($usertype) {
                case 'user':
                    return view('welcome', compact('post', 'category', 'ten'));
                case 'admin':
                    return view('admin.admin', compact('user','users', 'blogs'));
                case 'editor':
                    return view('welcome', compact('post', 'category', 'ten'));
                default:
                    return redirect()->back();
            }
        }
    }

    // Read post
    public function read_post($id) {
        $post = Post::find($id);

        $otherPosts = Post::where('user_id', $post->user_id)
                            ->where('id', '!=', $id)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('home.read_post',compact('post', 'otherPosts'));
    }

    // User profile
    public function profiles() {
        $user = Auth::user();

        $userid = $user->id;

        $data = Post::where('user_id', '=', $userid)->get();

        return view('user.profiles', compact('data', 'user'));
    }

    // User show post
    public function welcome() {
        $post = Post::where('post_status', '=', 'active')->orderBy('created_at', 'desc')->paginate(3);

        $category = Category::all();

        $ten = Post::where('post_status', '=', 'active')->latest()->take(4)->get();

        return view('welcome', compact('post', 'category', 'ten'));
    }

    // User Create postpage
    public function create_post(){
        $category = Category::all();
        return view('home.create_post', compact('category'));
    }

    // User post
    public function user_post(Request $request) {
        $validate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'category_id' => ['required', 'exists:categories,id'], // Use category_id
            'image' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:20480'],
            'video' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:20480'],
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        //Image
        $image = $request->image;
        $imagename = null;

        if($image) {
            $imagename = time() . ' . ' . $image->getClientOriginalExtension();
            $image->move('postimage', $imagename);

            $post->image = $imagename;
        }

        // Video
        $video = $request->video;
        $imagename = null;

        if($video) {
            $videoname = time() . ' . ' . $video->getClientOriginalExtension();
            $video->move('postvideo', $videoname);

            $post->video = $videoname;
        }

        // For User
        $user = Auth::user();

        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post->user_id = $user_id;
        $post->name = $name;
        $post->usertype = $usertype;
        $post->post_status = 'pending';

        $post->save();

        Alert::success('Success!', 'Post added successfully');

        return redirect()->back();
    }

    // User delete post
    public function user_post_del($id) {
        $data = Post::find($id)->delete();

        return redirect()->back()->with('success', 'Post deleted successfully');
    }

    // User update post
    public function user_post_edit($id) {
        $data = Post::find($id);

        $categories = Category::all();

        return view('home.edit_post', compact('data', 'categories'));
    }

    public function user_post_update(Request $request, $id) {
        $validate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'category_id' => ['required', 'exists:categories,id'], // Use category_id
            'image' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            'video' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
        ]);

        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->category_id = $request->category_id;

        //Image
        $image = $request->image;

        if($image) {
            $imagename = time() . ' . ' . $image->getClientOriginalExtension();
            $image->move('postimage', $imagename);

            $data->image = $imagename;
        }

        // Video
        $video = $request->video;

        if($video) {
            $videoname = time() . ' . ' . $video->getClientOriginalExtension();
            $video->move('postvideo', $videoname);

            $data->video = $videoname;
        }

        // For User
        // $user = Auth::user();

        // $user_id = $user->id;
        // $name = $user->name;
        // $usertype = $user->usertype;

        // $post->user_id = $user_id;
        // $post->name = $name;
        // $post->usertype = $usertype;
        // $post->post_status = 'pending';

        $data->save();

        Alert::success('Success!', 'Post updated successfully');

        return redirect()->back();
    }

    // public function edit_user($id) {
    //    $userId = User::find($id);
    //     return view('user.profiles',['userId' => $id]);
    // }

    // Picture Update
    public function update_picture(Request $request) {
        $validate = $request->validate([
            'photo' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:2048'],
        ]);

        $user = Auth::user();

        $photoPath = $request->file('photo')->storeAs('photos', time() . '.' . $request->file('photo')->getClientOriginalExtension(), 'public');

        // Update the user's photo path in the database
        $user->photo = $photoPath;
        $user->save();

        // Optionally, redirect back with a success message
        return redirect()->back();

    }

    // Career
    public function career(Request $request)
    {
        // Start building the query
        $query = Career::where('is_active', true)->with('tags')->latest();

        // Apply search filter
        if ($request->has('s')) {
            $searchQuery = trim($request->get('s'));

            $query->where(function ($builder) use ($searchQuery) {
                $builder
                    ->orWhere('title', 'like', "%{$searchQuery}%")
                    ->orWhere('company', 'like', "%{$searchQuery}%")
                    ->orWhere('location', 'like', "%{$searchQuery}%");
            });
        }

        // Apply tag filter
        if ($request->has('tag')) {
            $tag = $request->get('tag');
            $query->whereHas('tags', function ($builder) use ($tag) {
                $builder->where('slug', $tag);
            });
        }

        // Execute the query to get the results
        $careers = $query->get();

        // Pass the tags to the view (if needed)
        $tags = Tag::all();

        return view('career.index', compact('careers', 'tags'));
    }

    // Show Career
    public function show_career(Career $career, Request $request) {
        return view('career.show', compact('career'));
    }

    // Apply Career
    public function link_career(Career $career, Request $request) {
        $career->clicks()
            ->create([
                'user_agent' => $request->userAgent(),
                'ip' => $request->ip()
            ]);

        return redirect()->to($career->apply_link);
    }

    // Apply Career
    public function apply_career() {
        return view ('career.apply');
    }

    // Save application
    public function save_application(Request $request ) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'resume' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'phone' => 'nullable|string|max:20',
            'cover_letter' => 'nullable|string',
            'files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', // Validation for multiple files
        ]);

        // Handle file upload
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Handle multiple files upload
        $uploadedFiles = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
            $uploadedFiles[] = $file->store('multiplefiles', 'public');
            }
        }

        // Save the application
        $career = new Application();

        $career->user_id = auth()->id();
        $career->name = $request->name;
        $career->email = $request->email;
        $career->phone = $request->phone;
        $career->cover_letter = $request->cover_letter;
        $career->resume = $resumePath;
        $career->files = json_encode($uploadedFiles);


        $career->save();

        $name = $request->name;
        $email = $request->email;

        Mail::to($request->email)->send(new VerifyEmail($name, $email));

        return redirect()->back()->with('success', 'Your application has been submitted successfully.');
    }
}
