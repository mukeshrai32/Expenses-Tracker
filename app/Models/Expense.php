<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    /**
     *
     */

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'quantity',
        'expense_amount',
        'created_by',
    ];

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'created_by')->select('users.id', 'name');
    }
}
