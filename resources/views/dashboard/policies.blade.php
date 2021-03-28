@extends('layouts.dashboard')
@section('title', 'Policies')

@section('content')

<div class="container pb-5">
  {{-- Content --}}
  @foreach($policies as $policy)
  <p>{{ $policy->name }}</p>
  <p>{{ $policy->premium }}</p>
  <p>{{ $policy->desc }}</p>

  @endforeach
</div>
@endsection
