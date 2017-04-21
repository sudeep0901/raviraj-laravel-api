
@extends('layouts.admin') 


@section('content') 
<h1> Users Index</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Active</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Password</th>
      <th>Role</th>
      <th>created AT</th>
      <th>updated AT</th>
    </tr>
  </thead>
  <tbody>

  @if($users)

  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->is_active==1 ? 'Active' : 'Inactive'}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->mobile}}</td>
      <td>{{$user->password}}</td>

	  <td>{{$user->role->name}}</td>
      <td>{{$user->created_at->diffForHumans()}}</td>
      <td>{{$user->updated_at}}</td>

    </tr>

    @endforeach
    @endif
  </tbody>
</table>
@stop