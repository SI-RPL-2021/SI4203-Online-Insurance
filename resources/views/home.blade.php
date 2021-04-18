@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="pb-5">
  <div class="mb-4 bg-yellow-100">
    <div class="container py-5">
      <div class="d-flex flex-column-reverse flex-lg-row align-items-center">
        <div class="text-center text-lg-start">
          <h1 class="mb-3">
            Get health plans for you and your family, for every age and stage
          </h1>
          <a href="{{ route('policy.home') }}" class="shadow me-2 d-inline-block btn btn-warning">Buy Online</a>
          <a href="{{ route('claim.home') }}" class="shadow d-inline-block btn btn-warning">Make a Claim</a>
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
  </div>
</div>

@endsection