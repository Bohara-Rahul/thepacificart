<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artist = new Artist();
        $artist->name = "Bruce Lee";
        $artist->location = "China";
        $artist->photo = "fallback-avatar.jpg";
        $artist->bio = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolorum nemo libero voluptas qui impedit dolores similique inventore quis tenetur?";
        $artist->save();

        $artist = new Artist();
        $artist->name = "Pablo Escobar";
        $artist->location = "Colombia";
        $artist->photo = "fallback-avatar.jpg";
        $artist->bio = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolorum nemo libero voluptas qui impedit dolores similique inventore quis tenetur?";
        $artist->save();

        $artist = new Artist();
        $artist->name = "Rajesh Hamal";
        $artist->location = "Nepal";
        $artist->photo = "fallback-avatar.jpg";
        $artist->bio = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolorum nemo libero voluptas qui impedit dolores similique inventore quis tenetur?";
        $artist->save();

        $artist = new Artist();
        $artist->name = "Mohammed Rafique";
        $artist->location = "India";
        $artist->photo = "fallback-avatar.jpg";
        $artist->bio = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit dolorum nemo libero voluptas qui impedit dolores similique inventore quis tenetur?";
        $artist->save();
    }
}
