<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::insert([
            ['name'=>'Lifestyle'],
            ['name'=>'Running'],
            ['name'=>'Basketball'],
            ['name'=>'Football'],
            ['name'=>'Gym and Training'],
            ['name'=>'Skateboarding'],
            ['name'=>'Tennis'],
            ['name'=>'Sandals and Slides'],
        ]);
    }
}
