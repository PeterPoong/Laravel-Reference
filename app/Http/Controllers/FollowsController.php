<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($userid)
    {
        $authenticUserID=auth()->id();
        $authenticUser=User::findOrFail($authenticUserID);
        $user=User::findOrFail($userid);
        return  $authenticUser->following()->toggle($user->profile);
    }
}
