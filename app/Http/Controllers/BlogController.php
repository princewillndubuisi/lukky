<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{

    public function home() {
        if (Auth::id()) {
            $post = Post::where('post_status', '=', 'active')->paginate(3);

            $category = Category::all();

            $ten = Post::where('post_status', '=', 'active')->latest()->take(4)->get();

            $usertype = Auth::user()->usertype;

            switch ($usertype) {
                case 'user':
                    return view('welcome', compact('post', 'category', 'ten'));
                case 'admin':
                    return view('admin.admin');
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

        return view('home.read_post',compact('post'));
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
        $post = Post::where('post_status', '=', 'active')->paginate(3);

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
            'image' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            'video' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
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
}
