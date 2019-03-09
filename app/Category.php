<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CategoryController;
use RuthgerIdema\UrlRewrite\Facades\UrlRewrite;

class Category extends Model
{
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'category_products',
            'category_id',
            'product_id'
        )->withPivot(['product_id', 'category_id']);
    }

    public function getUrlAttribute(): string
    {
        if (! $urlRewrite = UrlRewrite::getByTypeAndAttributes(
            CategoryController::DEFAULT_ROUTE, $this->getAttributesArrayFromCategory())
        ) {
            return '';
        }

        return route('url.rewrite', $urlRewrite->request_path, false);
    }

    protected function getAttributesArrayFromCategory(): array
    {
        $mapped = [];

        foreach (CategoryController::DEFAULT_ATTRIBUTES as $attribute) {
            $mapped[$attribute] = $this->getAttribute($attribute);
        }

        return $mapped;
    }
}
