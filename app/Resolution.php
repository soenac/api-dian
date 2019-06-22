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
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'number', 'next_consecutive',
    ];
    
    /**
     * Get the number.
     *
     * @return string
     */
    public function getNumberAttribute() {
        return $this->attributes['number'] ?? $this->from;
    }
    
    /**
     * Set the resolution line number.
     *
     * @param  int  $number
     * @return void
     */
    public function setNumberAttribute(int $number) {
        $this->attributes['number'] = $number;
    }
    
    /**
     * Get the next consecutive.
     *
     * @return string
     */
    public function getNextConsecutiveAttribute() {
        return "{$this->prefix}{$this->number}";
    }
}
