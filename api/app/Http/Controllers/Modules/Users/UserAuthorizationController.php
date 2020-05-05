<?php

namespace App\Http\Controllers\Modules\Users;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAuthorizationController extends Controller
{
    /**
     * Allows the user to login and use the system.
     *
     * @param App\User $user
     * @return \Illuminate\Http\Response
     */
    public function authorize(User $user)
    {
        return response()->json(
            $user->fill([
                'authorized' => true
            ])->save(), 200);
    }

    /**
     * Allows the user to login and use the system.
     *
     * @param App\User $user
     * @return \Illuminate\Http\Response
     */
    public function unauthorize(User $user)
    {
        return response()->json(
            $user->fill([
                'authorized' => false
            ])->save(), 200);
    }
}
