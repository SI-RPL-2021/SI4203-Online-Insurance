@extends('layouts.dashboard')
@section('title', 'Subscriptions')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  @foreach($subscriptions as $subscription)
  <p>{{ $subscription->status }}</p>

  @endforeach
</div>
@endsection
