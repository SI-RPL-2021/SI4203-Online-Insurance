@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  @foreach($policies as $Policy)
  <p>{{ $Policy->name }}</p>
  <p>{{ $Policy->premium }}</p>
  <p>{{ $Policy->desc }}</p>
  @endforeach
</div>

@endsection