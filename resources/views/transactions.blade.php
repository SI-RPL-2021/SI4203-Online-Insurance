@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  @foreach($transactions as $transaction)
  <p>{{ $transaction->status }}</p>
  <p>{{ $transaction->amount }}</p>
  @endforeach
</div>

@endsection
