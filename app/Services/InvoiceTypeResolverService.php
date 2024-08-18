<?php

namespace App\Services;

use App\Enums\InvoiceTypeEnum;
use App\Models\Config;

class InvoiceTypeResolverService
{
    public function resolve(Config $config, $type)
    {
        switch ($type) {
            case InvoiceTypeEnum::Credit->value:
                return $config->invoice_series_cre;
            case InvoiceTypeEnum::Preliminary->value:
                return $config->invoice_series_pre;
            default:
                return $config->invoice_series_deb;
        }
    }
}
