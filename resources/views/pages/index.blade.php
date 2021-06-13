@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div>
  <div class="mb-4 bg-yellow-100">
    <div class="container py-5">
      <div class="d-flex flex-column-reverse flex-lg-row align-items-center">
        <div class="text-center text-lg-start">
          <h1 class="mb-3">
            Get health plans for you and your family, for every age and stage
          </h1>
          <a href="{{ route('pages.policies.list') }}" class="shadow me-2 d-inline-block btn btn-warning">Buy Online</a>
          <a href="{{ route('pages.claims.list') }}" class="shadow d-inline-block btn btn-warning">Make a Claim</a>
        </div>
        <img class="img-responsive" style="max-height: 500px" src="/family1.svg" alt="">
        <!-- <div style="background-image: url('/family1.svg'); height: 500px; background-repeat: no-repeat; background-position: center; background-size: contain" class="w-100">
        </div> -->

      </div>
    </div>
  </div>
  <div class="container">
    <h4 class="mb-4 fs-3 fw-bold">Fitur</h4>
    <div class="row">
      <div class="mb-4 col-12 col-sm-6 col-md-4">
        <div class="shadow-sm h-100 card">
          <div class="p-5 text-center card-body">
            <div class="py-4 mx-auto">
              <img class="img-fluid" style="max-width: 64px" src="/icons/report.png">
            </div>
            <h5>Kemudahan mendaftar asuransi</h5>
            <p class="text-gray-500 fs-6">Cari polis dan daftar secara online di satu platform.</p>
          </div>
        </div>
      </div>
      <div class="mb-4 col-12 col-sm-6 col-md-4">
        <div class="shadow-sm h-100 card">
          <div class="text-center card-body p-md-5">
            <div class="py-4 mx-auto">
              <img class="img-fluid" style="max-width: 64px" src="/icons/invoice.png">
            </div>
            <h5>Kemudahan membayar tagihan</h5>
            <p class="text-gray-500 fs-6">Bayar tagihan asuransi aman dan praktis</p>
          </div>
        </div>
      </div>
      <div class="mb-4 col-12 col-sm-6 col-md-4">
        <div class="shadow-sm h-100 card">
          <div class="text-center card-body p-md-5">
            <div class="py-4 mx-auto">
              <img class="img-fluid" style="max-width: 64px" src="/icons/medical-folder.png">
            </div>
            <h5>Kemudahan klaim asuransi</h5>
            <p class="text-gray-500 fs-6">Ajukan klaim, cepat dan akurat</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-6">
        <img src="/1.svg" height="200px">
      </div>

      <div class="col-6">
        <h3>Kelebihan Menggunakan LIFE Insurance</h3>
        <ul>
          <li class="mb-4">Asuransi digital terpercaya di Indonesia</li>
          <li class="mb-4">Asuransi digital temurah di Indonesia</li>
          <li class="mb-4">Asuransi digital tercepat di Indonesia</li>
          <li class="mb-4">Asuransi digital teraman di Indonesia</li>
        </ul>
      </div>
    </div>

    <div class="mb-5">
      <h4>Testimoni</h4>
      <div class="row">
        <div class="col-3">
          <div class="card">
            <div class="card-body text-center">
              <p class="mb-0" style="font-size: 14px">Komentar pengguna</p>
              <p class="fw-bold fs-6 mb-0">Dadang subur</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <div class="card-body text-center">
              <p class="mb-0" style="font-size: 14px">Komentar pengguna</p>
              <p class="fw-bold fs-6 mb-0">Rudi Tabuti</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <div class="card-body text-center">
              <p class="mb-0" style="font-size: 14px">Komentar pengguna</p>
              <p class="fw-bold fs-6 mb-0">Anasya Prisilia</p>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <div class="card-body text-center">
              <p class="mb-0" style="font-size: 14px">Komentar pengguna</p>
              <p class="fw-bold fs-6 mb-0">sedna athalla</p>
            </div>
          </div>
        </div>

      </div>
    </div>


  </div>
  <footer class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <a href="/" class="mb-0 font-weight-bold navbar-brand text-warning">
            <span class="fw-bold">
              LIFE
            </span>
            Insurance +
          </a>
          <p class="mb-0">LIFE Insurance adalah perusahaan penyedia asuransi jiwa dan asuransi kesehatan</p>
        </div>
        <div class="col-6 text-end">
          <p class="mb-0">Jalan Rasuna no 72 Jakarta 47564</p>
          <p style="font-size: 13px">+62 28382382</p>
        </div>
      </div>
    </div>
  </footer>
</div>

@endsection