<?php

namespace App\Http\View\Composers;

use App\Models\Menu;
use Illuminate\Contracts\View\View;




class MenusComposer {

    public function compose(View $view)
    {
        $menus = Menu::where('parent_id', null)->get();
        $view->with(
            ['menus' => $menus]
        );

    }


}
