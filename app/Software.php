<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identifier', 'pin', 'url',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'company_id',
    ];
}
