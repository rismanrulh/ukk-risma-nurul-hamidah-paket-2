<?php

namespace Database\Seeders;

use App\Models\petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $data = [
            [
                'nama' => 'Risma Nurul Hamidah',
                'username' => 'risma',
                'password' => bcrypt('risma'),
                'telp' => '08558531201',
                'level' => 'Admin',
            ],
            [
                'nama' => 'Siti Sahla Fauzia Ardiani',
                'username' => 'sahla',
                'password' => bcrypt('sahla'),
                'telp' => '08558531202',
                'level' => 'Petugas',
            ],
        ];
        petugas::insert($data);
    }
}
