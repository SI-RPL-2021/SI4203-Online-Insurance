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
      <table class="table mb-4">
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
            <!-- <th>Polis</th> -->
            <th>Jumlah</th>
            <th>Status</th>
            <th>Jatuh Tempo</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($transactions as $transaction)
          <tr>
            <!-- <td>{{ $transaction->policy_name }}</td> -->
            <td>{{ $transaction->amount }}</td>
            <td>
              <span class="badge bg-success">{{ $transaction->status }}</span>
            </td>
            <td>{{ $transaction->created_at }}</td>
            <td>
            @if ($transaction->status !='paid')
              <a href="{{ route('transaction.detail', $transaction->id) }}" class="btn btn-sm btn-light">Bayar</a>
              @endif
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>

@endsection