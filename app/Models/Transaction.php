<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    function account()
    {
        return $this->belongsTo(Account::class);
    }
    function member()
    {
        return $this->belongsTo(Member::class);
    }
    function receive_category()
    {
        return $this->belongsTo(ReceiveCategory::class, 'category_id', 'id');
    }
    function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id', 'id');
    }
}
