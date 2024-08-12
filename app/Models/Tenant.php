<?php

namespace App\Models;

use Exception;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;


class Tenant extends BaseTenant implements TenantWithDatabase
{
 
    use HasDatabase, HasDomains;


    public function primary_domain()
    {
        return $this->hasOne(Domain::class)->where('is_primary', true);
    }

    public function fallback_domain()
    {
        return $this->hasOne(Domain::class)->where('is_fallback', true);
    }
    
    public function impersonationUrl($user_id): string
    {
        /**
         * @var \Stancl\Tenancy\Tenancy
         */
        $tenancy = tenancy();
        // @phpstan-ignore-next-line
        $token = $tenancy->impersonate($this, $user_id, $this->route('dashboard'), 'web')->token;

        return $this->route('impersonate', ['token' => $token]);
    }

    public function route($route, $parameters = [], $absolute = true)
    {
        // @phpstan-ignore-next-line
        if (! $this->primary_domain) {
            throw new Exception("Tenant {$this->id} does not have a primary domain.");
        }

        $domain = $this->primary_domain->domain;

        $parts = explode('.', $domain);
        if (count($parts) === 1) { // If subdomain
            $domain = Domain::domainFromSubdomain($domain);
        }

        return tenant_route($domain, $route, $parameters, $absolute);
    }
}
