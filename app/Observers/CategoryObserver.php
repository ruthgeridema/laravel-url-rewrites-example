<?php

namespace App\Observers;

use App\Category;
use Illuminate\Support\Str;
use RuthgerIdema\UrlRewrite\Facades\UrlRewrite;

class CategoryObserver
{
    public function created(Category $category): void
    {
        UrlRewrite::create(
            Str::slug($category->{config("url-rewrite.types.$category->urlRewriteType.create-slug-from")}),
            null,
            config("url-rewrite.types.$category->urlRewriteType.route"),
            $category->getUrlRewriteAttributesArray(),
            0,
            true
        );
    }

    public function updated(Category $category): void
    {
        UrlRewrite::regenerateRoute($category->getUrlRewrite());
    }

    public function deleted(Category $category): void
    {
        UrlRewrite::delete($category->getUrlRewrite()->id);
    }
}
