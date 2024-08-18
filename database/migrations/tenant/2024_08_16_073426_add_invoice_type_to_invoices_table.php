<?php

use App\Enums\InvoiceStatusEnum;
use App\Enums\InvoiceTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string("type")->default(InvoiceTypeEnum::Debit)->nullable(); // preliminary, credit
            $table->dateTime("credited_at")->nullable();
            $table->unsignedBigInteger("invoice_id")->nullable();
            $table->string("status")->default(InvoiceStatusEnum::Unpaid)->nullable(); // paid, partly-paid
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn([
                "type", "credited_at", "invoice_id", "status",
            ]);
        });
    }
};
