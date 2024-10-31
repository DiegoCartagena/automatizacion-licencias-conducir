<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'=> 'admin',
            'email' => 'admin@admin.cl',
            'password' => Hash::make('admin')
        ]);
        $admin->assignRole('admin');
    }
}
