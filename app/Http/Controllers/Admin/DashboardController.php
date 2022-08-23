<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {

        $categories_count = Category::count();
        $users = User::all();
        $posts_count = Post::count();
        $commends = Comment::all();

        $lastComments = Comment::with('user')->orderBy('created_at','DESC')->take(5)->get();
        $mostCommentedPosts = Post::withCount('comments')->orderBy('comments_count','DESC')->get();
        $mostViewedPosts = Post::orderBy('view','DESC')->take(5)->get();


        return view('admin.dashboard', compact('categories_count','users','mostViewedPosts','posts_count', 'mostCommentedPosts','commends','lastComments'));
    }


}
