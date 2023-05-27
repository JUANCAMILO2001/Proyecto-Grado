<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];


    /*relacion estados a usuarios inversa*/
    public function users()
    {
        return $this->hasMany('App\Models\User', 'state_id');
    }
    /*relacion estados a productos inversa*/
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'state_id');
    }
    /*relacion estados a productos inversa*/
    public function bills()
    {
        return $this->hasMany('App\Models\Bill', 'state_id');
    }
}
