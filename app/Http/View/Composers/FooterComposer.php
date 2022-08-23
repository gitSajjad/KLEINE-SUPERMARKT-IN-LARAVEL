<?php

namespace App\Http\View\Composers;



use App\Models\Post;
use Illuminate\Contracts\View\View;





class FooterComposer {

    public function compose(View $view)
    {
        $topSelectedPosts = Post::where('selected', 1)->orderBy('created_at', 'DESC')->limit(5)->get();
        $view->with(
            ['topSelectedPosts' => $topSelectedPosts]
        );

    }


}
