@extends('layouts.dashboard')
@section('title', 'Daftar Issue')

@section('content')

<div class="container p-4">
  {{-- <div class="mb-3">
    <a href="{{ route('dashboard.issues.create') }}" class="btn btn-warning">Add New</a>
  </div> --}}
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>title</th>
        <th>comment</th>
        <th>user</th>

				{{-- TODO: Add headers --}}
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($issues as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->title }}</td>
        <td>{{ $row->comment }}</td>
        <td>{{ $row->user->name}}</td>

				{{-- TODO: Add columns --}}
        <td>
          <a class="btn btn-sm btn-light" href="{{ route('dashboard.issues.edit', $row->id) }}">Edit</a>

					<form action="{{ route('dashboard.issues.destroy', $row->id) }}" method="POST" class="d-inline-block">
						@csrf
            @method('delete')
						<button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
					</form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection