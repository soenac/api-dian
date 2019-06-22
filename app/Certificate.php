<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'company_id', 'path',
    ];
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'path',
    ];
    
    /**
     * Get the invoice line allowance charges.
     *
     * @return string
     */
    public function getPathAttribute() {
        return storage_path("app/certificates/{$this->name}");
    }
}
