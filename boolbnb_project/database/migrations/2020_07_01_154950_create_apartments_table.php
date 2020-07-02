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
          $table->string('address');
          $table->string('string');
          $table->float('latitude', 8, 5);
          $table->float('longitude', 8, 5);
          $table->string('image');
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
