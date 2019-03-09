<?php

namespace App\Observers;

use App\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Str;
use RuthgerIdema\UrlRewrite\Facades\UrlRewrite;

class CategoryObserver
{
    public function created(Category $category): void
    {
        UrlRewrite::create(
            Str::slug($category->{CategoryController::DEFAULT_SLUG}),
            null,
            CategoryController::DEFAULT_ROUTE,
            $this->getAttributesArrayFromCategory($category),
            0,
            true
        );
    }

    public function updated(Category $category): void
    {
        $urlRewrite = $this->getCategoryUrlRewrite($category);
        UrlRewrite::regenerateRoute($urlRewrite);
    }

    public function deleted(Category $category): void
    {
        $urlRewrite = $this->getCategoryUrlRewrite($category);
        UrlRewrite::delete($urlRewrite->id);
    }

    protected function getCategoryUrlRewrite(Category $category)
    {
        return UrlRewrite::getByTypeAndAttributes(
            CategoryController::DEFAULT_ROUTE,
            $this->getAttributesArrayFromCategory($category)
        );
    }

    protected function getAttributesArrayFromCategory(Category $category): array
    {
        $mapped = [];

        foreach (CategoryController::DEFAULT_ATTRIBUTES as $attribute) {
            $mapped[$attribute] = $category->{$attribute};
        }

        return $mapped;
    }
}
