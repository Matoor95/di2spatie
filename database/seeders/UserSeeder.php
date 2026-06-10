<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // crrer un user admim
        $admin=User::create([
            'name'=>'Admin',
            'email'=>'admin@blog.test',
            'password'=>bcrypt('password')

        ]);
        // assigner le role admin
        $admin->assignRole('admin');
           $editor=User::create([
            'name'=>'Editor',
            'email'=>'editor@blog.test',
            'password'=>bcrypt('password')

        ]);
        $editor->assignRole('editor');
           $viewer=User::create([
            'name'=>'Viewer',
            'email'=>'viewer@blog.test',
            'password'=>bcrypt('password')

        ]);
        $viewer->assignRole('viewer');

    }
}
