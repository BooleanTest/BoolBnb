<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    public function user(){

      return $this->belongsTo(User::class);
    }

    public function messages(){

      return $this->hasMany(Message::class);
    }

    public function services(){

      return $this->belongsToMany(Service::class);
    }

    public function payment(){
      return $this -> belongsToMany(Payment::class)->withTimestamps();
    }

    public function views(){
      
      return $this->hasMany(View::class);
    }

}
