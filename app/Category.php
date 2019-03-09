<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RuthgerIdema\UrlRewrite\Traits\HasUrlRewrite;

class Category extends Model
{
    use HasUrlRewrite;

    public $urlRewriteType = 'category';

    protected $appends = ['url'];

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
