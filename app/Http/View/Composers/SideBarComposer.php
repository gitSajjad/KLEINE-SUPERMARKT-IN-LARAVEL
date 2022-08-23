<?php

namespace App\Http\View\Composers;
use App\Models\Post;
use Illuminate\Contracts\View\View;




class SideBarComposer {

    public function compose(View $view)
    {
        $selectedPost = Post::where('selected',1)->orderBy('created_at', 'DESC')->limit(1)->first();
        $sideBarBanner = Post::orderBy('created_at', 'DESC')->limit(1)->first();
        $mostCommentedPosts = Post::withCount('comments')->orderBy('comments_count', 'DESC')->limit(6)->get();

        $view->with(
            ['selectedPost' => $selectedPost ,
             'sideBarBanner'=> $sideBarBanner ,
             'mostCommentedPosts' => $mostCommentedPosts
             ]
        );

    }







}
