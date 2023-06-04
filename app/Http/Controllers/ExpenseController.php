<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = cache()->remember('expenses-cache', 10, function () {
            return Expense::paginate(15, ['title', 'expense_amount', 'quantity']);
        });
        return view('expense.list', ['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('expense.create');
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


        return redirect('expense.list');
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
}
