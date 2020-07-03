<?php

use App\User;
use App\Apartment;

use Illuminate\Database\Seeder;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class, 20)
                          ->make()
                          ->each(function ($apartment){
            $user = User::inRandomOrder()-> first();
            $apartment -> user() -> associate($user);
            $apartment -> save();

        });
    }
}
