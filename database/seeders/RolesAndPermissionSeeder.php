<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Etape 1 : vider le cache avant toute  modification 
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // etpae 2: creeer les permissions
        Permission::create(['name' => 'view articles']);
        Permission::create(['name' => 'create article']);
        Permission::create(['name' => 'edit article']);
        Permission::create(['name' => 'delete article']);
        Permission::create(['name' => 'manage users']);
        //etape 3 : creer les roles et leur assignme des permissions
        $viewer=Role::create(['name'=>'viewer']);
        $viewer->givePermissionTo('view articles');
        $editor=Role::create(['name'=>'editor']);
        $editor->givePermissionTo([
            'view articles',
            'create article',
            'edit article',
            'delete article'
        ]);
        $admin=Role::create(['name'=>'admin']);
        $admin->givePermissionTo(Permission::all());


    }
}
