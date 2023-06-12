<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    function index(): View
    {
        // $expenses_by_category = ExpenseCategory::select
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('created_at', 'ASC')
            ->pluck('count', 'month_name');

        $labels = $users->keys();
        $data = $users->values();
        // dd($labels, $data, $users);
        return view('dashboard', compact('labels', 'data'));
    }
}
