<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RuthgerIdema\UrlRewrite\Facades\UrlRewrite;
use RuthgerIdema\UrlRewrite\Traits\HasUrlRewrite;

class Category extends Model
{
    use HasUrlRewrite;

    public $urlRewriteType = 'category';

    protected $appends = ['url'];

    public function getOriginalUrlAttribute()
    {
        $urlRewrite = UrlRewrite::getByRequestPath(request()->path());

        if (! $urlRewrite) {
            $urlRewrite = UrlRewrite::getByTargetPath('/' . request()->path());
        }

        return $urlRewrite->target_path;
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'category_products',
            'category_id',
            'product_id'
        );
    }
}
