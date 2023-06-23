<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillProducts extends Model
{
    use HasFactory;
    protected $table = 'bill_products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'product_id',
        'bills_id',
        'description',
        'quantity',
        'subtotal',
        'total',
    ];
}
