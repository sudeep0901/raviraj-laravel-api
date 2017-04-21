@extends('layouts.admin')

@section('content')
<h1>User Creation </h1>

<form method="post" action="/admin/user/create">
<input type="text" name="name">

<input type="submit" />

</form>

@stop