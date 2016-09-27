<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EditUserRequest;
use DB, Redirect;
use App\User;
use App\Roles;
use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('roles', 'users.rol', '=', 'roles.id','left')
            ->select('users.*', 'roles.name as rol ')
            ->get();    
        return view('user.consult',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $selected = array();
        $combobox= array();
        $tipos = DB::table('roles')->lists('name', 'id');
        $combobox = array(""=>"Seleccione un tipo") + $tipos;
        
        return view('user.save',compact('combobox', 'selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {   
        User::create([
            'name' =>  $request['name'],
            'email' => $request['email'],
            'rol' =>  $request['rol'],
            'password' => $request['password']
                  ]);
        $selected = array();
        $combobox= array();
        $tipos = DB::table('roles')->lists('name', 'id');
        $combobox = array(0 => "Seleccione un tipo") + $tipos;                              
        return view('user.save',compact('combobox', 'selected'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_role = array();
        $users = DB::table('users')->where('id', $id)->first();
        $tipos = DB::table('roles')->lists('name', 'id');
        $combobox = array("" => "Seleccione un tipo") + $tipos;
        $selected = array('id'=>$users->rol);
        return view('user.edit',compact('combobox', 'selected','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {

        $user = user::find($id);
        $user->fill($request->all());
        $user->save();
        return Redirect::to('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::destroy($id);
        return Redirect::to('/user');
    }
}
