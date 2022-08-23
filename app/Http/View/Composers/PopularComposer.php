<?php

namespace App\Http\View\Composers;
use App\Models\Post;
use Illuminate\Contracts\View\View;




class PopularComposer {

    public function compose(View $view)
    {
        $popular_posts = Post::orderBy('view', 'DESC')->limit(3)->get();
        $view->with(
            ['popular_posts' => $popular_posts]
        );

    }





}
