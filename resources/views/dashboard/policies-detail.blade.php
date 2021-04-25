@extends('layouts.dashboard')
@section('title', 'Policy')

@section('content')

<div class="p-4">
	<div class="card">
		<div class="p-5 card-body">
			<form action="{{ $policy ? route('policy.update', ['id' => $policy->id]) : route('policy.create') }}" method="POST">
				@csrf
				<div style="max-width: 600px" class="mx-auto">

					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" name="name" id="name" class="form-control" value="{{ $policy ? $policy->name : '' }}">
					</div>
					<div class="mb-3">
						<label for="desc" class="form-label">Description</label>
						<textarea rows="4" name="desc" id="desc" class="form-control">{{ $policy ? $policy->desc : '' }}</textarea>
					</div>
					<div class="mb-4">
						<label for="tags" class="form-label">Tags</label>
						<input type="text" name="tags" id="tags" value="{{ $policy ? $policy->tags : '' }}" class="form-control">
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