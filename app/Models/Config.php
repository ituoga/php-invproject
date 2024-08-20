<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $invoice_series_deb
 * @property string $invoice_series_cre
 * @property string $invoice_series_pre
 * @property int $invoice_number_cre
 * @property int $invoice_number_pre
 * @property int $invoice_number_deb
 * @property string $company_name
 */
class Config extends Model
{
    use HasFactory;

    public $guarded = ["id", "_token", "_method"];

    protected $casts = [
        "invoice_number_pre" => "integer",
        "invoice_number_deb" => "integer",
        "invoice_number_cre" => "integer",
    ];
}
