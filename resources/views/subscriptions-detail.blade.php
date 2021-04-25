@extends('layouts.app')
@section('title', 'Registrasi Asuransi')

@section('content')

<div class="container py-4">
  <div class="card">
    <div class="p-5 card-body">
      <h4 class="mb-3">Form Pendaftaran - {{ $policy->name }}</h4>
      <form action="{{ route('subscription.create') }}" method="POST">
        @csrf
        <input type="hidden" name="policyId" id="policyId" value="{{ $policy->id }}">
        <div class="row">

          <div class="col-12 col-md-6">
            <div class="mb-3">
              <label class="form-label d-block" for="gender">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L">
                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P">
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>

            </div>
            <div class="mb-3">
              <label for="fullName" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="fullName" id="fullname">
            </div>
            <div class="mb-3">
              <label for="birthdate" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" name="birthdate" id="birthdate">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">No. HP</label>
              <input type="tel" class="form-control" name="phone" id="phone">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Alamat Tempat Tinggal</label>
              <textarea rows="3" class="form-control" name="address" id="address"></textarea>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="text-end">
              <button type="submit" class="btn btn-warning">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection