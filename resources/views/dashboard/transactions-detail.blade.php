@extends('layouts.dashboard')
@section('title', 'Transactions/' . $transaction->id)

@section('content')

<div class="container p-4">
	<form action="{{ route('transaction.delete', $transaction->id) }}" method="post">
		@csrf
		<div class="mb-3 form-group row">
			<div class="col-6">
				<div class="mb-3 form-group">
					<label class="form-label" for="paymentDate">Tanggal Pembayaran</label>
					<input class="form-control" type="date" name="paymentDate" id="paymentDate" disabled value="{{ date('m/d/Y', strtotime($transaction->paymentDate)) }}">
				</div>
				<div class="form-group">
					<label class="form-label" for="status">Status</label>
					<select class="form-control" name="status" id="status" value="{{ $transaction->status }}" disabled>
						<option value="pending" selected="{{ $transaction->status == 'pending' }}">Pending</option>
						<option value="paid" selected="{{ $transaction->status == 'paid' }}">Paid</option>
					</select>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label class="form-label" for="amount">Amount</label>
					<input class="form-control" type="number" name="amount" id="amount" disabled value="{{ $transaction->amount }}">
				</div>
			</div>
		</div>
		<div class="mb-3 form-group">
			<label class="form-label" for="customerName">Cust. Name</label>
			<input class="form-control" type="text" name="customerName" id="customerName" disabled value="{{ $transaction->customerName }}">
		</div>
		<div class="mb-4 form-group">
			<label class="form-label" for="subscription_id">Subscription ID</label>
			<input class="form-control" type="text" name="subscription_id" id="subscription_id" disabled value="{{ $transaction->subscription_id }}">
		</div>
		<div class="text-end">
			<button type="submit" class="btn btn-warning">Hapus</button>
		</div>
	</form>
</div>

@endsection