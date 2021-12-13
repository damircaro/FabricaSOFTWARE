<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            ['permission_index','1'],
            ['permission_show', '1'],
            ['permission_create', '1'],
            ['permission_edit', '1'],
            ['permission_destroy', '1'],

            ['role_index','2'],
            ['role_create','2'],
            ['role_show','2'],
            ['role_edit','2'],
            ['role_destroy','2'],

            ['user_index','3'],
            ['user_create','3'],
            ['user_show','3'],
            ['user_edit','3'],
            ['user_destroy','3'],

            ['post_index','4'],
            ['post_create','4'],
            ['post_show','4'],
            ['post_edit','4'],
            ['post_destroy','4'],

            ['categoria_index','5'],
            ['categoria_create','5'],
            ['categoria_show','5'],
            ['categoria_edit','5'],
            ['categoria_destroy','5'],
        ];
        $categorias=[
            "permisos","roles","usuarios","post","categoria"

        ];
        foreach($categorias as $categoria){
            categoria::create([
                'name_category' => $categoria


            ]);

        }

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission[0],
                'category_permission_id'=>$permission[1]

            ]);
        }
    }
}
