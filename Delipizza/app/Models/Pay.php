<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $table = 'pays';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pay_method',
        'pay_total',
    ];

    /*relacion pago a pedidos inversa*/
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'pay_id');
    }
}
