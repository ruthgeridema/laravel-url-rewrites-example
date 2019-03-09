<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    /** @var string */
    public const DEFAULT_ROUTE = "product";

    /** @var array */
    public const DEFAULT_ATTRIBUTES = ["id"];

    /** @var string */
    public const DEFAULT_SLUG = 'name';

    public function __invoke($id)
    {
        return view('catalog.product')->with(
            [
                'product' => Product::with('categories')->find($id)
            ]
        );
    }
}
