<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    /** @var string */
    public const DEFAULT_ROUTE = "category";

    /** @var array */
    public const DEFAULT_ATTRIBUTES = ["id"];

    /** @var string */
    public const DEFAULT_SLUG = 'name';

    public function __invoke($id)
    {
        return view('catalog.category')->with(
            [
                'category' => Category::with('products')->find($id)
            ]
        );
    }
}
