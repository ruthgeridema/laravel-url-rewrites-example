<?php

namespace App\Http\View\Composers;

use App\Category;
use Illuminate\View\View;

class HeaderComposer
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $view->with('categories', $this->category->all());
    }
}
