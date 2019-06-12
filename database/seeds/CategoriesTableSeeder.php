<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i <10 ; $i++) {
	        $faker = Faker\Factory::create();
	        $category = new App\Models\Category;
            $category->name = $faker->country;
            $category->description = $faker->text;
            $category->image='categories/blog-'.rand(1,7).'.jpg';
	        $category->save();
        }
    }
}
