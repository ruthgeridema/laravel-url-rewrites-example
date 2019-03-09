<?php

namespace App;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Model;
use RuthgerIdema\UrlRewrite\Facades\UrlRewrite;

class Product extends Model
{
    protected $appends = ['url'];

    public function getUrlAttribute(): string
    {
        if (! $urlRewrite = UrlRewrite::getByTypeAndAttributes(
            ProductController::DEFAULT_ROUTE, $this->getAttributesArrayFromProduct())
        ) {
            return '';
        }

        return route('url.rewrite', $urlRewrite->request_path, false);
    }

    protected function getAttributesArrayFromProduct(): array
    {
        $mapped = [];

        foreach (ProductController::DEFAULT_ATTRIBUTES as $attribute) {
            $mapped[$attribute] = $this->getAttribute($attribute);
        }

        return $mapped;
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'category_products',
            'product_id',
            'category_id'
        );
    }
}
