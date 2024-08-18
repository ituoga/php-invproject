<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_series_deb
 * @property string $invoice_series_cre
 * @property string $invoice_series_pre
 * @property string $invoice_number_cre
 * @property string $invoice_number_pre
 * @property string $invoice_number_deb
 * @property string $company_name
 */
class Config extends Model
{
    use HasFactory;

    public $guarded = ["_token"];
}
