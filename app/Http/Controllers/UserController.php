<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $searchData = [];
        $user = User::latest();        
        if($request->filled('key') && $request->filled('value')){
            $searchData = $request->all();
            $searchText=$request->value;   
            $searchColumn=$request->key;              
            $user->where($searchColumn,'like','%'.$searchText.'%');        
        }
        $users = $user->paginate(10);
        return view('admin.users.index',compact('users','searchData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $roles = [
            'admin' => 'Admin',
            'tl'    => 'TL',
            'user'  => 'User',
        ];
        $status = [
            'active'    => 'Active',
            'deactive'  => 'Deactive'
        ];
        return view('admin.users.create',compact('roles','status'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([            
            'name'      => 'required|max:190',
            'role'      => 'required|max:45',
            'email'     => 'required|max:190|email|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status'    => 'required|max:45',
        ]);
        $input = $request->all();
        $input['password']= Hash::make($request->input('password'));
        $user = new User();        
        $user->fill($input);
        $user->save();
        return redirect(route('admin.users.index'))->with('flash_success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = [
            'admin' => 'Admin',
            'tl'    => 'TL',
            'user'  => 'User',
        ];
        $status = [
            'active'    => 'Active',
            'deactive'  => 'Deactive'
        ];
        return view('admin.users.show',compact('roles','status','user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = [
            'admin' => 'Admin',
            'tl'    => 'TL',
            'user'  => 'User',
        ];
        $status = [
            'active'    => 'Active',
            'deactive'  => 'Deactive'
        ];
        return view('admin.users.edit',compact('roles','status','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {        
        $request->validate([            
            'name'      => 'required|max:190',
            'role'      => 'required|max:45',
            'email'     => 'required|max:190|email|unique:users,email,'.$user->id,
            'password'  => ['nullable', 'string', 'min:8', 'confirmed'],
            'status'    => 'required|max:45',
        ]);
        $input = $request->except('password');
        
        if($request->filled('password'))
        $input['password']= Hash::make($request->input('password'));

        $user->fill($input);
        $user->save();
        return redirect(route('admin.users.index'))->with('flash_success','User updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($feed->role == 'admin')
            return redirect()->back()->with('flash_danger','Oops! Your request is not authorized.');

        $user->delete();
        return redirect(route('admin.users.index'))->with('flash_success','User deleted successfully.');
    }
}
