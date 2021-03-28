@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="pb-5">
  <div class="bg-secondary text-white">
    <div class="container" style="padding: 128px 0">
      <h1 class="mb-3">
        Take a brave
        step now!
      </h1>
      <a href="#" class="btn btn-warning">Buy Online</a>
      <a href="#" class="btn btn-warning">Make a Claim</a>

    </div>
  </div>
  <div class="container py-2">
    <h4>Products</h4>
    @foreach($policies as $policy)
    <div class="card">
      <div class="card-body">
        <p>{{$policy->name}}</p>
        <p>{{$policy->desc}}</p>
        {{-- <p>{{$policy->desc}}</p> --}}
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
