<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Alumno']);
        $role3 = Role::create(['name' => 'Moderador']);

        Permission::create(['name' => 'editarregistros'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminarregistros'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'actulizarregistros'])->syncRoles([$role1]);
        Permission::create(['name' => 'aceptarsolicitud'])->syncRoles([$role1, $role3]);
    }
}
