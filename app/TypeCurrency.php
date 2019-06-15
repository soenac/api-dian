<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCurrency extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code',
    ];
}
