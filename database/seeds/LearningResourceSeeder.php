<?php

use App\LearningResource;
use Illuminate\Database\Seeder;

class LearningResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sixtySeconds = new LearningResource();
        $sixtySeconds->title = '60 seconds';
        $sixtySeconds->content = 'lalala';
        $sixtySeconds->description = 'lilili description';
        $sixtySeconds->type = 'video';
        $sixtySeconds->url = 'http://youtube.com';
        $sixtySeconds->level_id = 1;
        $sixtySeconds->save();

    }
}
