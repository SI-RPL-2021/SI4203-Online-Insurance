@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  <form action="{{route('subscriptions.create')}}" method="POST">
    @csrf
    <input type="text" name="start_date" id="start_date">
    <input type="text" name="end_date" id="end_date">
    <input type="text" name="customer" id="customer">
    <input type="text" name="status" id="status">
    <button type="submit">Create</button>
  </form>
  </form>
</div>

@endsection