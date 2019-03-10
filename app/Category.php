<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use RuthgerIdema\UrlRewrite\Facades\UrlRewrite;
use RuthgerIdema\UrlRewrite\Traits\HasUrlRewrite;

class Category extends Model
{
    use HasUrlRewrite, Searchable;

    /** @var string */
    public $urlRewriteType = 'category';

    /** @var array */
    protected $appends = ['url'];

    public function getOriginalUrlAttribute(): string
    {
        $urlRewrite = UrlRewrite::getByRequestPath(request()->path());

        if (! $urlRewrite) {
            $urlRewrite = UrlRewrite::getByTargetPath('/'.request()->path());
        }

        return $urlRewrite->target_path;
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'category_products',
            'category_id',
            'product_id'
        );
    }

    public function searchableAs(): string
    {
        return 'categories_index_'.env('MIX_ALGOLIA_APPEND', 'default');
    }
}
