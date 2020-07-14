<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Payment extends Model
{
  protected $table = "payments";

  public function apartments() {
    return $this -> belongsToMany(Apartment::class)-> withTimestamps();

  }
}
