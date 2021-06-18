@extends('layouts.dashboard')
@section('title', 'Ubah Data Rumah Sakit')

@section('content')

<div class="container p-4">
  <form action="{{route('dashboard.hospitals.update', $hospital->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control" id="name" name="name" value="{{$hospital->name}}">
    </div> 

  <div class="mb-3">
      <label for="city" class="form-label">Kota</label>
      <select class="form-select" aria-label="city" id="city" name="city" value="{{$hospital->city}}">
        <option selected>Pilih Kota</option>
        <option value="Jakarta">Jakarta</option>
        <option value="Bandung">Bandung</option>
      </select>
    </div> 
    <div class="mb-3">
      <label for="address" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="address" name="address" value="{{$hospital->address}}">
    </div> 

    <div class="text-end">
      <button class="btn btn-warning" type="submit">Submit</button>
    </div>
  </form>
</div>

@endsection