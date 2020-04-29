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
     * Gets all of the active users 
     * from specified number of hours.
     * 
     * @param Integer e.g. 1 (hour)
     * @return Array
     */
    public function activePastHour($hours)
    {
        if ( !isset($hours) ) {
            abort(403, 'The hours parameter must contain a value.');
        }
        
        $users = Active::usersWithinHours($hours)
            ->mostRecent()
            ->get();
        
        return response()->json($users);
    }
}
