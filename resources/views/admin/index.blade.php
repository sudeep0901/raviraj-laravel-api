@extends('layouts.admin')


@section('content')

<h1>admin Index Page</h1>

<table>
 
<tr>
<td><a href="{{ URL::route('users.create'), null }}" /> Create</td>

<td><a href="{{ URL::route('users.index'), null }}" /> List Users</td>
</tr>

 </table>
@stop