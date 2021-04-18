@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')

<div class="container p-4">
  <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h4 class="fw-bold fs-2">
            18
          </h4>
          <div class="text-gray-500">Jumlah pelanggan aktif</div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h4 class="fw-bold fs-2">
            21
          </h4>
          <div class="text-gray-500">Jumlah subscription pending</div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h4 class="fw-bold fs-2">
            25
          </h4>
          <div class="text-gray-500">Jumlah pembayaran jatuh tempo</div>
        </div>
      </div>
    </div>
  </div>
</div>