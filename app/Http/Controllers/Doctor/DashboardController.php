<?php

declare(strict_types=1);

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;

class DashboardController extends Controller
{
    /**
     * this if function is used to return the function
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function index()
    {
        return view('doctor.dashboard');
    }
}
