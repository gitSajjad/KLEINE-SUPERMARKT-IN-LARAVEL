<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $topSelectedPosts = Post::where('selected', 1)->orderBy('created_at', 'DESC')->limit(3)->get();
        $breaking_news = Post::where('breaking_news', 1)->orderBy('created_at', 'DESC')->limit(1)->first();
        $last_posts = Post::orderBy('created_at', 'DESC')->limit(6)->get();
        return view('app.index',compact('topSelectedPosts','breaking_news','last_posts'));
    }


    public function show(Post $post)
    {

        $post->update(['view'=> $post->view + 1]);


        return view('app.show',compact('post'));
    }



    public function commentStore(Post $post, Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['post_id'] = $post->id;
        $comment = Comment::create($inputs);
        return redirect()->back()->with('swal-success','نظر شما با موفقیت ثبت و بعد از تاییده مدیر سایت نمایش داده خواهد شد');
    }



    public function search()
    {
        $searched_posts = Post::query();
        $search = request('search');

        if($search) {
            $searched_posts->search($search);
        }
        $searched_posts = $searched_posts->get();
        return view('app.search',compact('search','searched_posts'));

    }





}













   // return view('app.index', [
        //     'topSelectedPosts' => $topSelectedPosts,
        //     'breaking_news' => $breaking_news,
        //     'last_posts' => $last_posts,
        //     'search' => $search,
        //     'searched_posts' => $searched_posts->get(),
        // ]);
