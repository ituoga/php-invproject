<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class TenantUserCommand extends Command
{
    use \Stancl\Tenancy\Concerns\TenantAwareCommand;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:create-user {--tenants=} {--email} {--password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function getTenants() {
        return \App\Models\Tenant::whereIn("id", $this->option("tenants"))->get();
    }
    public function handle()
    {
        User::create([
            'name' => 'John Doe',
            'email' => $this->option('email'),
            'password' => bcrypt($this->option("password")),
        ]);
    }
}
