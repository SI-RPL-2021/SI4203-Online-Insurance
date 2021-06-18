@extends('layouts.dashboard')
@section('title', 'Claims')

@section('content')

<div class="container p-4">

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
      @foreach($claims as $row)
      <tr>
        <td>{{ $row->created_at }}</td>
        <td>{{ $row->claimantName }}</td>
        <td>{{ $row->claimType }}</td>
        <td>{{ $row->status }}</td>
        <td>
          <a class="btn btn-sm btn-light" href="{{ route('dashboard.claims.edit', $row->id) }}">Edit</a>
          <form action="{{ route('dashboard.claims.destroy', $row->id) }}" method="POST" class="d-inline-block">
						@csrf
            @method('delete')
						<button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
					</form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection