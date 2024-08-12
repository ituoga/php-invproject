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

            $table->string('invoice_number');
            $table->string('invoice_series');
            $table->string('invoice_currency');
            $table->date('document_date');

            $table->boolean('paid')->default(false);

            $table->date('pay_until')->nullable();

            $table->decimal("invoice_total", 10,2)->nullable();
            $table->decimal("invoice_vat", 10,2)->nullable();
            $table->decimal("invoice_total_with_vat", 10,2)->nullable();

            $table->text("invoice_notes")->nullable();
            $table->text("invoice_author")->nullable();
            $table->text("invoice_contrahent")->nullable();
            $table->text("invoice_comment")->nullable();
            


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
            $table->text('comment')->nullable();
            $table->decimal('product_qty', 8, 2);
            $table->decimal('product_name', 8, 2);
            $table->decimal('product_price', 8, 2);
            $table->decimal('unit', 8, 2);
            $table->decimal('vat', 8, 2);
            $table->decimal('total', 8, 2);



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
