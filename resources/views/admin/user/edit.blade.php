@extends('layouts.admin')

@section('content')
<div class="container" >

 <div>
      <span><h3>User Edit<img src="/images/{{$user->photo->file}}" alt="" class="img-responsive img-circle" width="200" height="200">
      </h3>
</span>
</div>


   
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


   <div  class='col-sm-9'>
{!! Form::model($user,array('method'=>'put','route' => array('users.update', $user->id), 'files'=>true)) !!}


   

  	<div class="form-group">
   		{!! Form::label('name',	'Name') !!}
   		{!! Form::text('name',null,['class'=>'form-control']) !!}
   	</div>


   <div class="form-group">
         {!! Form::label('role_id', 'Role') !!}
         {{ Form::select('role_id', $roles, null, ['class' => 'form-control']) }}
      </div>


	<div class="form-group">
   		{!! Form::label('email',	'E-mail') !!}
   		{!! Form::text('email',null,['class'=>'form-control']) !!}
   	</div>

	<div class="form-group">
   		{!! Form::label('mobile',	'Mobile') !!}
   		{!! Form::text('mobile',null,['class'=>'form-control']) !!}
   	</div>
	
      

      <div class="form-group">
         {!! Form::label('is_active', 'Status') !!}
         {{ Form::select('is_active', ["1"=> "Active","0"=> "Inactive"],null,  ['class' => 'form-control']) }}
      </div>


    {{--   <div class="form-group">
         {!! Form::label('password', 'Password') !!}
         {!! Form::password('password',['class'=>'form-control']) !!}
      </div> --}}
   <div class="form-group">
         {!! Form::label('photo_id', 'Upload Photos') !!}
         {!! Form::file('photo_id',['class'=>'form-control']) !!}
      </div>


      <div class="form-group">
         {!! Form::label('remarks', 'Remarks') !!}
               {{ Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 40])  }}
      </div>

            

   	<div class="form-group">
   		{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}


	</div>

{!! Form::close() !!}

{!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id]]) !!}

<div class="form-group">
         {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}


   </div>
{!! Form::close() !!}

</div>
</div>

@stop