<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_level = new Level();
        $first_level->order = 10;
        $first_level->title = 'היכרות בסיסית';
        $first_level->description = 'רמה התחלתית';
        $first_level->save();

        $second_level = new Level();
        $second_level->order = 20;
        $second_level->title = 'רמה 2 ';
        $second_level->description = 'רמה 2';
        $second_level->save();
    }
}
