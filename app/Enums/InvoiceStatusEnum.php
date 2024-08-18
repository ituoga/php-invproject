<?php

namespace App\Enums;

enum InvoiceStatusEnum: string
{
    case Paid = "paid";
    case Unpaid = "unpaid";
    case PartlyPaid = "partly-paid";

}
