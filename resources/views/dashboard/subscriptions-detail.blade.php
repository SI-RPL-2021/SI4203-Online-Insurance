@extends('layouts.dashboard')
@section('title', $subscription->id)

@section('content')

<div class="container p-4">
	<div class="card">
		<div class="p-5 card-body">
			<form action="{{route('subscription.update', ['id' => $subscription->id])}}" method="POST">
				@csrf
				<div style="max-width: 600px" class="mx-auto">
					<h4>Pendaftaran - {{ $subscription->policy_name }}</h4>

					<div class="row">
						<div class="col-6">
							<div class="mb-4">
								<label for="name" class="form-label">Name</label>
								<input type="text" name="name" id="name" class="form-control" value="{{$subscription->fullName}}" disabled>
							</div>
						</div>
						<div class="col-6">
							<div class="mb-4">
								<label for="birthdate" class="form-label">Birthdate</label>
								<input type="date" name="birthdate" id="birthdate" class="form-control" value="{{$subscription->birthdate}}" disabled>
							</div>
						</div>
					</div>
					<div class="mb-4">
						<label for="phone" class="form-label">Phone</label>
						<input type="text" name="phone" id="phone" class="form-control" value="{{$subscription->phone}}" disabled>
					</div>
					<div class="mb-4">
						<label for="address" class="form-label">Address</label>
						<textarea name="address" id="address" rows="3" class="form-control" disabled>{{$subscription->address}}</textarea>
					</div>

					<div class="mb-4">
						<label for="maxCoverage" class="form-label">Max Coverage</label>
						<input type="number" name="maxCoverage" id="maxCoverage" class="form-control" value="{{$subscription->maxCoverage}}">
					</div>
					<div class="mb-4">
						<label for="premium" class="form-label">Premium</label>
						<input type="number" name="premium" id="premium" class="form-control" value="{{$subscription->premium}}">
					</div>
					<div class="mb-4">
						<label for="status" class="form-label">Status</label>

						<select class="form-control" name="status" id="status" value="{{$subscription->status}}">
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