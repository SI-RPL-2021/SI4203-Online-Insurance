@extends('layouts.app')
@section('title', 'Transaction Detail')

@section('content')

<div class="container pb-5">
  {{-- Content --}}

  <form action="{{route('transactions.create')}}" method="POST">
    @csrf
    <input type="text" name="amount" id="amount">
    <input type="text" name="status" id="status">
    <button type="submit">Create</button>
  </form>

</div>

@endsection