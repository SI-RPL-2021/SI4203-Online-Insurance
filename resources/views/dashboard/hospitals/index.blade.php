@extends('layouts.dashboard')
@section('title', 'Daftar Rumah Sakit')

@section('content')

<div class="container p-4">
  <div class="mb-3">
    <a href="{{ route('dashboard.hospitals.create') }}" class="btn btn-warning">Add New</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>name</th>
        <th>address</th>
        <th>city</th>
				{{-- TODO: Add headers --}}
        <th>
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach($hospitals as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->address }}</td>
        <td>{{ $row->city }}</td>
				{{-- TODO: Add columns --}}
        <td>
          <a class="btn btn-sm btn-light" href="{{ route('dashboard.hospitals.edit', $row->id) }}">Edit</a>

					<form action="{{ route('dashboard.hospitals.destroy', $row->id) }}" method="POST" class="d-inline-block">
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