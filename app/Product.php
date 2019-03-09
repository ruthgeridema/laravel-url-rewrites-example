<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RuthgerIdema\UrlRewrite\Facades\UrlRewrite;
use RuthgerIdema\UrlRewrite\Traits\HasUrlRewrite;

class Product extends Model
{
    use HasUrlRewrite;

    public $urlRewriteType = 'product';

    protected $appends = ['url'];

    public function getOriginalUrlAttribute()
    {
        return UrlRewrite::getByRequestPath(request()->path())->target_path;
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
