@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  @foreach($subscriptions as $subscription)
  <p>{{ $subscription->start_date }}</p>
  <p>{{ $subscription->end_date }}</p>
  <p>{{ $subscription->customer }}</p>
  <p>{{ $subscription->status }}</p>

  @endforeach
</div>

@endsection