@extends('layouts.dashboard')
@section('title', 'Daftar Agen / Admin')

@section('content')

<div class="container p-4">
  <div class="mb-3">
    <a href="{{ route('dashboard.agents.create') }}" class="btn btn-warning">Add New</a>
  </div>
  <h4>Agent</h4>
  <table class="table mb-4">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($agents as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->user->name }}</td>
        <td>{{ $row->user->email }}</td>
        <td>{{ $row->phone }}</td>
        <td>{{ $row->user->role }}</td>

        {{-- TODO: Add columns --}}
        <td>
          <a class="btn btn-sm btn-light" href="{{ route('dashboard.agents.edit', $row->id) }}">Edit</a>

          <form action="{{ route('dashboard.agents.destroy', $row->id) }}" method="POST" class="d-inline-block">
            @csrf
            @method('delete')
            <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>

  <h4>Admin</h4>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($admins as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->email }}</td>
        <td>{{ $row->role }}</td>

        {{-- TODO: Add columns --}}
        <td>
          <a class="btn btn-sm btn-light" href="{{ route('dashboard.users.edit', $row->id) }}">Edit</a>

          <form action="{{ route('dashboard.users.destroy', $row->id) }}" method="POST" class="d-inline-block">
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