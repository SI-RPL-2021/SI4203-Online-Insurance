@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container my-4">
<a href="{{ route('pages.issues.create') }}" class="btn btn-warning">Add New</a>


  <div class="row gx-4 gy-4">
  @foreach($issues as $row)

<div class="col-6 col-md-4">
  <div class="shadow rounded-3 card h-100">
    <div class="p-4 card-body">
      <div class="d-flex flex-column h-100 justify-content-between">
        <div>
          <h5 class="fw-bold">{{ $row->title }}</h5>
          <p>{{ $row->comment }}</p> 
          <p>{{ $row->respons }}</p> 

        </div>

      </div>
    </div>
  </div>
</div>
@endforeach
  </div>
</div>

@endsection