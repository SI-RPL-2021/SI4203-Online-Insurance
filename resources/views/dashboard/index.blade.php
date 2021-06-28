@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')

<div class="container p-4">
  <div class="row mb-4">
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h4 class="fw-bold fs-2">
            {{ $subscriptionsActive }}
          </h4>
          <div class="text-gray-500">Jumlah pelanggan aktif</div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h4 class="fw-bold fs-2">
            {{$subscriptionsPending}}
          </h4>
          <div class="text-gray-500">Jumlah subscription pending</div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h4 class="fw-bold fs-2">
            {{$claimsPending}}
          </h4>
          <div class="text-gray-500">Jumlah claim pending</div>
        </div>
      </div>
    </div>
  </div>
  <h4>Daftar Customer</h4>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($customers as $customer)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->email }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection