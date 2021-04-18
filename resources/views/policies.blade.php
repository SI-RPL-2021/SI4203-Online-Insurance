@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container my-4">
  {{-- Content --}}

  <div class="row gx-5">
    @foreach($policies as $policy)

    <div class="mb-3 col-6 col-md-4">
      <div class="shadow rounded-3 card">
        <div class="p-4 card-body">
          <div class="mb-4 position-relative" style="padding-top: 33.33%">
            <img class="top-0 rounded-3 position-absolute" style="width: 100%; height: 100%; object-fit: cover; object-position: top;" src="https://www.fwd.co.id/-/media/images/products-id/home-banner/asuransi-bebas-handal.jpg" alt="">
          </div>
          <h5 class="fw-bold">{{ $policy->name }}</h5>
          <p>{{ $policy->desc }}</p>

          <a href="{{ route('policy.detail', ['id' => '1']) }}" class="btn btn-warning w-100">Learn More</a>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection