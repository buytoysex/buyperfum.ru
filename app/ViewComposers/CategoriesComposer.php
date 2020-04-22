<?php


namespace App\ViewComposers;


use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view)
    {
        $menu_categories = Category::where('parent_id', 0)->get();

        $view->with('menu_categories', $menu_categories);
    }
}
