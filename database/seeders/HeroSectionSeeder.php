<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hero;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hero = new HeroSection();
        $hero->slogan = 'This is my Slogan';
        $hero->content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat libero amet cum nostrum voluptate eum obcaecati deserunt iusto illum consequatur, esse, tempore quo ab. Assumenda totam nemo alias quos quas!';
        $hero->save();
    }
}
