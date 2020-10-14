<?php

use Illuminate\Database\Seeder;
use App\NewsCategory;

class NewsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsCategory::create([
            'name'=>'Events',
            'slug'=>'events',
        ]);
        NewsCategory::create([
            'name'=>'Recipe',
            'slug'=>'recipe',
        ]);
        NewsCategory::create([
            'name'=>'New Product',
            'slug'=>'new_product',
        ]);
        NewsCategory::create([
            'name'=>'Special Offer',
            'slug'=>'special_offer',
        ]);
        NewsCategory::create([
            'name'=>'Contest',
            'slug'=>'contest',
        ]);
        
    }
}
