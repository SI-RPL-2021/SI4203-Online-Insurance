@extends('layouts.dashboard')
@section('title', 'Subscriptions')

@section('content')

<div class="container p-4">
  <div class="mb-5">

    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Gender</th>
          <th>Birthdate</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-warning">
          <td colspan="7">Pending Subscriptions</td>
        </tr>
        @foreach($subscriptionsPending as $row)
        <tr>
          <td>{{$row->id}}</td>
          <td>{{$row->fullName}}</td>
          <td>{{$row->phone}}</td>
          <td>{{$row->gender}}</td>
          <td>
            {{$row->birthdate}}
          </td>
          <td>
            {{$row->address}}
          </td>
          <td>
            <a href="{{route('dashboard.subscriptions.edit', $row->id)}}" class="btn btn-sm btn-light">
              Edit
            </a>
            <form action="{{ route('dashboard.subscriptions.destroy', $row->id) }}" method="POST" class="d-inline-block">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
        <tr class="table-success">
          <td colspan="7">Active Subscriptions</td>
        </tr>
        <tr class="table-light">
          <td>Id</td>
          <td>Name</td>
          <td>Phone</td>
          <td>Gender</td>
          <td>Birthdate</td>
          <td>Jatuh Tempo</td>
          <td>Action</td>
        </tr>
        @foreach($subscriptionsActive as $row)
        <tr>
          <td>{{$row->id}}</td>
          <td>{{$row->fullName}}</td>
          <td>{{$row->phone}}</td>
          <td>{{$row->gender}}</td>
          <td>
            {{$row->birthdate}}
          </td>
          <td>
            {{$row->endDate}}
          </td>
          <td>
            <a href="{{route('dashboard.subscriptions.edit', $row->id)}}" class="btn btn-sm btn-light">
              Edit
            </a>
            <form action="{{ route('dashboard.policies.destroy', $row->id) }}" method="POST" class="d-inline-block">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
        <tr class="table-danger">
          <td colspan="7">Rejected Subscriptions</td>
        </tr>
        @foreach($subscriptionsRejected as $row)
        <tr>
          <td>{{$row->id}}</td>
          <td>{{$row->fullName}}</td>
          <td>{{$row->phone}}</td>
          <td>{{$row->gender}}</td>
          <td>
            {{$row->birthdate}}
          </td>
          <td>
            {{$row->address}}
          </td>
          <td>
            <a href="{{route('dashboard.subscriptions.edit', $row->id)}}" class="btn btn-sm btn-light">
              Edit
            </a>
            <form action="{{ route('dashboard.subscriptions.destroy', $row->id) }}" method="POST" class="d-inline-block">
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
</div>
@endsection