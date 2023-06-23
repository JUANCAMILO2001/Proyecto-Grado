<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
            'imagen',
            'name',
            'description',
            'pay',
            'state_id',
    ];

    /*relacion productos a estados corregida*/
    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }

    /* relacion muchos a muchos de productos a facturas corregida*/
    public function bills()
    {
        return $this->belongsToMany('App\Models\Bills', 'bill_products');
    }
}
