@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container my-4">
  {{-- Content --}}

  <div class="row gx-4 gy-4">
    @foreach($policies as $row)

    <div class="col-6 col-md-4">
      <div class="shadow rounded-3 card h-100">
        <div class="p-4 card-body">
          <div class="d-flex flex-column h-100 justify-content-between">
            <div>
              <div class="mb-4 position-relative" style="padding-top: 33.33%">
                <img class="top-0 rounded-3 position-absolute" style="width: 100%; height: 100%; object-fit: cover; object-position: top;" src="/{{ $row->img }}" alt="">
              </div>
              <h5 class="fw-bold">{{ $row->name }}</h5>
              <p>{{ $row->desc }}</p>
              <p>{{ $row->claimType }}</p>
            </div>

            <a href="{{ route('policies.show', $row->id) }}" class="btn btn-warning w-100">Learn More</a>

          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection