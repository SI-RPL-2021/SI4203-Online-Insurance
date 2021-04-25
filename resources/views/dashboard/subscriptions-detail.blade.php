@extends('layouts.dashboard')
@section('title', $subscription->id)

@section('content')

<div class="container p-4">
	<div class="card">
		<div class="p-5 card-body">
			<form action="{{route('subscription.update', ['id' => $subscription->id])}}" method="POST">
				@csrf
				<div style="max-width: 600px" class="mx-auto">

					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" name="name" id="name" class="form-control" value="{{$subscription->fullName}}">
					</div>
					<div class="mb-4">
						<label for="maxCoverage" class="form-label">Max Coverage</label>
						<input type="number" name="maxCoverage" id="maxCoverage" class="form-control">
					</div>
					<div class="mb-4">
						<label for="premium" class="form-label">Premium</label>
						<input type="number" name="premium" id="premium" class="form-control">
					</div>
					<div class="mb-4">
						<select class="form-control" name="status" id="status">
							<option value="pending">Pending</option>
							<option value="active">Active</option>
							<option value="rejected">Rejected</option>
						</select>

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