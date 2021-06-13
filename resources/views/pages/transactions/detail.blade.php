@extends('layouts.app')
@section('title', 'Transaction Detail')

@section('content')

<div class="container py-5">
  <form action="{{route('pages.transactions.update', $transaction->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="payment" value="1">
    <div class="row gx-4">
      <div class="col-12 col-md-8">
        <div class="mb-4 shadow-sm card">
          <div class="card-body p-md-4">
            <h5 class="mb-4">Detail Pembayaran</h5>

            <div class="mb-5 card">
              <div class="card-body">
                <h5>Ghufron Fikrianto</h5>
                <p class="mb-0">{{ $subscription->policy_name }} - Tagihan bulan <strong> {{ date("M", strtotime($subscription->startDate)) }}</strong>
                </p>
                <p class="mb-0">Rp. {{ $transaction->amount }}</p>
              </div>
            </div>

            <h5 class="mb-4">Payment</h5>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1" value="debit">
              <label class="form-check-label" for="paymentMethod1">
                Debit Card
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod2" value="debit">
              <label class="form-check-label" for="paymentMethod2">
                Credit Card
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="mb-4 shadow-md card">
          <div class="card-body p-md-4">
            <h5>Total</h5>
            <ul class="mb-4 list-group list-group-flush">
              <li class="px-0 justify-content-between list-group-item d-flex">
                <span>
                  Tagihan Polis
                </span>
                <span class="text-right">
                  Rp {{ $transaction->amount }}
                </span>
              </li>
              <!-- <li class="list-group-item">Biaya penanganan</li>
              <li class="list-group-item">Pajak</li> -->
            </ul>
            <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Bayar</button>
          </div>
        </div>
      </div>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h6 class="mb-0">
              {{ $subscription->policy_name }}

            </h6>
            <p class="mb-0">Rp {{ $transaction->amount }}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-warning">Bayar</button>
          </div>
        </div>
      </div>
    </div>
  </form>


</div>

@endsection