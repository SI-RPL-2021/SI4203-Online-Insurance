@extends('layouts.dashboard')
@section('title', 'Tambah Agen')

@section('content')

<div class="container p-4">
  <form action="{{ route('dashboard.agents.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="policy" class="form-label">Role</label>
      <select class="form-select" aria-label="Role" id="role" name="role">
        <option selected>Pilih Role User</option>
        <option value="admin">Admin</option>
        <option value="agent">Agent</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">No. HP</label>
      <input type="tel" class="form-control" id="phone" name="phone">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="name" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="status" id="status">
      <label class="form-check-label" for="status">
        Active?
      </label>
    </div>
    <div class="text-end">
      <button class="btn btn-warning" type="submit">Submit</button>
    </div>
  </form>
</div>

@endsection