<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Statistic extends Controller
{
    public function index(Request $request)
    {
        return view("dashboard.statistic.index");
    }
}
