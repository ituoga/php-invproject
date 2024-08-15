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
            $table->string("seller_idv");
            $table->string("seller_name");
            $table->string('seller_code');
            $table->string("seller_vat")->nullable();
            $table->string("seller_phone")->nullable();
            $table->string("seller_email")->nullable();
            $table->string("seller_address")->nullable();
            $table->string("seller_country")->nullable();
            $table->string("seller_bank")->nullable();
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
