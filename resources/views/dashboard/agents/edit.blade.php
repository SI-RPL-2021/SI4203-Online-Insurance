@extends('layouts.dashboard')
@section('title', "Ubah Agen / Admin")

@section('content')

<div class="container p-4">
  <form action="{{route('dashboard.agents.update', $agent->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="row">
      <div class="col-12">
        <div class="mb-3">
          <label for="policy" class="form-label">Polis Asuransi</label>
          <select class="form-select" aria-label="Polis Asuransi" id="role" name="role">
            <option selected>Pilih Role User</option>
            <option value="admin" selected="{{ $agent->user->role === 'admin' }}">Admin</option>
            <option value="agent" selected="{{ $agent->user->role === 'agent' }}">Agent</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">No. HP</label>
          <input type="tel" class="form-control" id="phone" name="phone" value="{{ $agent->phone }}">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="name" class="form-control" id="name" name="name" value="{{ $agent->user->name }}">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $agent->user->email }}" disabled>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" disabled>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="status" id="status" checked="{{ $agent->status }}">
          <label class="form-check-label" for="status">
            Active?
          </label>
        </div>
      </div>
      <div class="text-end">
        <button class="btn btn-warning" type="submit">Submit</button>
      </div>
    </div>
  </form>

  <table class="table mb-4">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($customers as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->name }}</td>
        <td>{{ $row->email }}</td>

        {{-- TODO: Add columns --}}
        <td>

          <form action="{{ route('dashboard.agents.removeCustomer', $row->id) }}" method="POST" class="d-inline-block">
            @csrf
            @method('delete')
            <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <form action="{{ route('dashboard.agents.addCustomer') }}" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="policy" class="form-label">Customer</label>
      <select class="form-select mb-4" aria-label="" id="customer" name="customer">
        <option selected>Pilih Customer</option>
        @foreach($users as $row)
        <option value="{{$row->id}}">{{$row->name}}</option>
        @endforeach
      </select>
      <button class="btn btn-sm btn-warning">Add</button>
    </div>
  </form>
</div>

@endsection