<?php

namespace App\Observers;

use App\Product;
use Illuminate\Support\Str;
use App\Http\Controllers\ProductController;
use RuthgerIdema\UrlRewrite\Facades\UrlRewrite;

class ProductObserver
{
    public function created(Product $product): void
    {
        UrlRewrite::create(
            Str::slug($product->{config("url-rewrite.types.$product->urlRewriteType.create-slug-from")}),
            null,
            config("url-rewrite.types.$product->urlRewriteType.route"),
            $product->getUrlRewriteAttributesArray(),
            0,
            true
        );
    }

    public function updated(Product $product): void
    {
        UrlRewrite::regenerateRoute($product->getUrlRewrite());
    }

    public function deleted(Product $product): void
    {
        UrlRewrite::delete($product->getUrlRewrite()->id);
    }
}
