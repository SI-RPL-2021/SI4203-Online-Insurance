@extends('layouts.dashboard')
@section('title', 'Policies')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  @foreach($transactions as $transaction)
  <p>{{ $transaction->amount }}</p>

  @endforeach
</div>
@endsection
