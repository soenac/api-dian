<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalMonetaryTotal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'line_extension_amount', 'tax_exclusive_amount', 'tax_inclusive_amount', 'allowance_total_amount', 'charge_total_amount', 'pre_paid_amount', 'payable_amount',
    ];
}
