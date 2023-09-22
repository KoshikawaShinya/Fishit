<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DateTime;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class CompetitionSeeder extends Seeder
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
        DB::table('competitions')->insert([
            'species' => $fishes_array[2],
            'description' => "ここにコンペの詳細を書く．魚の特性，魚が好むもの，釣れる場所・時間",
            'image_path' => 'imagepath',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
