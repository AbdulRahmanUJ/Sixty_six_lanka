<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            UserAddressSeeder::class,
            PackageTypeSeeder::class,
            PaymentmethodSeeder::class,
            ShippingmodeSeeder::class,
            DeliverystatusSeeder::class,
            PackingtypeSeeder::class,
            CostSeeder::class,
        ]);
    }
}
