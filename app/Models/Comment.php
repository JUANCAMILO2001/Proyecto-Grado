<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pgr',
        'bill_id',
    ];

    /*relacion comentarios a facturas directa corregida*/
    public function bill()
    {
        return $this->belongsTo('App\Models\Bills', 'bill_id');
    }

}
