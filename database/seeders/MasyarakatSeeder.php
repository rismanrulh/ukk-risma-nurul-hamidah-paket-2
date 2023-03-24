<?php

namespace Database\Seeders;

use App\Models\masyarakat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nik' => '3201252007070003',
                'nama' => 'Masyarakat1',
                'username' => 'masya2',
                'password' => bcrypt('masya'),
                'telp' => '082156798547',
            ],
        ];
        masyarakat::insert($data);
    }
}
