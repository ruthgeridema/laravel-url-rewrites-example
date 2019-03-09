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
            Str::slug($product->{ProductController::DEFAULT_SLUG}),
            null,
            ProductController::DEFAULT_ROUTE,
            $this->getAttributesArrayFromProduct($product),
            0,
            true
        );
    }

    public function updated(Product $product): void
    {
        $urlRewrite = $this->getProductUrlRewrite($product);
        UrlRewrite::regenerateRoute($urlRewrite);
    }

    public function deleted(Product $product): void
    {
        $urlRewrite = $this->getProductUrlRewrite($product);
        UrlRewrite::delete($urlRewrite->id);
    }

    protected function getProductUrlRewrite(Product $product)
    {
        return UrlRewrite::getByTypeAndAttributes(
            ProductController::DEFAULT_ROUTE,
            $this->getAttributesArrayFromProduct($product)
        );
    }

    protected function getAttributesArrayFromProduct(Product $product): array
    {
        $mapped = [];

        foreach (ProductController::DEFAULT_ATTRIBUTES as $attribute) {
            $mapped[$attribute] = $product->{$attribute};
        }

        return $mapped;
    }
}
