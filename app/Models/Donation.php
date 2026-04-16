<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['account_name', 'amount', 'sovereigns', 'payment_method', 'transaction_id', 'is_completed'])]
class Donation extends Model
{
    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
        ];
    }
}
