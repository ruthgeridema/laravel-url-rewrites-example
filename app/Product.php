<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use RuthgerIdema\UrlRewrite\Facades\UrlRewrite;
use RuthgerIdema\UrlRewrite\Traits\HasUrlRewrite;


class Product extends Model
{
    use HasUrlRewrite, Searchable;

    public $urlRewriteType = 'product';

    protected $appends = ['url'];

    public function getOriginalUrlAttribute()
    {
        $urlRewrite = UrlRewrite::getByRequestPath(request()->path());

        if (! $urlRewrite) {
            $urlRewrite = UrlRewrite::getByTargetPath('/' . request()->path());
        }

        return $urlRewrite->target_path;
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

    public function searchableAs()
    {
        return 'products_index_' . env('MIX_ALGOLIA_APPEND', 'default');
    }
}
