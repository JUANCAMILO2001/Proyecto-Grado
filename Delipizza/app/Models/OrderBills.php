<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderBills extends Model
{
    use HasFactory;

    protected $table = 'order_bills';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'bill_id',
    ];
}
