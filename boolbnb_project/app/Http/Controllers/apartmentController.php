<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Illuminate\Http\Request;

class apartmentController extends Controller
{
  public function index(){
    $apartments = Apartment::all();

    return view('index', compact('apartments'));
  }

  public function show($id){
      $apartments = Apartment::findOrFail($id);


      return view('apartment', compact('apartments'));
  }

  public function edit($id){
      $apartments = Apartment::findOrFail($id);


      return view('edit-apartment', compact('apartments'));
  }

}
