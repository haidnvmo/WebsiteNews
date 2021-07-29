<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;

class MenuComposer {
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @rerurn void
     */
    public function compose(View $view)
    {

        $categories = Category::get();
        // $contact = Category::first();

        $view->with(compact(
            'categories'
        ));
    }
}