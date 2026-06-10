<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {

        $user = Profile::where('user_id', Auth::id())->first();

        return view('dashboard', ['user' => $user]);
    }
}
