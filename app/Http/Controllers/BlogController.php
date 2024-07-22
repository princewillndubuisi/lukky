<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    public function home() {
        if (Auth::id()) {
            $post = Post::all();

            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('welcome', compact('post'));
            }

            elseif ($usertype == 'admin') {
                return view('admin.admin');
            }

            else {
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

        return view('user.profiles', compact('data'));
    }

    // User show post
    public function welcome() {
        $post = Post::all();

        return view('welcome', compact('post'));
    }

    // User Create postpage
    public function create_post(){
        return view('home.create_post');
    }

    // User post
    public function user_post(Request $request) {
        $validate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            'video' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;

        //Image
        $image = $request->image;

        if($image) {
            $imagename = time() . ' . ' . $image->getClientOriginalExtension();
            $image->move('postimage', $imagename);

            $post->image = $imagename;
        }

        // Video
        $video = $request->video;

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

        return view('home.edit_post', compact('data'));
    }

    public function user_post_update(Request $request, $id) {
        $validate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            'video' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
        ]);

        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;

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

        Alert::success('Success!', 'Post added successfully');

        return redirect()->back();
    }
}
