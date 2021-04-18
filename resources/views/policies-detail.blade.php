@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container py-5">
  <div class="card">
    <div class="card-body rounded-3 p-md-5">
      <h4>{{ $policy->name }}</h4>
      <p>{{ $policy->desc }}</p>
      <a href="{{ route('subscription.detail', ['id' => '1' ]) }}" class="btn btn-warning">Buy Now</a>
    </div>
  </div>
</div>

@endsection