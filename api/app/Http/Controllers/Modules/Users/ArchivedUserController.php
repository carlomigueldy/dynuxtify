<?php

namespace App\Http\Controllers\Modules\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ArchivedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Array
     */
    public function index()
    {
        if ( !auth()->user()->can('read users') ) {
            abort(403, 'You have no privileges for the requested resource.');
        }
        
        $users = User::onlyTrashed()->get();

        return response()->json($users);
    }

    /**
     * Gets the softly deleted user.
     *
     * @param Integer $id
     * @return Object
     */
    public function show($id)
    {
        if ( !auth()->user()->can('read users') ) {
            abort(403, 'You have no privileges for the requested resource.');
        }
        
        $user = User::onlyTrashed()
            ->where('id', $id)
            ->first();
        
        return response()->json($user);
    }

    /**
     * Restores a user from archive.
     *
     * @param Integer $id
     * @return Object [query: Boolean, message: String]
     */
    public function restore($id)
    {
        if ( !auth()->user()->can('restore users') ) {
            abort(403, 'You have no privileges for the requested resource.');
        }
        
        $user = User::onlyTrashed()
            ->where('id', $id)
            ->first();
        
        return response()->json([
            'query' => $user->restore(),
            'message' => 'A user has been deleted permanently.',
        ]);
    }

    /**
     * Deletes a user permanently.
     *
     * @param Integer $id
     * @return Object [query: Boolean, message: String]
     */
    public function destroy($id)
    {
        if ( !auth()->user()->can('delete users') ) {
            abort(403, 'You have no privileges for the requested resource.');
        }
        
        $user = User::onlyTrashed()
            ->where('id', $id)
            ->first();
        
        return response()->json([
            'query' => $user->forceDelete(),
            'message' => 'A user has been deleted permanently.',
        ]);
    }
}
