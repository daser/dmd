<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrear extends Model
{
    protected $fillable = [
        'debtor',
        'creditor',
        'contact',
        'arrears_owed',
        'billing_date',
        'amount_settled',
        'nature_of_debt',
        'contract_terms',
        'file_reference',
        'economic_category',
        'comments',
        'arrears_state',
        'slug'
    ];
}
