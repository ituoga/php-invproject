<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\TenantUser;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            "password" => bcrypt("password"),
        ]);

        $tenant = Tenant::create(['email' => "test@example.com", 'id'=>"two"]);
        $domain = $tenant->createDomain('two.saas.test');
        $domain->makePrimary();

    }
}
