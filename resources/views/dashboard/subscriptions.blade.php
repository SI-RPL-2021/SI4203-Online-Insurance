@extends('layouts.dashboard')
@section('title', 'Subscriptions')

@section('content')

<div class="p-4">
  <h5>Pending Subscriptions</h5>
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
      <tr>
        <td>01</td>
        <td>Ghufron Fikri</td>
        <td>429873</td>
        <td>L</td>
        <td>
          24/04/1999
        </td>
        <td>
          Bandung
        </td>
        <td>
          <a href="#" class="btn btn-sm btn-light">
            Edit
          </a>
          <a href="#" class="btn btn-sm btn-light">
            Delete
          </a>
        </td>
      </tr>
    </tbody>
  </table>
  <h5>Active Subscriptions</h5>
  <h5>Lapse Subscriptions</h5>


</div>
@endsection