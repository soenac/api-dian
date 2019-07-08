<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'type_document_id', 'year', 'next_consecutive',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'company_id', 'type_document_id',
    ];
}
