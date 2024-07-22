<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page() {
        return view('admin.post_page');
    }

    // Add Post
    public function add_post(Request $request) {
        $validate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            'video' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            // 'post_status' => ['required'],
        ]);

        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';

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

        if ($image) {
            $imagename = time() . ' . ' . $image -> getClientOriginalExtension();
            $image -> move('postimage', $imagename);
        }

        $post->image = $imagename;

        // Video
        $video = $request->video;

        if($video) {
            $videoname = time() . ' . ' . $video->getClientOriginalExtension();
            $video->move('postvideo', $videoname);

            $post->video = $videoname;
        }

        $post->save();

        return redirect()->back()->with('success', 'Post Added Successfully');
    }


    // Show post
    public function show_post() {
        $post = Post::all();

        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id) {
        $post = Post::find($id)->delete();

        return redirect()->back()->with('success', 'Post Deleted Successfully');
    }

    // Edit post
    public function edit_page($id) {
        $post = Post::find($id);

        return view('admin.edit_page', compact('post'));
    }

    // Update post
    public function update_post(Request $request, $id) {
        $validate = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            'video' => ['file', 'mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt', 'max:204800'],
            // 'post_status' => ['required'],
        ]);

        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;

        // Image Update post
        $image = $request->image;

        if ($image) {
            $imagename = time() . ' . ' . $image -> getClientOriginalExtension();
            $image -> move('postimage', $imagename);
        }

        $data->image = $imagename;

        // Video
        $video = $request->video;

        if($video) {
            $videoname = time() . ' . ' . $video->getClientOriginalExtension();
            $video->move('postvideo', $videoname);

            $data->video = $videoname;
        }


        $data->save();

        return redirect()->back()->with('success', 'Post updated successfully');
    }
}
