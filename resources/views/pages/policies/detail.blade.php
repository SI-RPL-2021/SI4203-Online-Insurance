@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container py-5">
  <div class="card">
    <div class="card-body rounded-3 p-md-5">
      <img src="/uploads/{{ $policy->img }}" style="height: 200px; margin-bottom: 12px">
      <h4>{{ $policy->name }}</h4>
      <p>{{ $policy->desc }}</p>
      <p>premi mulai dari Rp.{{ $policy->premium }}</p>
      <p>Kategori : {{ $policy->claimType }}</p>
      <a href="{{ route('pages.subscriptions.show', $policy->id) }}" class="btn btn-warning">Buy Now</a>
    </div>
  </div>
</div>

@endsection