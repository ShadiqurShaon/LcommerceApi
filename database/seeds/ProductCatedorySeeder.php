<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCatedorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategory = [

            [
                'category_name'=> 'Western'
            ],
            [
                'category_name'=> 'Watches'
            ],
            [
                'category_name'=> 'Tshirt'
            ],
            [
                'category_name'=> 'Tops'
            ],
            [
                'category_name'=> 'Footwear'
            ],
            [
                'category_name'=> 'Kurtis'
            ],
            [
                'category_name'=> 'Bags'
            ],
            [
                'category_name'=> 'Sarres'
            ]

        ];

        ProductCategory::insert($productCategory);
    }
}
