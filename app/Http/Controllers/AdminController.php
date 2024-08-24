<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

        return redirect()->back()->with('success', 'Post Added Successfully');
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

        return redirect()->back()->with('success', 'Post updated successfully');
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

        return redirect()->back()->with('success', 'Category added successfully');
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

        return redirect()->back()->with('success', 'Category updated successfully');
    }
}
