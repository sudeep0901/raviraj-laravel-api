@extends('layouts.admin')

@section('content')
<div class="container" >

<h3>User Creation </h3>
<hr> 



@if(count($errors) > 0) 
   
   
   <div class='alert alert-danger'>
         <ul>
               @foreach($errors->all() as $error) 
                  <li> {{$error}}</li>
              

               @endforeach
         </ul>
     </div>

   @endif

{!! Form::open(['method'=> 'POST', 'action' => 'AdminUsersController@store', 'files'=>true]) !!}


   

  	<div class="form-group">
   		{!! Form::label('name',	'Name') !!}
   		{!! Form::text('name',null,['class'=>'form-control']) !!}
   	</div>


   <div class="form-group">
         {!! Form::label('role_id', 'Role') !!}
         {{ Form::select('role_id', ['' => 'Choose Role'] + $roles, 1, ['class' => 'form-control']) }}
      </div>


	<div class="form-group">
   		{!! Form::label('email',	'E-mail') !!}
   		{!! Form::text('email',null,['class'=>'form-control']) !!}
   	</div>

<div class="form-group">
         
         <input type='text' name='html'>
      </div>

	<div class="form-group">
   		{!! Form::label('mobile',	'Mobile') !!}
   		{!! Form::text('mobile',null,['class'=>'form-control']) !!}
   	</div>
	
      

      <div class="form-group">
         {!! Form::label('is_active', 'Status') !!}
         {{ Form::select('is_active', ["1"=> "Active","0"=> "Inactive"],0,  ['class' => 'form-control']) }}
      </div>


      <div class="form-group">
         {!! Form::label('password', 'Password') !!}
         {!! Form::password('password',['class'=>'form-control']) !!}
      </div>
   <div class="form-group">
         {!! Form::label('photo_id', 'Upload Photos') !!}
         {!! Form::file('photo_id',['class'=>'form-control']) !!}
      </div>


      <div class="form-group">
         {!! Form::label('remarks', 'Remarks') !!}
               {{ Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 40])  }}
      </div>

            

   	<div class="form-group">
   		{!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

</div>

@stop