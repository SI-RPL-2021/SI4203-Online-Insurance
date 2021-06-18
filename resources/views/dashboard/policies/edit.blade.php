@extends('layouts.dashboard')
@section('title', 'Policy')

@section('content')

<div class="p-4">
	<div class="card">
		<div class="p-5 card-body">
			<form action="{{ route('dashboard.policies.update', $policy->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('put')
				<div style="max-width: 600px" class="mx-auto">

					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" name="name" id="name" class="form-control" value="{{ $policy->name }}">
					</div>
					<div class="mb-3">
						<label for="desc" class="form-label">Description</label>
						<textarea rows="4" name="desc" id="desc" class="form-control">{{ $policy->desc }}</textarea>
					</div>
					<div class="mb-4">
						<label for="tags" class="form-label">Tags</label>
						<input type="text" name="tags" id="tags" value="{{ $policy->tags }}" class="form-control">
					</div>

					<div class="mb-4">

						<label for="kategori" class="form-label">Kategori</label>
						<select class="form-control" name="kategori" id="kategori">
							<option value="Kesehatan">Kesehatan</option>
							<option value="Kematian">Kematian</option>
						</select>
					</div>

					<div class="mb-4">
						<label for="premium" class="form-label">Premium</label>
						<input type="number" name="premium" id="premium" value="{{ $policy->premium }}" class="form-control">
					</div>

					<div class="mb-3">
						<label for="formFile" class="form-label">Image</label>
						<input class="form-control" name="img" type="file" id="formFile">
					</div>

					<div class="text-end">
						<button type="submit" class="btn btn-warning">Submit</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection