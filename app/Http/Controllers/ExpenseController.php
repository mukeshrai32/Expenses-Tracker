<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\Datatables;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // $expenses = cache()->remember('expenses-cache', 10, function () {
        //     return Expense::select('title', 'quantity', 'expense_amount', 'created_by', 'created_at')->with('creator')->get();
        // });
        // $expenses = Expense::select('title', 'quantity', 'expense_amount', 'created_by', 'created_at')->get();
        // $expenses =  Expense::select('title', 'quantity', 'expense_amount', 'created_by', 'created_at')->with('creator')->limit(1000)->get();
        // dd($expenses);

        return view('expense.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $expense_categories = ExpenseCategory::where('status', StatusEnum::Active)->get();
        return view('expense.create', compact('expense_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'numeric'],
            'expense_amount' => ['required', 'numeric'],
        ]);

        $expense = Expense::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'expense_amount' => $request->expense_amount,
            'created_by' => Auth::id(),
        ]);


        return redirect('expense');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }

    /**
     * Lists data from storage in json
     */
    public function listJson(Request $request)
    {
        if ($request->ajax()) {
            $expenses = Expense::select('expenses.id', 'title', 'quantity', 'expense_amount', 'category_id', 'created_by', 'expenses.created_at', 'expenses.updated_at')->with('creator');
            return Datatables::of($expenses)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('M d, Y');
                })
                ->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('M d, Y');
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            $response = new Response([
                'status' => false,
                'message' => 'Invalid call'
            ]);

            return $response;
        }
    }
}
