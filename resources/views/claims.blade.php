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
      <form action="{{route('claim.create')}}" method="POST">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="mb-3">
              <label for="policy" class="form-label">Polis Asuransi</label>
              <select class="form-select" aria-label="Polis Asuransi" id="policy" name="policy">
                <option selected>Pilih Polis</option>
                @foreach($subscriptions as $subscription)
                <option value="{{$subscription->id}}">{{$subscription->policy_name}}</option>
                @endforeach
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