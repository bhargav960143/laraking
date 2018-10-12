<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\UserHasPermissions;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'dashboard']);
        UserHasPermissions::create([
            'permission_id' => '1',
            'model_type' => 'App\User',
            'model_id' => '1'
        ]);
    }
}
