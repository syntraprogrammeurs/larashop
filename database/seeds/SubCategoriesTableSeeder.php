<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subcategories')->insert(['name'=>'SUB1', 'category_id'=>'1']);
        DB::table('subcategories')->insert(['name'=>'SUB2', 'category_id'=>'1']);
        DB::table('subcategories')->insert(['name'=>'SUB3', 'category_id'=>'2']);
        DB::table('subcategories')->insert(['name'=>'SUB4', 'category_id'=>'2']);
    }
}
