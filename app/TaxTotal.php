<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxTotal extends Model
{
    /**
     * With default model.
     * @var array
     */
    protected $with = [
        'tax', 'unit_measure',
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tax_id', 'unit_measure_id', 'percent', 'tax_amount', 'taxable_amount', 'base_unit_measure', 'per_unit_amount',
    ];
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'is_fixed_value',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'tax', 'unit_measure',
    ];
    
    /**
     * Get the tax that owns the tax total.
     */
    public function tax() {
        return $this->belongsTo(Tax::class);
    }
    
    /**
     * Get the unit measure that owns the tax total.
     */
    public function unit_measure() {
        return $this->belongsTo(UnitMeasure::class);
    }
    
    /**
     * Get the allowance charge multiplier factor numeric.
     *
     * @return string
     */
    public function getIsFixedValueAttribute() {
        return ($this->tax_id == 10);
    }
}
