@extends('layouts.dashboard')
@section('title', 'Subscriptions')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  @foreach($subcriptions as $subcription)
  <p>{{ $subcription->status }}</p>

  @endforeach
</div>
@endsection
