<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function __invoke(int $id)
    {
        return view('catalog.product')->with(
            [
                'product' => Product::with('categories')->find($id),
            ]
        );
    }
}
