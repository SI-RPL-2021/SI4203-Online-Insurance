@extends('layouts.dashboard')
@section('title', 'Transactions')

@section('content')

<div class="container p-4">
  {{-- Content --}}
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Payment Date</th>
        <th>Cust. Name</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Payment Method</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>02/02/2021</td>
        <td>Ghufron Fikri</td>
        <td>Rp. 429.873</td>
        <td>
          <span class="badge bg-success">
            Completed
          </span>
        </td>
        <td>
          Wire Transfer
        </td>
        <td>
          <a href="{{  route('dashboard.transactions.detail', ['id' => 1]) }}" class="btn btn-light">Detail</a>
        </td>
      </tr>
    </tbody>
  </table>
  <!-- @foreach($transactions as $transaction)
  <p>{{ $transaction->amount }}</p>
  @endforeach -->
</div>
@endsection