<?php

namespace App\Enums;

enum InvoiceTypeEnum: string
{
    case Debit = "debit";
    case Credit = "credit";
    case Preliminary = "preliminary";
}
