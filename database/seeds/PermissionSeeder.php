<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            "name" => "Ver página administrativa",
            "slug" => "admin.home",
            "description" => "Puede ver la página principal de administración",
        ]);

        
        Permission::create([
            "name" => "Ver lista de usuarios",
            "slug" => "admin.users.index",
            "description" => "Puede ver lista completa de usuarios",
        ]);
            
        Permission::create([
            "name" => "Ver detalle de usuario",
            "slug" => "admin.users.show",
            "description" => "Puede ver el detalle de un usuario",
        ]);

        Permission::create([
            "name" => "Asignar un rol",
            "slug" => "admin.users.edit",
            "description" => "Puede Asignar un rol",
        ]);


        Permission::create([
            "name" => "Ver cursos",
            "slug" => "admin.cursos.index",
            "description" => "Puede ver la lista de cursos dictados",
        ]);

        Permission::create([
            "name" => "Crear cursos",
            "slug" => "admin.cursos.create",
            "description" => "Puede crear un nuevo curso",
        ]);

        Permission::create([
            "name" => "Ver detalles de un curso",
            "slug" => "admin.cursos.show",
            "description" => "Puede ver el detalle de un curso creado",
        ]);

        Permission::create([
            "name" => "Editar cursos",
            "slug" => "admin.cursos.edit",
            "description" => "Puede editar un curso",
        ]);

        Permission::create([
            "name" => "Eliminar cursos",
            "slug" => "admin.cursos.destroy",
            "description" => "Puede eliminar un curso",
        ]);


        Permission::create([
            "name" => "Ver posts",
            "slug" => "admin.posts.index",
            "description" => "Puede ver la lista de posts creados",
        ]);

        Permission::create([
            "name" => "Crear post",
            "slug" => "admin.posts.create",
            "description" => "Puede crear un nuevo post",
        ]);

        Permission::create([
            "name" => "Ver detalles de un post",
            "slug" => "admin.posts.show",
            "description" => "Puede ver el detalle de un post creado",
        ]);

        Permission::create([
            "name" => "Editar posts",
            "slug" => "admin.posts.edit",
            "description" => "Puede editar un post",
        ]);

        Permission::create([
            "name" => "Eliminar posts",
            "slug" => "admin.posts.destroy",
            "description" => "Puede eliminar un post",
        ]);


        Permission::create([
            "name" => "Ver manuales",
            "slug" => "admin.manuales.index",
            "description" => "Puede ver la lista de manuales creados",
        ]);

        Permission::create([
            "name" => "Crear manuales",
            "slug" => "admin.manuales.create",
            "description" => "Puede crear un nuevo manual",
        ]);

        Permission::create([
            "name" => "Ver detalles de un manual",
            "slug" => "admin.manuales.show",
            "description" => "Puede ver el detalle de un manual creado",
        ]);

        Permission::create([
            "name" => "Editar manuales",
            "slug" => "admin.manuales.edit",
            "description" => "Puede editar un manual",
        ]);

        Permission::create([
            "name" => "Eliminar manuales",
            "slug" => "admin.manuales.destroy",
            "description" => "Puede eliminar un manual",
        ]);

    }
}
