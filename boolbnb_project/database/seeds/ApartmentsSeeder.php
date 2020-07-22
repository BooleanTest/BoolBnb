<?php

use App\User;
use App\Apartment;
use App\Service;

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
        // factory(Apartment::class, 40)
        //                   ->make()
        //                   ->each(function ($apartment){
        //     $user = User::inRandomOrder()-> first();
        //     $apartment -> user() -> associate($user);
        //     $apartment -> save();
        // });


      $apartments = [
        [
          'Un delizioso appartamento nel cuore di Roma',
          '4',
          '2',
          '90',
          'Italia',
          'Roma',
          'Via del Corso',
          '188',
          '41.90201',
          '12.48011',
          '/uploads/images/apartment1.jpg',
          '0',
          '1',
          '1'
        ],
        [
          'Romantica Gemma Nel Cuore di Milano',
          '2',
          '1',
          '40',
          'Italia',
          'Milano',
          'Via Clerici',
          '11',
          '45.46703',
          '9.18716',
          '/uploads/images/apartment2.jpg',
          '0',
          '1',
          '1'
        ],
        [
          'La Tua Casa a Verona',
          '2',
          '1',
          '35',
          'Italia',
          'Verona',
          'Via degli Alpini',
          '32',
          '45.43849',
          '10.99241',
          '/uploads/images/apartment1.jpg',
          '0',
          '1',
          '2'
        ],
        [
          'Appartamento moderno, Torino Centro.',
          '5',
          '3',
          '120',
          'Italia',
          'Torino',
          'Via Pietro Piffetti',
          '23',
          '45.07727',
          '7.66174',
          '/uploads/images/apartment2.jpg',
          '0',
          '1',
          '2'
        ],
        [
          'Casetta Nova Napoli - Monolocale Centro Antico',
          '1',
          '1',
          '30',
          'Italia',
          'Napoli',
          'Via Francesco Caracciolo',
          '12',
          '40.83160',
          '14.22843',
          '/uploads/images/apartment1.jpg',
          '0',
          '1',
          '3'
        ],
        [
          'Casa Sant Angelo - Perugia Centro Storico',
          '2',
          '1',
          '40',
          'Italia',
          'Perugia',
          'Via Fratelli Rosselli',
          '9',
          '43.10186',
          '12.38337',
          '/uploads/images/apartment2.jpg',
          '0',
          '1',
          '3'
        ],
        [
          'Vista sul Mercato del Capo, Palermo',
          '6',
          '4',
          '180',
          'Italia',
          'Palermo',
          'Via Sampolo',
          '1',
          '38.13650',
          '13.35513',
          '/uploads/images/apartment1.jpg',
          '0',
          '1',
          '4'
        ],
        [
          'B&B Nel cuore di Potenza',
          '2',
          '1',
          '40',
          'Italia',
          'Potenza',
          'Via Carlo Bo',
          '28',
          '40.64069',
          '15.80952',
          '/uploads/images/apartment2.jpg',
          '0',
          '1',
          '4'
        ]
      ];

      foreach ($apartments as $apartment) {
        $newApartment = new Apartment;
        $newApartment-> title = $apartment[0];
        $newApartment-> rooms = $apartment[1];
        $newApartment-> bathrooms = $apartment[2];
        $newApartment-> meters = $apartment[3];
        $newApartment-> nation = $apartment[4];
        $newApartment-> city = $apartment[5];
        $newApartment-> address = $apartment[6];
        $newApartment-> number = $apartment[7];
        $newApartment-> latitude = $apartment[8];
        $newApartment-> longitude = $apartment[9];
        $newApartment-> image = $apartment[10];
        $newApartment-> time = $apartment[11];
        $newApartment-> visibility = $apartment[12];
        $newApartment-> user_id = $apartment[13];
        $newApartment->save();
      }




    }
}
