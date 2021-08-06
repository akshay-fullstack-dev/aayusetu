<?php

namespace App\Http\Controllers\Admin;

use App\Enum\UserEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }
    public function clients()
    {
        $clients = User::where('role', UserEnum::CLIENT_ROLE)->get();
        return view('admin.client', compact('clients'));
    }

    public function doctors()
    {
        $clients = User::where('role', UserEnum::DOCTOR_ROLE)->get();
        return view('admin.doctor', compact('clients'));
    }

    public function admins()
    {
        $clients = User::where('role', UserEnum::ADMIN_ROLE)->get();
        return view('admin.admin', compact('clients'));
    }
}
