<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // factory(User::class, 50) -> create();

      $users = [
        [
          'Federica',
          'Tosti',
          'federica@gmail.com',
          '2020-02-05'
        ],
        [
          'Alessandro',
          'Andreoli',
          'alessandro@gmail.com',
          '2020-02-05'
        ],
        [
          'Emanuele',
          'Zaccaria',
          'emanuele@gmail.com',
          '2020-02-05'
        ],
        [
          'Matteo',
          'Rosella',
          'matteo@gmail.com',
          '2020-02-05'
        ]
      ];

      foreach ($users as $user) {
        $newUser = new User;
        $newUser-> name = $user[0];
        $newUser-> lastname = $user[1];
        $newUser-> email = $user[2];
        $newUser-> password = Hash::make('password');
        $newUser-> date_of_birth = $user[3];
        $newUser->save();
      }



    }

}
