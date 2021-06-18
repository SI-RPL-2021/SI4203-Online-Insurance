@extends('layouts.dashboard')
@section('title', 'Ubah Issue')

@section('content')

<div class="container p-4">
  <form action="{{route('dashboard.issues.update', $issue->id)}}" method="POST">
    @csrf
    @method('put')


    <div class="mb-3">
      <label for="title" class="form-label">title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$issue->title}}" disabled>
    </div>
    <div class="mb-3">
      <label for="comment" class="form-label">comment</label>
      <input type="text" class="form-control" id="comment" name="comment" value="{{$issue->comment}}" disabled>
    </div>
    <div class="mb-3">
      <label for="user" class="form-label">user</label>
      <input type="text" class="form-control" id="user" name="user" value="{{$issue->user->name}}" disabled>
    </div>
    <div class="mb-3">
      <label for="respons" class="form-label">respons</label>
      <input type="text" class="form-control" id="respons" name="respons">
    </div>
    <div class="text-end">
      <button class="btn btn-warning" type="submit">Submit</button>
    </div>

  </form>
</div>

@endsection