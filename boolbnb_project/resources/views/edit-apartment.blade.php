@extends('layouts.app')

@section('content')

  <form  action="#" method="post">
    @csrf
    @method('POST')

    <label for="title"></label>
    <input type="text" name="title" value="{{ old('title', $apartments -> title) }}">

    <br>

    <label for="rooms"></label>
    <input type="text" name="rooms" value="{{ old('rooms', $apartments -> rooms) }}">

    <br>

    <label for="bathrooms"></label>
    <input type="text" name="bathrooms" value="{{ old('bathrooms', $apartments -> bathrooms) }}">

    <br>

    <label for="meters"></label>
    <input type="text" name="meters" value="{{ old('meters', $apartments -> meters) }}">

    <br>

    <label for="address"></label>
    <input type="text" name="address" value="{{ old('address', $apartments -> address) }}">

    <br>

    <label for="number"></label>
    <input type="text" name="number" value="{{ old('number', $apartments -> number) }}">

    <br>

    <label for="latitude"></label>
    <input type="text" name="latitude" value="{{ old('latitude', $apartments -> latitude) }}">

    <br>

    <label for="longitude"></label>
    <input type="text" name="longitude" value="{{ old('longitude', $apartments -> longitude) }}">
    <br>

    <label for="image"></label>
    <input type="text" name="image" value="{{ old('image', $apartments -> image) }}">
    <br>

  </form>

@endsection
