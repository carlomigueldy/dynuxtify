<?php

namespace App\Http\Controllers\Modules\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rainwater\Active\Active;

class ActiveUserController extends Controller
{
    /**
     * Gets all current active users.
     *
     * @return Array
     */
    public function index()
    {
        $users = Active::users()->get();
        
        return response()->json($users);
    }

    /**
     * Gets all of the active users from the past hour.
     * 
     * @return Array
     */
    public function activePastHour()
    {
        $users = Active::usersWithinHours(1)
            ->mostRecent()
            ->get();
        
        return response()->json($users);
    }
}
