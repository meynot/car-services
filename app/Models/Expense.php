<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'reference',
        'amount',
        'description',
        'is_confirmed',
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
        'is_confirmed' => 'boolean',
    ];
}
