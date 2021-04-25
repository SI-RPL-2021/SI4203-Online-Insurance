@extends('layouts.dashboard')
@section('title', 1)

@section('content')

<div class="container p-4">
	<form action="{{ route('transaction.create') }}" method="post">
		@csrf
		<div class="mb-3 form-group">
			<label class="form-label" for="paymentDate">Tanggal Pembayaran</label>
			<input class="form-control" type="date" name="paymentDate" id="paymentDate">
		</div>
		<div class="mb-3 form-group row">
			<div class="col-6">
				<div class="form-group">
					<label class="form-label" for="status">Status</label>
					<select class="form-control" name="status" id="status">
						<option value="pending">Pending</option>
						<option value="paid">Paid</option>
					</select>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label class="form-label" for="amount">Amount</label>
					<input class="form-control" type="number" name="amount" id="amount">
				</div>
			</div>
		</div>
		<div class="mb-3 form-group">
			<label class="form-label" for="customerName">Cust. Name</label>
			<input class="form-control" type="text" name="customerName" id="customerName">
		</div>
		<div class="mb-4 form-group">
			<label class="form-label" for="subscriptionId">Subscription ID</label>
			<input class="form-control" type="text" name="subscriptionId" id="subscriptionId">
		</div>
		<div class="text-end">
			<button type="submit" class="btn btn-warning">Submit</button>
		</div>
	</form>
</div>

@endsection