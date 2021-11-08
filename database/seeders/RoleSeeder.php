<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = $this->getRoles();

        foreach ($roles as $item)
		{
            $role = new Role();
            $role->slug = $item['slug'];
            $role->title = $item['title'];
            $role->description = $item['description'];
			$role->save();
		}
    }

    private function getRoles()
    {
        return [
            [
                'slug' => 'admin',
                'title' => 'Administrador',
                'description' => 'Completo controle às funções de sistema do Archeîon.'
            ],
            [
                'slug' => 'editor',
                'title' => 'Editor',
                'description' => 'Possui autorização para criar e editar em funções de sistema do Archeîon.'
            ],
            [
                'slug' => 'contributor',
                'title' => 'Contribuidor',
                'description' => 'Possui autorização para criar sugestões de transcrição de documentos.'
            ]
        ];
    }
}
