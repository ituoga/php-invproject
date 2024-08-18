<?php

use App\Enums\InvoiceTypeEnum;
use App\Models\Tenant;
use App\Models\User;

beforeEach(function() {

});

test('set invoice type to session and redirect to create', function () {
    $user = User::factory()->create();

    unlink(base_path("dbs/tenant_testing.sqlite"));
    $tenant = \App\Models\Tenant::create(['id'=>'testing','email'=>'test@test.test']);
    $tenant->createDomain("testing.saas.test");
    tenancy()->initialize($tenant);

    $config = \App\Models\Config::factory()->create();

    $response = $this->actingAs($user)
            ->get('/invoices/create/'. InvoiceTypeEnum::Debit->value);

    $response->assertStatus(302);
    $response->assertRedirect("/invoices/create");
    $response->assertSessionHas("invoice.type", InvoiceTypeEnum::Debit->value);
});
