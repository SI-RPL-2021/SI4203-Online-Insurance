@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container py-5" style="max-width: 800px">
  <div class="p-5 shadow card rounded-3">
    <div class="card-body">
      <div class="text-center">
        <h5>{{Auth::user()->name}}</h5>
        <p class="text-gray-500">{{Auth::user()->email}}</p>
        <a href="/auth/logout" class="mb-4 btn btn-danger">Logout</a>
      </div>
      <hr>
      <h5>Polis Asuransi</h5>
      <table class="table">
        <thead>
          <tr>
            <th>Polis</th>
            <th>Premi</th>
            <th>Status</th>
            <th>Tanggal Daftar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach($subscriptions as $subscription)
            <td>{{ $subscription->policy_name }}</td>
            <td>{{ $subscription->premium }}</td>
            <td>
              <span class="badge bg-success">{{ $subscription->status }}</span>
            </td>
            <td>{{ $subscription->created_at }}</td>
            @endforeach

          </tr>
        </tbody>
      </table>
      <h5>Tagihan</h5>
      <table class="table">
        <thead>
          <tr>
            <th>Polis</th>
            <th>Jumlah</th>
            <th>Status</th>
            <th>Jatuh Tempo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Jiwasraya</td>
            <td>Rp. 100.000</td>
            <td>
              <span class="badge bg-success">Lunas</span>
            </td>
            <td>24/04/2021</td>

          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>

@endsection