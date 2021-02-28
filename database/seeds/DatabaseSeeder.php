<?php

// use AdminDatabaseSeeder;
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
         $this->call(AdminDatabaseSeeder::class);
        //  $this->call(servantSeeder::class);
         $this->call(StatusSeeder::class);
         $this->call(governorateSeeder::class);
         $this->call(citySeeder::class);
         $this->call(supplierSeeder::class);
         $this->call(productSeeder::class);
    }
}
