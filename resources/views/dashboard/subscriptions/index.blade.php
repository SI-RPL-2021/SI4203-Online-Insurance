@extends('layouts.dashboard')
@section('title', 'Subscriptions')

@section('content')

<div class="container p-4">
  <h5>Pending Subscriptions</h5>
  <div class="mb-5">

    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Gender</th>
          <th>Birthdate / Age</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($subscriptionsPending as $subscription)
        <tr>
          <td>{{$subscription->id}}</td>
          <td>{{$subscription->fullName}}</td>
          <td>{{$subscription->phone}}</td>
          <td>{{$subscription->gender}}</td>
          <td>
            {{$subscription->birthdate}}
          </td>
          <td>
            {{$subscription->Address}}
          </td>
          <td>
            <a href="{{route('dashboard.subscriptions.detail', ['id' => $subscription->id])}}" class="btn btn-sm btn-light">
              Edit
            </a>
            <a href="{{route('subscription.delete', ['id' => $subscription->id])}}" class="btn btn-sm btn-light">
              Delete
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <div class="mb-5">
    <h5>Active Subscriptions</h5>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Gender</th>
          <th>Birthdate</th>
          <th>jatuh tempo</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($subscriptionsActive as $subscription)
        <tr>
          <td>{{$subscription->id}}</td>
          <td>{{$subscription->fullName}}</td>
          <td>{{$subscription->phone}}</td>
          <td>{{$subscription->gender}}</td>
          <td>
            {{$subscription->birthdate}}
          </td>
          <td>
            {{$subscription->endDate}}
          </td>
          <td>
            <a href="{{route('dashboard.subscriptions.detail', ['id' => $subscription->id])}}" class="btn btn-sm btn-light">
              Edit
            </a>
            <a href="{{route('subscription.delete', ['id' => $subscription->id])}}" class="btn btn-sm btn-light">
              Delete
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mb-5">
    <h5>Rejected Subscriptions</h5>
    <table class="table">
      <thead>
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
        @foreach($subscriptionsRejected as $subscription)
        <tr>
          <td>{{$subscription->id}}</td>
          <td>{{$subscription->fullName}}</td>
          <td>{{$subscription->phone}}</td>
          <td>{{$subscription->gender}}</td>
          <td>
            {{$subscription->birthdate}}
          </td>
          <td>
            {{$subscription->address}}
          </td>
          <td>
            <a href="{{route('dashboard.subscriptions.detail', ['id' => $subscription->id])}}" class="btn btn-sm btn-light">
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