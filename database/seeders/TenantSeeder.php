<?php

namespace Database\Seeders;

use App\Models\TenantUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TenantUser::create([
        //     "name" => "Tenant user",
        //     // "email" => "test@example.com",
        // ]);
        User::create([
            "name" => "Tenant user",
            "email" => "test@example.com",
            "password" => bcrypt("pzkz"),
        ]);
    }
}
