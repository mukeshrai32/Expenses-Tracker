<?php

namespace App\Console\Commands;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateExpenseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:expense';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new Expense to DB';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expense['title'] = $this->ask('Enter Expense Title.');
        $expense['description'] = $this->ask('Enter Expense Description.');

        $categories = ExpenseCategory::where('status', 'active')->pluck('title', 'id')->toArray();
        $category = $this->choice('Enter Expense Category.', $categories);
        $sel_cat = ExpenseCategory::where('title', $category)->firstOrFail();
        if (!$sel_cat) {
            $this->error('Category not Found');
            return;
        } else {
            $expense['category_id'] = $sel_cat->id;
        }

        $expense['quantity'] = $this->ask('Enter Expense Quantity.');
        $expense['expense_amount'] = $this->ask('Enter Expense Amount (int).');
        $expense['created_by'] = 1;

        DB::transaction(function () use ($expense) {
            $newExpense = Expense::create($expense);
            // $newExpense->tags()->attach($tag->id);
        });

        $this->info('New Expense added Successfully.' . json_encode($expense));
    }
}
