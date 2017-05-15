<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Middleware\Auth;
use App\Http\Requests\UsersRequest;
use Response;


use App\User;
use App\Role;
use App\Photo;




class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $users = User::all();

        
        if($request->is('view/*')) {
            // echo $request->url();
    
            return view('admin.user.index', compact('users'));
    
        } else {
    // do the other response
    return $users;
}
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();

        // $roles = Role::all();
        

        return view('admin.user.create', compact('roles'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        // $input = $request->all();

        // if(trim($request->password = ' ')) {

        //     $input = $request->except('password');

        // } else {

        //     $input =  $request->all();

        // }

        $input =  $request->all();

        if($file = $request->file('photo_id'));
        {   
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::Create(['file'=>$name]);

        }    

        $input['photo_id'] = $photo->id;


        $input['password']=bcrypt($request->password);
        
        $input['password']=$request->password;

        User::create($input);
        // return $ request->all();

        return redirect('/admin/users');    
         
                 if($request->is('view/*')) {
                    
        return view('admin.users.index',compact('$input'));
    }
    else {

        return $input;
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('admin.user.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request  $request)
    {
        //

        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id')->all();


        if($request->is('view/*')) {

        return view('admin.user.edit', compact('user', 'roles'));

    }else
    {
        return Response::json(array('user' => $user, 'roles' => $roles), 200);

    }
    
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UsersRequest $request)
    {
        //

        if(trim($request->password = ' ')) {

            $input = $request->except('password');

        } else {

            $input =  $request->all();

        }
        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id')->all();

        // $input =  $request->all();

        if($file = $request->file('photo_id'))
        {

            $name = time() + $file->getClientOriginalName();

            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;


        }

        $user->update($input);


        return redirect('/admin/users'); 

        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::findOrFail($id);
                
        unlink(public_path(). '/images/'. $user->photo->file);
                
        $user->delete();


        session()->flash('delete_user', 'Deleted users');
    
    return redirect('/admin/users');

    }
}
