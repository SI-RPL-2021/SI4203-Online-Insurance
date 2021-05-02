@extends('layouts.dashboard')
@section('title', $claim->id)

@section('content')

<div class="container p-4">
  <form action="{{route('claim.update', ['id'=>$claim->id])}}" method="POST">
    <div class="row">
      <div class="col-12">
        <div class="mb-3">
          <label for="policy" class="form-label">Polis Asuransi</label>
          <select class="form-select" aria-label="Polis Asuransi" id="policy" name="policy">
            <option selected>Pilih Polis</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="claimantName" class="form-label">Nama Pasien</label>
          <input type="text" class="form-control" id="claimantName" name="claimantName">
        </div>
        <div class="mb-3">
          <label for="diagnosis" class="form-label">Diagnosis</label>
          <textarea rows="3" class="form-control" id="diagnosis" name="diagnosis"></textarea>
        </div>
        <div class="mb-3">
          <label for="hospitalizeDate" class="form-label">Tanggal Perawatan</label>
          <input type="date" class="form-control" id="hospitalizeDate" name="hospitalizeDate">
        </div>
        <div class="mb-3">
          <label for="hospitalizeDate" class="form-label">Lama Perawatan</label>
          <input type="number" class="form-control" id="hospitalizeDuration" name="hospitalizeDuration">
        </div>

        <div class="mb-3">
          <label for="medcareName" class="form-label">Nama Rumah Sakit</label>
          <input type="text" class="form-control" id="medcareName" name="medcareName">
        </div>

      </div>
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <label for="formFile" class="form-label">Surat Keterangan Rawat Inap</label>
        </div>
        <div class="text-end">
          <button class="btn btn-warning" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>