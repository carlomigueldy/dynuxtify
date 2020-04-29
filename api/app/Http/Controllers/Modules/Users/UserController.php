<?php

namespace App\Http\Controllers\Modules\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( !auth()->user()->can('read users') ) {
            abort(403, 'You have no privileges for the requested resource.');
        }
        
        $users = User::get()->map(function ($data) {
            $data['role'] = $data->getFirstRole();

            return $data;
        });
        
        return response()->json($users);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        if ( !auth()->user()->can('create users') ) {
            abort(403, 'You have no privileges for the requested resource.');
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->has('role')) {
            $user->setRole($request->role);
        }
        
        return response()->json([
            'query' => $user,
            'message' => 'A user has been created successfully.'
        ]);
    }

    /**
     * Display the specified user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ( !auth()->user()->can('read users') ) {
            abort(403, 'You have no privileges for the requested resource.');
        }
        
        return response()->json($user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        if ( !auth()->user()->can('update users') ) {
            abort(403, 'You have no privileges for the requested resource.');
        }

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
        ])->saveOrFail();

        if ($request->has('role')) {
            $user->setRole($request->role);
        }

        if ($request->has('password')) {
            $user->fill([
                'password' => bcrypt($request->password),
            ])->saveOrFail();
        }
        
        return response()->json([
            'query' => $user,
            'message' => 'A user has been created successfully.'
        ]);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ( !auth()->user()->can('archive users') ) {
            abort(403, 'You have no privileges for the requested resource.');
        }
        
        return response()->json([
            'query' => $user->delete(),
            'message' => 'A user has been archived.',
        ]);
    }
}
