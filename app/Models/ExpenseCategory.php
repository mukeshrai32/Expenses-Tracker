<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'created_by')->select('users.id', 'name');
    }
}
