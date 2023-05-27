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
        'detail',
    ];

    /*relacion estados a usuarios inversa*/
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'comment_id');
    }
}
