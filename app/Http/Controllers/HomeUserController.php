<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|String',
            'username' => 'required|String|unique:users',
            'email' => 'required|String|unique:users',
            'password' => 'required',
            'isAdmin' => 'required|boolean'
        ];

        

        $urlRules = $request->name == NULL || $request->username == NULL || $request->email == NULL || $request->password == NULL || $request->isAdmin == NULL; 

        if($urlRules){
            return back()->with('success', 'Failed to add user, your input is invalid. Please try again!');
        }
        
        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($validatedData['password']);

        // dd($validatedData);

        User::create($validatedData);

        $getUrl = session()->previousUrl();
        return redirect($getUrl)->with('success', 'A new user has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('home.users.edit', [
            'title' => 'User settings',
            'users' => User::all(),
            'userEdit' => $user,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        
        $rules = [
            'name' => 'required|String',
            'isAdmin' => 'required|boolean'
        ];

        if($request->username != $user->username){
            $rules['username'] = 'required|String|unique:users';
        }

        if($request->email != $user->email){
            $rules['email'] = 'required|String|unique:users';
        }

        $validatedData = $request->validate($rules);
        if($request->password){
            $validatedData['password'] = bcrypt($request->password);
        }
        
        User::where('id', $user->id)->update($validatedData);

        $getUrl = session()->previousUrl();
        return redirect($getUrl)->with('success', 'An user data has been changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        $userFirst = User::first()->get('id');

        $getUrl = session()->previousUrl();
        return redirect('/home/users/' . auth()->user()->id . '/edit')->with('success', 'An user has been deleted!');
    }
}
