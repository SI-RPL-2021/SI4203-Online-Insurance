@extends('layouts.dashboard')
@section('title', "Ubah Admin")

@section('content')

<div class="container p-4">
	<form action="{{route('dashboard.users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('put')
		<div class="row">
			<div class="col-12">
				<div class="mb-3">
					<label for="name" class="form-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
				</div>
				<div class="mb-3">
					<label for="policy" class="form-label">Role</label>
					<select class="form-select" aria-label="Polis Asuransi" id="role" name="role">
						<option selected>Pilih Role User</option>
						<option value="admin" selected="{{ $user->id === 'admin' }}">Admin</option>
						<option value="agent" selected="{{ $user->id === 'agent' }}">Agent</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="name" class="form-control" id="name" name="name" value="{{ $user->name }}">
				</div>

				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="status" id="status" checked="{{ $user->status }}">
					<label class="form-check-label" for="status">
						Active?
					</label>
				</div>
			</div>
			<div class="text-end">
				<button class="btn btn-warning" type="submit">Submit</button>
			</div>
		</div>
	</form>
</div>

@endsection