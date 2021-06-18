@extends('layouts.dashboard')
@section('title', 'Policies')

@section('content')

<div class="container p-4">
  <div class="mb-3">
    <a href="{{ route('dashboard.policies.create', ['id' => '0']) }}" class="btn btn-warning">Add New</a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Tags</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($policies as $policy)
      <tr>
        <td>{{ $policy->id }}</td>
        <td>{{ $policy->name }}</td>
        <td>{{ $policy->desc }}</td>
        <td>{{ $policy->tags }}</td>
        <td>
          <a class="btn btn-sm btn-light" href="{{ route('dashboard.policies.edit', $policy->id) }}">Edit</a>
          <form action="{{ route('dashboard.policies.destroy', $policy->id) }}" method="POST" class="d-inline-block">
						@csrf
            @method('delete')
						<button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
					</form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection