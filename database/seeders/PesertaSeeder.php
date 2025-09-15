<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peserta;
use Faker\Factory as Faker;

class PesertaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            Peserta::create([
                'nama' => $faker->name,
                'nik' => $faker->unique()->numerify('################'), // 16 digit
                'no_hp' => '08' . $faker->numerify(str_repeat('#', rand(8, 13))),
                'alamat' => $faker->address,
                'tanggal_lahir' => $faker->date('Y-m-d', '2008-12-31'), // Sebelum 2010-01-01
            ]);
        }
    }
}
