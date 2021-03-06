<?php

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
           UsersSeeder::class,
           ApartmentsSeeder::class,
           MessagesSeeder::class,
           ServicesSeeder::class,
           PaymentsSeeder::class,
           ViewSeeder::class
         ]);

    }
}
