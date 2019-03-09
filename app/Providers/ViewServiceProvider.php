<?php

namespace App\Providers;

use App\Http\View\Composers\HeaderComposer;
use App\Http\View\Composers\NewProductsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer(
            'cms.homepage.index', NewProductsComposer::class
        );

        View::composer(
            'common.header', HeaderComposer::class
        );
    }
}