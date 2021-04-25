@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  <form action="{{route('claims.create')}}" method="POST">
    @csrf
    <input type="text" name="amount" id="amount">
    <input type="text" name="note" id="note">
    <input type="text" name="status" id="status">
    <button type="submit">Create</button>
  </form>

</div>

@endsection
