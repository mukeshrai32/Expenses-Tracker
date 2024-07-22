<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ChartJsController extends Controller
{


    function index(): View
    {
        // $var = 'Test';
        // $users = User::get();

        return view('chart.charts_demo');
    }
}
