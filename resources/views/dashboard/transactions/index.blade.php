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
      @foreach($transactions as $row)
      <tr>
        <td>{{ $row->id }}</td>
        @if ($row->status === 'paid')
          <td>{{ $row->updated_at }}</td>
        @else
          <td></td>
        @endif

        <td>{{ $row->customerName }}</td>
        <td>Rp. {{ $row->amount }}</td>
        <td>
          <span class="badge {{ $row->status === 'paid' ? 'bg-success' : 'bg-warning' }}">
            {{ $row->status }}
          </span>
        </td>
        <td>
          {{ $row->paymentMethod }}
        </td>
        <td>
          <a href="{{  route('dashboard.transactions.edit', $row->id) }}" class="btn btn-light">Edit</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection