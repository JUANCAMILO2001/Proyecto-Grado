<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fecha',
        'description',
        'pay_id',
        'comment_id',
    ];

    /*relacion pedidos a pagos directa*/
    public function pay()
    {
        return $this->belongsTo('App\Models\Pay', 'pay_id');
    }

    /*relacion pedidos a comentarios directa*/
    public function comment()
    {
        return $this->belongsTo('App\Models\Comment', 'comment_id');
    }

    /* relacion muchos a muchos de pedidos a facturas  */
    public function bills()
    {
        return $this->belongsToMany('App\Models\Bill', 'order_bills');
    }
}
