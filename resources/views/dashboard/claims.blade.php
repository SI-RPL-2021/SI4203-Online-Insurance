@extends('layouts.dashboard')
@section('title', 'Claims')

@section('content')

<div class="container pb-5">

<table class="table">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>Tipe Claim</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($claims as $claim)
      <tr>
        <td>{{ $claim->created_at }}</td>
        <td>{{ $claim->claimantName }}</td>
        <td>{{ $claim->claimType }}</td>
        <td>{{ $claim->status }}</td>
        <td>
          <a class="btn btn-sm btn-light" href="{{ route('dashboard.claims.detail', ['id' => $claim->id]) }}">Edit</a>
          <a class="btn btn-sm btn-light" href="{{ route('claim.delete', ['id' => $claim->id]) }}">Hapus</a>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
