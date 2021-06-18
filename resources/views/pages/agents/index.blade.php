@extends('layouts.app')
@section('title', 'Daftar Agen')

@section('content')

<div class="container my-4">
  <div class="row gx-4 gy-4">
    @foreach($agents as $row)

    <div class="col-6 col-md-4">
      <div class="shadow rounded-3 card h-100">
        <div class="p-4 card-body">
          <div class="d-flex flex-column h-100 justify-content-between">
            <div>
              <h5 class="fw-bold">{{ $row->phone }}</h5>
              <p>{{ $row->user->name }}</p>

            </div>
            {{-- <a href="{{ route('hospitals.show', $row->id) }}" class="btn btn-warning w-100"></a> --}}

          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection