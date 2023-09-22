<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $fishes_array = array('アジ', 'サンマ', 'マグロ');
        $places_array = array('東京', '千葉', '石川');
        DB::table('posts')->insert([
            'species' => $fishes_array[$faker->numberBetween(0,2)],
            'size' => $faker->numberBetween(10, 50),
            'place' => $places_array[$faker->numberBetween(0,2)],
            'image_path' => 'imagepath',
            'user_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
