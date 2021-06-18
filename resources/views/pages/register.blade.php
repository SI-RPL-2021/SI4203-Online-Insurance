@extends('layouts.blank')
@section('title', 'Login')
@section('content')

<div class="container d-flex align-items-center vh-100" style="max-width: 430px">
  <div class="w-100">

    @foreach ($errors->all() as $error)

    <div class="mb-3 alert alert-danger">{{ $error }}</div>

    @endforeach
    <div class="border-0 shadow card w-100">
      <div class="p-5 card-body">
        <h2 class="mb-3 fw-bold">Daftar</h2>
        <form class="mb-3 form" action="{{ route('auth.register') }}" method="post">
          @csrf
          <div class="mb-3 form-group">
            <label for="name">Fullname</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3 form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3 form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button class="mt-2 btn btn-warning btn-lg font-weight-bold w-100">Register</button>
        </form>
        <p class="mb-0 text-center">Sudah punya akun? <a href="/login">Login</a></p>
      </div>
    </div>
  </div>

</div>
@endsection