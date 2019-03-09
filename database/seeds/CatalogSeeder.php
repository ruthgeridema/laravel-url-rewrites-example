<?php

use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    protected $sampleData = [
        'Apple' => [
            0 => [
                'name' => 'Apple iPad 128GB WiFi Space Gray',
                'price' => '429.95',
                'image' => '/img/ipad.jpeg',
                'description' => 'Apple iPad 128GB WiFi Space Gray is actually just like a computer, but it only weighs 469 grams.'
            ],
            1 => [
                'name' => 'Apple AirPods',
                'price' => '178.95',
                'image' => '/img/airpods.jpeg',
                'description' => 'Apple AirPods allow you to listen to the music of your iPhone, iPad, Mac, or Apple Watch wirelessly. The earbuds work via Bluetooth and have a 5-hour battery life.'
            ],
            2 => [
                'name' => 'Apple MacBook Air 13.3 inches',
                'price' => '999.99',
                'image' => '/img/macbook-air.jpeg',
                'description' => 'This Macbook allows you to surf the web for up to 12 hours without having to recharge. '
            ],
            3 => [
                'name' => 'Apple iPhone 7 32GB Black',
                'price' => '999.99',
                'image' => '/img/iphone.jpeg',
                'description' => 'Do you like taking pictures with your smartphone? Then the iPhone 7 comes highly recommended.'
            ]
        ],
        'Philips' => [
            0 => [
                'name' => 'Philips HUE Starter Pack White with Dimmer switch',
                'price' => '89.95',
                'image' => '/img/philips-hue-starter-pack-white-with-dimmer-switch.jpg',
                'description' => 'Discover the possibilities of smart lighting with the Philips Hue White Starter Pack with Dimmer.'
            ]
        ],
        'Sonos' => [
            0 => [
                'name' => 'SONOS One Black',
                'price' => '229.95',
                'image' => '/img/sonos.jpeg',
                'description' => 'Listen to your favorite music wirelessly with the SONOS One.'
            ]
        ]
    ];

    public function run()
    {
        foreach ($this->sampleData as $categoryName => $products) {
            $category = $this->createCategory($categoryName);

            $this->createProducts($products, $category);
        }
    }

    protected function createCategory($categoryName)
    {
        $category = factory(\App\Category::class)->create([
            'name' => $categoryName
        ]);
        return $category;
    }

    protected function createProducts($products, $category)
    {
        foreach ($products as $key => $productData) {
            $product = factory(\App\Product::class)->create(
                [
                    'name' => $productData['name'],
                    'price' => $productData['price'],
                    'description' => $productData['description'],
                    'image' => $productData['image']
                ]
            );

            $product->categories()->attach($category);
        }
    }
}
