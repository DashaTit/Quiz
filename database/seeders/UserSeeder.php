<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'     => 'Admin',
            'age' => 3,
            'status' => 'Admin',
            'email'    => 'admin@example.org',
            'password' => bcrypt('Admin'),
            'image' => 'storage/image/admin.png'
        ]);

        $user->roles()->attach(1);
    }
}
