<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_addresses')->insert([
            'user_id' => '1',
            'address' => 'No 123',
            'city_id' => '38857',
            'state_id' => '3321',
            'country_id' => '206',
            'zip' => '456',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('user_addresses')->insert([
            'user_id' => '2',
            'address' => 'No 123',
            'city_id' => '38857',
            'state_id' => '3321',
            'country_id' => '206',
            'zip' => '456',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
