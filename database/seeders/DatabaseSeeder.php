<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            MenuSeeder::class,
            CollectionSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            LocalesTableSeeder::class,
            CurrencyTableSeeder::class,
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            CountryStateTranslationSeeder::class,
            PaymentTypeSeeder::class,
            PaymentMethodSeeder::class,
            UserPaymentMethodSeeder::class
        ]);
    }
}
