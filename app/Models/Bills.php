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
        'state_pay',
        'user_id',
        'state_id',
    ];

    /*relacion factura a usuario directa*/
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
        return $this->belongsToMany('App\Models\Product', 'bill_products');
    }

    /* relacion muchos a muchos de facturas a pedidos */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_bills');
    }
}
