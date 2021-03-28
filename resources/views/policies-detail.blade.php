@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  <form action="{{route('policies.create')}}" method="POST">
  @csrf
    <input type="text" name="name" id="name">
    <input type="text" name="premium" id="spremium">
    <input type="text" name="desc" id="desc">
    <button type="submit">Create</button>
  </form>
</div>

@endsection