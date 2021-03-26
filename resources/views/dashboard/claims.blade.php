@extends('layouts.dashboard')
@section('title', 'Claims')

@section('content')

<div class="container pb-5">

  {{-- Content --}}
  @foreach($claims as $claim)
  <p>{{ $claim->status }}</p>
  <p>{{ $claim->note }}</p>
  <p>{{ $claim->amount }}</p>

  @endforeach
</div>
@endsection
