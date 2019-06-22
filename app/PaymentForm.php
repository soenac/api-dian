<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentForm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code',
    ];
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'payment_method_code', 'payment_due_date', 'duration_measure', 'duration_measure_unit_code', 'payment_id',
    ];
    
    /**
     * Set the payment form method code.
     *
     * @param  string  $code
     * @return void
     */
    public function setPaymentMethodCodeAttribute($code) {
        $this->attributes['payment_method_code'] = $code;
    }
    
    /**
     * Get the payment form method code.
     *
     * @return string
     */
    public function getPaymentMethodCodeAttribute() {
        return $this->attributes['payment_method_code'] ?? null;
    }
    
    /**
     * Set the payment form due date.
     *
     * @param  string  $value
     * @return void
     */
    public function setPaymentDueDateAttribute($value) {
        $this->attributes['payment_due_date'] = $value;
    }
    
    /**
     * Get the payment form due date.
     *
     * @return string
     */
    public function getPaymentDueDateAttribute() {
        return $this->attributes['payment_due_date'] ?? null;
    }
    
    /**
     * Set the payment form duration measure.
     *
     * @param  string  $value
     * @return void
     */
    public function setDurationMeasureAttribute($value) {
        $this->attributes['duration_measure'] = $value;
    }
    
    /**
     * Get the payment form duration measure.
     *
     * @return string
     */
    public function getDurationMeasureAttribute() {
        return $this->attributes['duration_measure'] ?? null;
    }
    
    /**
     * Set the payment form duration measure unit code.
     *
     * @param  string  $value
     * @return void
     */
    public function setDurationMeasureUnitCodeAttribute($value) {
        $this->attributes['duration_measure_unit_code'] = $value;
    }
    
    /**
     * Get the payment form duration measure unit code.
     *
     * @return string
     */
    public function getDurationMeasureUnitCodeAttribute() {
        return $this->attributes['duration_measure_unit_code'] ?? 'DAY';
    }
    
    /**
     * Set the payment id.
     *
     * @param  string  $value
     * @return void
     */
    public function setPaymentIDAttribute($value) {
        $this->attributes['payment_id'] = $value;
    }
    
    /**
     * Get the payment id.
     *
     * @return string
     */
    public function getPaymentIDAttribute() {
        return $this->attributes['payment_id'] ?? 1;
    }
}
