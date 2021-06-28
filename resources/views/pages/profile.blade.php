@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container py-5" style="max-width: 800px">
  <div class="p-5">
    <div class="text-center">
      <h5>{{Auth::user()->name}}</h5>
      <p class="text-gray-500">{{Auth::user()->email}}</p>
      <a href="/auth/logout" class="mb-4 btn btn-danger">Logout</a>
    </div>
    <hr>
    <div class="card mb-4">
      <div class="card-body">


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

            @foreach($subscriptions as $subscription)
            <tr>
              <td>{{ $subscription->policy_name }}</td>
              <td>{{ $subscription->premium }}</td>
              <td>
                <span class="badge bg-success">{{ $subscription->status }}</span>
              </td>
              <td>{{ $subscription->created_at }}</td>


            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-body">
        <h5>Tagihan</h5>
        <table class="table">
          <thead>
            <tr>
              <th>Jumlah</th>
              <th>Status</th>
              <th>Payment date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($transactions as $transaction)
            <tr>
              <td>{{ $transaction->amount }}</td>
              <td>
                <span class="badge bg-success">{{ $transaction->status }}</span>
              </td>
              @if ($transaction->status == 'paid')
              <td>{{ $transaction->updated_at }}</td>
              @else
              <td></td>
              @endif
              <td>
                @if ($transaction->status !='paid')
                <a href="{{ route('pages.transactions.show', $transaction->id) }}" class="btn btn-sm btn-light">Bayar</a>
                @endif
              </td>

            </tr>
            @endforeach

            @if($total > 0)
            <tr>
              <td colspan="3">Total Lunas</td>
              <td>{{ $total }}</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-body">
        <h5>Claim</h5>
        <table class="table mb-5">
          <thead>
            <tr>
              <th>Coverage</th>
              <th>Tanggal Rawat</th>
              <th>Rumah Sakit</th>
              <th>Status</th>

              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($claims as $row)
            <tr>
              <td>{{ $row->coverage }}</td>
              <td>{{ $row->hospitalizeDate }}</td>
              <td>{{ $row->medcareName }}</td>
              <td>
                <span class="badge bg-success">{{ $row->status }}</span>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
    @if($user->agent)
    <div>
      <h5>Kontak Agent</h5>
      <p class="mb-0">{{ $user->agent->user->name }}</p>
      <p>{{ $user->agent->phone }}</p>
    </div>
    @endif

  </div>
</div>

@endsection