<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = ["PHP","C","JAVA","C#"];
        DB::table("blog")->truncate();
        $faker = Faker::create("zh_TW");
        foreach (range(1,100) as $index) {
            DB::table("blog")->insert([
                'title' => $faker->text(20),
                'class' => $class[rand(0,3)],
                'content' => $faker->paragraph,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
