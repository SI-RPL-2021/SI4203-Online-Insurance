@extends('layouts.dashboard')
@section('title', $claim->id)

@section('content')

<div class="container p-4">
  <form action="{{route('claim.update', ['id'=>$claim->id])}}" method="POST">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-12">
        <div class="mb-3">
          <label for="policy" class="form-label">Polis Asuransi</label>
          <select class="form-select" aria-label="Polis Asuransi" id="policy" name="policy" value="{{ $claim->policyId }}" disabled>
            <option selected>{{ $policy->name }}</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="claimantName" class="form-label">Nama Pasien</label>
          <input type="text" class="form-control" id="claimantName" name="claimantName" value="{{ $claim->claimantName }}" disabled>
        </div>
        <div class="mb-3">
          <label for="diagnosis" class="form-label">Diagnosis</label>
          <textarea rows="3" class="form-control" id="diagnosis" name="diagnosis" disabled>{{ $claim->diagnosis }}</textarea>
        </div>
        <div class="mb-3">
          <label for="hospitalizeDate" class="form-label">Tanggal Perawatan</label>
          <input type="date" class="form-control" id="hospitalizeDate" name="hospitalizeDate" value="{{ $claim->hospitalizeDate }}" disabled>
        </div>
        <div class="mb-3">
          <label for="hospitalizeDate" class="form-label">Lama Perawatan</label>
          <input type="number" class="form-control" id="hospitalizeDuration" name="hospitalizeDuration" value="{{ $claim->hospitalizeDuration }}" disabled>
        </div>

        <div class="mb-3">
          <label for="medcareName" class="form-label" disabled>Nama Rumah Sakit</label>
          <input type="text" class="form-control" id="medcareName" name="medcareName" value="{{ $claim->medcareName }}" disabled>
        </div>

      </div>
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <a href="/dokumen/{{ $claim->dokumen }}">Lampiran</a>
          <!-- <label for="formFile" class="form-label">Surat Keterangan Rawat Inap</label> -->
        </div>
        <div class="mb-3">
          <label for="hospitalizeDate" class="form-label">Status</label>
          <select name="status" id="status" class="form-control">
            <option value="accepted">Accepted</option>
            <option value="rejected">Rejected</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="hospitalizeDate" class="form-label">Coverage</label>
          <input type="number" class="form-control" id="coverage" name="coverage">
        </div>
        <div class="text-end">
          <button class="btn btn-warning" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>

@endsection