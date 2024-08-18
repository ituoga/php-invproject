<?php

namespace App\Services;

use App\Enums\InvoiceTypeEnum;
use App\Models\Config;

class InvoiceNumberResolverService
{
    public function resolve(Config $config, $type)
    {
        switch ($type) {
            case InvoiceTypeEnum::Credit->value:
                return $config->invoice_number_cre;
            case InvoiceTypeEnum::Preliminary->value:
                return $config->invoice_number_pre;
            default:
                return $config->invoice_number_deb;
        }
    }
}
