@extends('layouts.dashboard')
@section('title', "Tanggapi Issue")

@section('content')

<div class="container p-4">
  <form action="{{route('dashboard.issues.store')}}" method="POST">
    @csrf


    {{-- SELECT --}}
    {{-- <div class="mb-3">
      <label for="policy" class="form-label">Polis Asuransi</label>
      <select class="form-select" aria-label="Polis Asuransi" id="policy" name="policy">
        <option selected>Pilih Polis</option>
      </select>
    </div> --}}


    {{-- FIELD --}}
    {{-- <div class="mb-3">
      <label for="claimantName" class="form-label">Nama Pasien</label>
      <input type="text" class="form-control" id="claimantName" name="claimantName">
    </div> --}}

    <div class="text-end">
      <button class="btn btn-warning" type="submit">Submit</button>
    </div>
  </form>
</div>

@endsection