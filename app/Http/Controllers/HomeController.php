<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $admin = $user->role_id == "3";
        $garage = $user->role_id == "2";

        if($user && $user->role_id == '1') {

            return redirect()->route('user.dash');

        }

        if($admin){

            return redirect()->route('admin.dash');
        } 
        
        if($garage){
            return redirect()->route('garage.dash');
        }

    }
}
