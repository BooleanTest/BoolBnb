<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Apartment;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,10)->make() -> each(function ($user){

          $apartment = Apartment::inRandomOrder()-> first();
          $user -> apartments() -> associate($apartment);
          $user -> save();

        })
    }

}
