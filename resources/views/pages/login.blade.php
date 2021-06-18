@extends('layouts.blank')
@section('title', 'Login')


@section('content')

<div class="container d-flex align-items-center min-vh-100" style="max-width: 430px">

  <div class="w-100">
    @foreach ($errors->all() as $error)

    <div class="mb-3 alert alert-danger">{{ $error }}</div>

    @endforeach
    <div class="border-0 shadow card w-100">
      <div class="p-5 card-body">
        <h2 class="mb-3 fw-bold">Login</h2>
        <form class="mb-3 form" action="{{ route('auth.login') }}" method="post">
          @csrf
          <div class="mb-3 form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3 form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button class="mt-3 btn btn-lg font-weight-bold btn-warning w-100">Login</button>
        </form>
        <p class="mb-0 text-center">Belum memiliki akun? <a href="/register">Daftar</a></p>
      </div>
    </div>
  </div>

</div>
@endsection