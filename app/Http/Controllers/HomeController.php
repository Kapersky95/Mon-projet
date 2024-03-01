<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('assign', ['only' => ['index']]);
    }

    public function index() 
    {
        $users = User::all()->count();

        if (Gate::allows('admin')) {
            return view('admin.home', compact('users'));
        }

        return view('user.home');
    }
}
