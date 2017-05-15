
@extends('layouts.admin') 


@section('content') 
<h1 id="header"> Users Index</h1>

@if(session()->get('delete_user')) 

  <h3 class="alert-danger"> {{session()->get('delete_user')}}</h3>
@endif

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
            <th>Photos</th>
      <th>Name</th>
      <th>Active</th>
      <th>Email</th>
      <th>Mobile</th>
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

      
      <td><img class="img-rounded" src="/images/{{$user->photo ? $user->photo->file :"no user photo"}}"  height="60" width="60"  ></td>
          

        <td><a href="{{ URL::route('users.edit', $user->id) }}" /> {{$user->name}}</td>

      {{-- <td><a href="{{'/'. $user->id . '/edit'}}" /> {{$user->name}}</td> --}}

      <td>{{$user->is_active==1 ? 'Active' : 'Inactive'}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->mobile}}</td>
      

	  <td>{{$user->role->name}}</td>
      <td>{{$user->created_at->diffForHumans()}}</td>
      <td>{{$user->updated_at}}</td>

    </tr>

    @endforeach
    @endif

      </tbody>
</table>


<button onclick="changeHeader()">Chage Header</button>

<Script type="text/javascript">

function changeHeader() {
document.getElementById("header").innerHTML = "Manasvi Patel";
document.getElementById("header").style.color = "red";
}
</Script>
@stop

