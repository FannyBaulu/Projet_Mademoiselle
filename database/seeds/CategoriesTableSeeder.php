<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Snacks & Confectionary',
            'slug'=>'snacks_confectionary',
        ]);
        Category::create([
            'name'=>'Bakery',
            'slug'=>'bakery',
        ]);
        Category::create([
            'name'=>'Beverage',
            'slug'=>'beverage',
        ]);
        Category::create([
            'name'=>'Cakes',
            'slug'=>'cakes',
        ]);
        Category::create([
            'name'=>'Jams & Marmalades',
            'slug'=>'jams_marmelades',
        ]);
        Category::create([
            'name'=>'Pies & Tarts',
            'slug'=>'pies_tars',
        ]);
    }
}
