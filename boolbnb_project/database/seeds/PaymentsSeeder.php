<?php

use Illuminate\Database\Seeder;
use App\Payment;
use App\Apartment;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // factory(Payment::class, 3) -> create() -> each(function($payment){
      //
      //   $apartments = Apartment::inRandomOrder() -> take(rand(1,5)) -> get();
      //   $payment -> apartments() -> attach($apartments);
      //
      // });

      $payments = [

        'basic' =>[
          'basic',
          '2.99',
          '45'
        ],

        'premium' =>[
          'premium',
          '5.99',
          '120'
        ],

        'deluxe' =>[
          'deluxe',
          '9.99',
          '10600'
        ]

      ];

      foreach ($payments as $key => $payment) {
        $newPayment = new Payment;
        $newPayment-> name = $payment[0];
        $newPayment-> price = $payment[1];
        $newPayment-> duration = $payment[2];
        $newPayment->save();
      }

    }
}
