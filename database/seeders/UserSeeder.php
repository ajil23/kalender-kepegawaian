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
        $atasan = User::create([
            'name' =>'atasan',
            'email' => 'atasan@gmail.com',
            'role' => '2',
            'password' => bcrypt('atasan123'),
        ]);
        $atasan->assignRole('atasan');
        $admin = User::create([
            'name' =>'admin',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'password' => bcrypt('admin123'),
        ]);
        $admin->assignRole('admin');

       $pegawai = User::create([
            'name' =>'pegawai',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
        ]);
        $pegawai->assignRole('pegawai');
    }
}
