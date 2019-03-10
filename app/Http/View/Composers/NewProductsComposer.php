<?php

declare(strict_types=1);

namespace App\Http\View\Composers;

use App\Product;
use Illuminate\View\View;

class NewProductsComposer
{
    /** @var Product */
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function compose(View $view)
    {
        $view->with('new', $this->getNewProducts());
    }

    protected function getNewProducts(): Product
    {
        return $this->product->orderBy('created_at', 'desc')->get()->take(6);
    }
}
