@extends('layouts.app')
@section('title', 'Checkout')

@section('content')

<div class="container py-4">
  <div class="card">
    <div class="p-5 card-body">
      <h4 class="mb-3">Pembayaran Tagihan</h4>
      <form action="{{ route('transaction.create') }}" method="POST">
        <div class="row">

          <div class="col-12 col-md-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
              <li class="list-group-item">A third item</li>
              <li class="list-group-item">A fourth item</li>
              <li class="list-group-item">And a fifth one</li>
            </ul>
          </div>
          <div class="col-12 col-md-6">
            <div class="text-end">
              <a href="#" class="btn btn-warning">Submit</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection