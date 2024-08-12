<?php

namespace App\Overrides;

use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\TenantDatabaseManagers\SQLiteDatabaseManager as SQLDM;

class SQLiteDatabaseManager extends SQLDM {
    public function createDatabase(TenantWithDatabase $tenant): bool
    {
        try {
            return file_put_contents(base_path("dbs/".$tenant->database()->getName()), '');
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function deleteDatabase(TenantWithDatabase $tenant): bool
    {
        try {
            return unlink(base_path("dbs/".$tenant->database()->getName()));
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function databaseExists(string $name): bool
    {
        return file_exists(base_path("dbs/".$name));
    }

    public function makeConnectionConfig(array $baseConfig, string $databaseName): array
    {
        $baseConfig['database'] = base_path("dbs/".$databaseName);

        return $baseConfig;
    }

    public function setConnection(string $connection): void
    {
        //
    }
}