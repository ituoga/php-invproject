<?php

namespace Database\Seeders;

use App\Models\TenantUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TenantUser::create([
            "name" => "Tenant user",
            // "email" => "test@example.com",
        ]);
    }
}
