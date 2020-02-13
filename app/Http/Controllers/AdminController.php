<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Checkadmin');

    }
    public function indexadmin()
    {
        return view('admin.layouts.admin');
    }
    public function dashboard()
    {
        return view('admin.dashboard.dashboard');
    }
}
