<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\User;
use App\Models\Career;
use App\Models\Category;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard_page() {
        $users = User::count();

        $user = User::get();

        $blogs = Post::count();

        return view('admin.admin', compact('users', 'blogs', 'user'));
    }

    public function post_page() {
        $category = Category::all();
        return view('admin.post_page', compact('category'));
    }

    // Add Post
    public function add_post(Request $request) {
        $validate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'category_id' => ['required', 'exists:categories,id'], // Use category_id
            'image' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            'video' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            // 'post_status' => ['required'],
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id; // Set the single category ID
        $post->post_status = 'active';

        // For Category
        // $category = Category::all();

        // $categoryname = $category->categpry;
        // $post->category = $categoryname;

        // For User
        $user = Auth::user();

        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post->user_id = $user_id;
        $post->name = $name;
        $post->usertype = $usertype;

        // Image post
        $image = $request->image;
        $imagename = null;

        if ($image) {
            $imagename = time() . ' . ' . $image -> getClientOriginalExtension();
            $image -> move('postimage', $imagename);
        }

        $post->image = $imagename;
        $videoname = null;

        // Video
        $video = $request->video;

        if($video) {
            $videoname = time() . ' . ' . $video->getClientOriginalExtension();
            $video->move('postvideo', $videoname);

            $post->video = $videoname;
        }

        $post->save();

        return redirect()->route('show.post')->with('success', 'Post Added Successfully');
    }


    // Show post
    public function show_post() {
        $post = Post::with('category')->get();

        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id) {
        $post = Post::find($id)->delete();

        return redirect()->back()->with('success', 'Post Deleted Successfully');
    }

    // Edit post
    public function edit_page($id) {
        $post = Post::find($id);

        $categories = Category::all();

        return view('admin.edit_page', compact('post', 'categories'));
    }

    // Update post
    public function update_post(Request $request, $id) {
        $validate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'category_id' => ['required', 'exists:categories,id'], // Use category_id
            'image' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            'video' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            // 'post_status' => ['required'],
        ]);

        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->category_id = $request->category_id; // Set the single category ID


        // Image Update post
        $image = $request->image;
        $imagename = null;

        if ($image) {
            $imagename = time() . ' . ' . $image -> getClientOriginalExtension();
            $image -> move('postimage', $imagename);
        }

        $data->image = $imagename;

        // Video
        $video = $request->video;
        $videoname = null;

        if($video) {
            $videoname = time() . ' . ' . $video->getClientOriginalExtension();
            $video->move('postvideo', $videoname);

            $data->video = $videoname;
        }


        $data->save();

        return redirect()->route('show.post')->with('success', 'Post updated successfully');
    }

    public function accept_post($id) {
        $post = Post::find($id);

        $post->post_status = 'active';

        $post->save();

        return redirect()->back()->with('success', 'Status updated to active');
    }

    public function reject_post($id) {
        $post = Post::find($id);

        $post->post_status = 'rejected';

        $post->save();

        return redirect()->back()->with('success', 'Status Rejected ');
    }

    // Category

    // Show category
    public function show_category() {
        $category = Category::all();

        return view('admin.category_page', compact('category'));
    }

    // Category Page
    public function category_page() {
        return view('admin.category_add_page');
    }

    // Add category
    public function add_category(Request $request) {
        $validate = $request->validate([
            'title' => ['required'],
        ]);

        $category = new Category();

        $category->title = $request->title;

        $category->save();

        return redirect()->route('show.category')->with('success', 'Category added successfully');
    }

    // Delete category
    public function delete_category($id) {
        $category = Category::find($id)->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }


    // Edit category
    public function edit_category_page($id) {
        $category = Category::find($id);

        return view('admin.category_edit_page', compact('category'));
    }

    // Update category
    public function update_category(Request $request, $id) {
        $validate = $request->validate([
            'title' => ['required'],
        ]);

        $category = Category::find($id);

        $category->title = $request->title;

        $category->save();

        return redirect()->route('show.category')->with('success', 'Category updated successfully');
    }

    // Career page
    public function show_career() {
        $careers = Career::orderBy('id', 'DESC')->paginate();

        return view('admin.career_page', compact('careers'));
    }

    // Add Career
    public function add_career_page() {
        return view('admin.career_add_page');
    }

    // Store Career
    public function store_career(Request $request) {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'logo' => 'required|file|max:2048',
            'location' => 'required',
            'apply_link' => 'required|url',
            'content' => 'required',
        ]);

        $career = new Career();

        $career->user_id = auth()->id();
        $career->title = $request->title;
        $career->slug = Str::slug($request->title) . '-' . rand(1111, 9999);
        $career->company = $request->company;
        $career->logo = basename($request->file('logo')->store('public'));
        $career->location = $request->location;
        $career->apply_link = $request->apply_link;
        $career->content = $request->content;
        $career->is_active = true;
        $career->is_highlighted = $request->filled('is_highlighted');

        $career->save();

        foreach(explode(',', $request->tags) as $requestTag) {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug(trim($requestTag))
            ], [
                'name' => ucwords(trim($requestTag))
            ]);

            $tag->careers()->attach($career->id);
        }

        return redirect()->route('show.career')->with('success', 'Career added successfully');
    }

    // Edit Career
    public function edit_career($id) {
        $career = Career::find($id);

        return view('admin.career_edit_page', compact('career'));
    }

    // Update Career
    public function update_career(Request $request) {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'logo' => 'file|max:2048',
            'location' => 'required',
            'apply_link' => 'required|url',
            'content' => 'required',
        ]);

        $career = Career::find($request->id);

        $career->user_id = auth()->id();
        $career->title = $request->title;
        $career->slug = Str::slug($request->title) . '-' . rand(1111, 9999);
        $career->company = $request->company;
        $career->location = $request->location;
        $career->apply_link = $request->apply_link;
        $career->content = $request->content;
        $career->is_active = true;
        $career->is_highlighted = $request->filled('is_highlighted');

        // Check if a new logo was uploaded
        if ($request->hasFile('logo')) {
            $career->logo = basename($request->file('logo')->store('public'));
        }

        $career->save();

        $career->tags()->detach();
        foreach(explode(',', $request->tags) as $requestTag) {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug(trim($requestTag))
            ], [
                'name' => ucwords(trim($requestTag))
            ]);

            $tag->careers()->attach($career->id);
        }

        return redirect()->route('show.career')->with('success', 'Career updated successfully');
    }

    // Delete Career
    public function delete_career($id) {
        $career = Career::find($id)->delete();

        return redirect()->back()->with('success', 'Career deleted successfully');
    }

    // Applied career
    public function applied_career() {
        $careers = Application::orderBy('id', 'DESC')->paginate();

        return view('admin.career_applied',compact('careers'));
    }

    public function downloadResume($id) {
        $career = Application::findOrFail($id);

        // Get the resume file path
        $filePath = $career->resume;

        // Check if the file exists
        if (!Storage::disk('public')->exists($filePath)) {
            return back()->with('error', 'Resume file not found.');
        }

        // Return the file as a download
        return Storage::disk('public')->download($filePath);
    }

    public function downloadfiles($id) {
        $career = Application::findOrFail($id);

        // Decode the JSON-encoded file paths
        $filePaths = json_decode($career->files, true);

        if (empty($filePaths)) {
            return back()->with('error', 'No files found for this application.');
        }

        // Create a temporary ZIP file
        $zipFileName = 'application_files_' . $career->id . '.zip';
        $zipPath = storage_path('app/public/' . $zipFileName);
        $zip = new \ZipArchive();

        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            return back()->with('error', 'Unable to create ZIP file.');
        }

        // Add files to the ZIP
        foreach ($filePaths as $filePath) {
            $fileFullPath = storage_path('app/public/' . $filePath);

            if (file_exists($fileFullPath)) {
                $zip->addFile($fileFullPath, basename($filePath));
            }
        }

        $zip->close();

        // Return the ZIP file as a download
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    public function delete_applied_career($id) {
        $career = Application::find($id)->delete();

        return redirect()->back()->with('success', 'Career deleted successfully');
    }
}
