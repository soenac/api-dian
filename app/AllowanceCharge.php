<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class AllowanceCharge extends Model
{
    /**
     * With default model.
     *
     * @var array
     */
    protected $with = [
        'discount',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discount_id', 'charge_indicator', 'allowance_charge_reason', 'multiplier_factor_numeric', 'amount', 'base_amount',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'multiplier_factor_numeric',
    ];

    /**
     * Get the discount record associated with the allowance charge.
     */
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    /**
     * Get the charge indicator.
     *
     * @return string
     */
    public function getChargeIndicatorAttribute()
    {
        return ($this->attributes['charge_indicator']) ? 'true' : 'false';
    }

    /**
     * Get the allowance charge multiplier factor numeric.
     *
     * @return string
     */
    public function getMultiplierFactorNumericAttribute()
    {
        if (isset($this->attributes['multiplier_factor_numeric'])) {
            return number_format($this->attributes['multiplier_factor_numeric'], 2, '.', '');
        }

        try {
            return number_format((($this->attributes['amount'] / $this->attributes['base_amount']) * 100), 2, '.', '');
        } catch (Exception $e) {
            return '0.00';
        }
    }
}
