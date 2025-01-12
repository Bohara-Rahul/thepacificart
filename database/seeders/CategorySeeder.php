<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
        $categories = ["Nature", "Nude", "Contemporary", "Abstract", "Classical", "Colonial"];

        for ($i = 0; $i <= 5; $i++) {
            $category = new Category();
            $category->title = $categories[$i];
            $category->slug = Str::slug($category->title);
            $category->save();
        }
        
    }
}
