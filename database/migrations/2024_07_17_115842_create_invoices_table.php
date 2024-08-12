<?php

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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->decimal('total_amount', 8, 2);
            $table->boolean('paid')->default(false);

            $table->date('written_at')->nullable();
            $table->date('pay_unitl')->nullable();


            $table->string('seller_name')->nullable();
            $table->string('seller_code')->nullable();
            $table->string('seller_vat')->nullable();
            $table->string('seller_email')->nullable();
            $table->string('seller_phone')->nullable();
            $table->string('seller_address')->nullable();
            $table->string('seller_country')->nullable();


            $table->string('contrahent_name')->nullable();
            $table->string('contrahent_code')->nullable();
            $table->string('contrahent_vat')->nullable();
            $table->string('contrahent_email')->nullable();
            $table->string('contrahent_phone')->nullable();
            $table->string('contrahent_address')->nullable();
            $table->string('contrahent_country')->nullable();

            
        });

        // Create the invoice lines table
        Schema::create('invoice_lines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('invoice_id');
            $table->string('description');
            $table->decimal('quantity', 8, 2);
            $table->decimal('unit_price', 8, 2);
            $table->decimal('line_total', 8, 2);


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoices_lines');
    }
};
