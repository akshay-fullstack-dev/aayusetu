<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $current_user = Auth::user();
        return view('admin.dashboard',compact('current_user'));
    }
}
