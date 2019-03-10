<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function __invoke(int $id)
    {
        return view('catalog.category')->with(
            [
                'category' => Category::with('products')->find($id),
            ]
        );
    }
}
