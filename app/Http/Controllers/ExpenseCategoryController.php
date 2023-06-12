<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Yajra\DataTables\Facades\Datatables;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('expense_category.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'status' => [new Enum(StatusEnum::class)],
        ]);

        $expense = ExpenseCategory::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'created_by' => Auth::id(),
        ]);

        return redirect('expense_category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Lists data from storage in JSON
     */
    public function listJson(Request $request)
    {
        if ($request->ajax()) {
            $data = ExpenseCategory::select('expense_categories.id', 'title', 'description', 'created_by', 'status', 'expense_categories.created_at', 'expense_categories.updated_at')->with('creator');
            return Datatables::of($data)
                ->addIndexColumn()
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
