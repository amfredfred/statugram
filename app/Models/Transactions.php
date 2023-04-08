<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
 {
    use HasFactory;

    protected $fillable = [
        'status',   'amount',   'method',  'account_details', 'currency',  'user_id',
    ];
}
