<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {

          $table -> foreign('apartment_id', 'apartment')
           -> references('id')
           -> on('apartments')
           -> onDelete('cascade');
        });

        Schema::table('apartments', function (Blueprint $table) {

            $table -> foreign('consumer_id', 'consumer')
             -> references('id')
             -> on('consumers')
             -> onDelete('cascade');
          });

          Schema::table('apartment_service', function (Blueprint $table) {

            $table -> foreign('apartment_id', 'apartment_')
                   -> references('id')
                   -> on('apartments')
                   -> onDelete('cascade');

            $table -> foreign('service_id', 'service')
                   -> references('id')
                   -> on('services')
                   -> onDelete('cascade');

    });

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('messages', function (Blueprint $table) {

        $table -> dropForeign('apartment');

        });
      Schema::table('apartments', function (Blueprint $table) {

        $table -> dropForeign('consumer');

        });

      Schema::table('apartment_service', function (Blueprint $table) {

        $table -> dropForeign('apartment_');
        $table -> dropForeign('service');

      });

    }
}
