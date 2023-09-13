<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Role::insert([
            [
                'name' => 'Freelancer',
                'title' => 'I am a freelancer',
                'description' => 'If you are an independent professional or self-employed individual offering your services to others, select this option.',
            ],
            [
                'name' => 'Customer',
                'title' => 'I want freelancers services',
                'description' => 'If you need help with a project or task and want to hire an independent professional or self-employed individual to assist you, select this option.',
            ],
            [
                'name' => 'Admin',
                'title' =>null,
                    'description' =>null
            ]
        ]);
    }

}
