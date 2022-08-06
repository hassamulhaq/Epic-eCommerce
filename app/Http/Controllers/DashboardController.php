<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('/layouts/dashboard');
    }

    public function preview() {
        return view('/layouts/dashboard_preview');
    }
}
