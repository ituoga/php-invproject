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
        Schema::table('configs', function (Blueprint $table) {
            $table->string('invoice_series_pre')->nullable();
            $table->string('invoice_number_pre')->nullable();

            $table->string('invoice_series_deb')->nullable();
            $table->string('invoice_number_deb')->nullable();

            $table->string('invoice_series_cre')->nullable();
            $table->string('invoice_number_cre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('configs', function (Blueprint $table) {
            //
        });
    }
};
