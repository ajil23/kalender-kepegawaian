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
            'nip' => '18401347509175',
            'golongan' => 'IIC',
            'jabatan' => 'Kepala Program Studi',
            'unitkerja' => 'Bisnis dan Informatika',
            'role' => '2',
            'password' => bcrypt('atasan123'),
        ]);
        $atasan->assignRole('atasan');
        $atasan = User::create([
            'name' =>'atasan2',
            'email' => 'atasan2@gmail.com',
            'nip' => '18401347509177',
            'golongan' => 'IIIC',
            'jabatan' => 'Kepala Program Studi',
            'unitkerja' => 'Teknik Sipil',
            'role' => '2',
            'password' => bcrypt('atasan123'),
        ]);
        $atasan->assignRole('atasan');
        $admin = User::create([
            'name' =>'admin',
            'email' => 'admin@gmail.com',
            'nip' => '18401347509175',
            'golongan' => 'IIC',
            'jabatan' => 'Kepala Program Studi',
            'unitkerja' => 'Bisnis dan Informatika',
            'role' => '1',
            'password' => bcrypt('admin123'),
        ]);
        $admin->assignRole('admin');

       $pegawai = User::create([
            'name' =>'pegawai',
            'email' => 'user@gmail.com',
            'nip' => '18401347509175',
            'golongan' => 'IIC',
            'jabatan' => 'Kepala Program Studi',
            'unitkerja' => 'Bisnis dan Informatika',
            'password' => bcrypt('user123'),
        ]);
        $pegawai->assignRole('pegawai');
    }
}
