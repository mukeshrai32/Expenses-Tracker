<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Yajra\DataTables\Facades\Datatables;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tables = DB::select('SHOW TABLES');

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

        // dd($request->file('avatar'));

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store(options: 'avatars');
        }
        $expense = ExpenseCategory::create([
            'title' => $request->title,
            'description' => $request->description,
            'avatar' => $avatar,
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
            $data = ExpenseCategory::select('expense_categories.id', 'title', 'avatar', 'description', 'created_by', 'status', 'expense_categories.created_at', 'expense_categories.updated_at')->with('creator');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('avatar', function ($row) {
                    if ($row->avatar) {
                        return \Storage::disk('avatars')->url($row->avatar);

                        // temporaryUrl() only for online storage ??
                        // return \Storage::disk('avatars')->temporaryUrl($row->avatar, now()->addMinutes(5));
                    }
                    return '';
                })
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
