@extends('layouts.app')
@section('title', 'Home')

@section('content')

<div class="container py-5">
  {{-- Content --}}

  <!-- @foreach($claims as $claim)
  <p>{{ $claim->status }}</p>
  <p>{{ $claim->note }}</p>
  <p>{{ $claim->amount }}</p>

  @endforeach -->

  <!-- FORM claim -->

  <div class="card">
    <div class="card-body p-md-5">
      <h5 class="mb-3">Form Klaim Rawat Inap</h5>
      <form action="#" method="POST">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="mb-3">
              <label for="policy" class="form-label">Polis Asuransi</label>
              <select class="form-select" aria-label="Polis Asuransi" id="policy" name="policy">
                <option selected>Pilih Polis</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="fullName" class="form-label">Nama Pasien</label>
              <input type="text" class="form-control" id="fullName" name="fullName">
            </div>
            <div class="mb-3">
              <label for="diagnosis" class="form-label">Diagnosis</label>
              <textarea rows="3" class="form-control" id="diagnosis" name="diagnosis"></textarea>
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Tanggal Perawatan</label>
              <input type="date" class="form-control" id="date">
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Lama Perawatan</label>
              <input type="number" class="form-control" id="duration">
            </div>

            <div class="mb-3">
              <label for="medcare" class="form-label">Nama Rumah Sakit</label>
              <input type="text" class="form-control" id="medcare" name="medcare">
            </div>

          </div>
          <div class="col-12 col-md-6">
            <div class="mb-3">
              <label for="formFile" class="form-label">Surat Keterangan Rawat Inap</label>
              <input class="form-control" type="file" id="formFile">
            </div>
            <div class="mb-3 form-check">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault" style="font-size: 13px">
                Saya menyatakan bahwa seluruh informasi di atas adalah benar menurut pengetahuan dan keyakinan Saya
              </label>
            </div>
            <div class="text-end">
              <button class="btn btn-warning" type="submit">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection