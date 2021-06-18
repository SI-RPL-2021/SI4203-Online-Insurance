@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container py-5">
  <div class="card">
    <div class="card-body rounded-3 p-md-5">
    <form action="{{route('pages.issues.store')}}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="title" class="form-label">title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div> 

    <div class="mb-3">
      <label for="comment" class="form-label">comment</label>
      <input type="text" class="form-control" id="comment" name="comment">
    </div> 

    <div class="text-end">
      <button class="btn btn-warning" type="submit">Submit</button>
    </div>

  </form>
    </div>
  </div>
</div>

@endsection