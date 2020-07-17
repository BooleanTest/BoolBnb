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

            $table -> foreign('user_id', 'user')
             -> references('id')
             -> on('users')
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

        Schema::table('apartment_payment', function (Blueprint $table) {
            $table-> foreign("apartment_id" , "apartment_A")
                  -> references("id")
                  -> on("apartments")
                  -> onDelete("cascade")
                  ;
            $table-> foreign("payment_id" , "payment_A")
                  -> references("id")
                  -> on("payments")
                  -> onDelete("cascade")
                  ;
        });

        Schema::table('views', function (Blueprint $table) {
        $table->foreign('apartment_id', 'apartment_v')
              ->references('id')
              ->on('apartments')
              ->onDelete('cascade');
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

        $table -> dropForeign('user');

        });

      Schema::table('apartment_service', function (Blueprint $table) {

        $table -> dropForeign('apartment_');
        $table -> dropForeign('service');

      });

      Schema::table('apartment_payment', function (Blueprint $table) {
          $table-> dropForeign("apartment_A");
          $table-> dropForeign("payment_A");
      });

      Schema::table('views', function (Blueprint $table) {

        $table->dropForeign('apartment_v');    
      });

    }
}
