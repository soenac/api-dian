<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDocumentIdentification extends Model
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
