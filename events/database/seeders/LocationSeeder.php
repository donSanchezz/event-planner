<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => 'New Kingston',
        ]);

        DB::table('locations')->insert([
            'name' => 'Downtown',
        ]);

        DB::table('locations')->insert([
            'name' => 'Liguanea',
        ]);

        DB::table('locations')->insert([
            'name' => 'Portmore',
        ]);
    }
}
