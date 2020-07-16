<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
          $table->id();
          $table->string('title');
          $table->integer('rooms');
          $table->integer('bathrooms');
          $table->integer('meters');
          $table->string('nation');
          $table->string('city');
          $table->string('address');
          $table->string('number');

          $table->float('latitude', 7, 5);
          $table->float('longitude', 7, 5);
          $table->string('image');
          $table->integer('view');
          $table->integer("time") -> nullable() -> unsigned();

          $table->bigInteger('user_id') -> unsigned() -> index();

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
