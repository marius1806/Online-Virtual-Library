<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array(1 => 'Research', 2 => 'Culture', 3 => 'Novels', 4 => 'Kids', 5 => 'New');
        for ($idx = 1; $idx < 6; $idx++) {
            $tag = new Tag();
            $tag->name = $tags[$idx];
            $tag->save();
        }
    }
}
