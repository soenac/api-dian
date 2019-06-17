<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_document_id', 'prefix', 'resolution', 'resolution_date', 'technical_key', 'from', 'to', 'date_from', 'date_to',
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
