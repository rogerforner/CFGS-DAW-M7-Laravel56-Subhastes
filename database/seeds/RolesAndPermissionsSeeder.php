<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Resetejar la caché de rols i permisos.
        app()['cache']->forget('spatie.permission.cache');

        // Crear permisos.
        // Hem decidit no emprar-ne.

        // Crear rols i, també, assignar permisos.
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'auctionManager']);
        $role = Role::create(['name' => 'user']);
    }
}
