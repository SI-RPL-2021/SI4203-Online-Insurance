@extends('layouts.dashboard')
@section('title', 'Transactions')

@section('content')

<div class="container p-4">
  {{-- Content --}}
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Payment date</th>
        <th>Cust. Name</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Payment Method</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      @foreach($transactions as $transaction)
      <tr>
        <td>{{ $transaction->id }}</td>
        @if ($transaction->status == 'paid')
        <td>{{ $transaction->updated_at }}</td>
        @else 
        <td></td>
        @endif
        <td>{{ $transaction->customerName }}</td>
        <td>Rp. {{ $transaction->amount }}</td>
        <td>
          <span class="badge {{ $transaction->status == 'paid' ? 'bg-success' : 'bg-warning' }}">
            {{ $transaction->status }}
          </span>
        </td>
        <td>
          {{ $transaction->paymentMethod }}
        </td>
        <td>
          <a href="{{  route('dashboard.transactions.detail', ['id' => 1]) }}" class="btn btn-light">Detail</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- @foreach($transactions as $transaction)
  <p>{{ $transaction->amount }}</p>
  @endforeach -->
</div>
@endsection