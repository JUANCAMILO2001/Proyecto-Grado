<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;

    protected $table = 'bills';
    protected $primaryKey = 'id';
    protected $fillable = [
        'method_pay',
        'user_id',
        'state_id',
        'pay_cacelar',
        'address_bill',
        'checkout_img',
    ];

    /*relacion factura a usuario directa correccion*/
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /*relacion factura a estados directa*/
    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }

    /* relacion muchos a muchos de facturas a productos */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'bill_products')
                    ->withPivot('quantity', 'description', 'subtotal', 'total', 'name');
    }
    /*relacion factura a comentario inversa corregida*/
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'bill_id');
    }
}
