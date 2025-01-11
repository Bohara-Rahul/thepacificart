<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->name = "Admin";
        $admin->email = "admin@thepacificart.com";
        $admin->photo = "";
        $admin->password = Hash::make("admin@thepacificart");
        $admin->token = "";
        $admin->isAdmin = 1;
        $admin->save();
    }
}
