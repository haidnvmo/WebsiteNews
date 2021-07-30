<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\SubCategory;

class MenuComposer {
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @rerurn void
     */
    public function compose(View $view)
    {
        $categories = Category::with('subcategories')->get();
        $view->with(compact(
            'categories'
        ));
    }
}