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
	        $category->name = $faker->name;
	        $category->description = $faker->address;
	        $category->save();
        }
    }
}
