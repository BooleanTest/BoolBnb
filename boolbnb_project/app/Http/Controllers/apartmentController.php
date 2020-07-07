<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Illuminate\Http\Request;
use Auth;

class apartmentController extends Controller
{
  public function index(){
    $apartments = Apartment::all();

    return view('index', compact('apartments'));
  }

  public function show($id){
      $apartments = Apartment::findOrFail($id);


      return view('show-apartment', compact('apartments'));
  }


}