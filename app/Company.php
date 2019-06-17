<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'identification_number', 'dv', 'type_environment_id', 'type_document_identification_id', 'country_id', 'type_currency_id', 'type_organization_id', 'type_regime_id', 'type_liability_id', 'municipality_id', 'address', 'phone',
    ];
    
    /**
     * Get the software record associated with the company.
     */
    public function software() {
        return $this->hasOne(Software::class);
    }
    
    /**
     * Get the certificate record associated with the company.
     */
    public function certificate() {
        return $this->hasOne(Certificate::class);
    }
    
    /**
     * Get the resolutions record associated with the company.
     */
    public function resolutions() {
        return $this->hasMany(Resolution::class);
    }
}
