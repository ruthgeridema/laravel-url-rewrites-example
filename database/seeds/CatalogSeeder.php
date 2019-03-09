<?php

use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Category::class, 5)->create();
        factory(\App\Product::class, 25)->create()->each(function ($product) {
            $product->categories()->attach(\App\Category::all()->random(1)->first());
        });
    }
}
