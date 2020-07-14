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
      factory(Payment::class, 3) -> create() -> each(function($payment){

        $apartments = Apartment::inRandomOrder() -> take(rand(1,5)) -> get();
        $payment -> apartments() -> attach($apartments);

      });
    }
}
