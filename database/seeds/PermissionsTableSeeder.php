<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'location_create',
            ],
            [
                'id'    => 18,
                'title' => 'location_edit',
            ],
            [
                'id'    => 19,
                'title' => 'location_show',
            ],
            [
                'id'    => 20,
                'title' => 'location_delete',
            ],
            [
                'id'    => 21,
                'title' => 'location_access',
            ],
            [
                'id'    => 22,
                'title' => 'active_management_access',
            ],
            [
                'id'    => 23,
                'title' => 'active_create',
            ],
            [
                'id'    => 24,
                'title' => 'active_edit',
            ],
            [
                'id'    => 25,
                'title' => 'active_show',
            ],
            [
                'id'    => 26,
                'title' => 'active_delete',
            ],
            [
                'id'    => 27,
                'title' => 'active_access',
            ],
            [
                'id'    => 28,
                'title' => 'tool_create',
            ],
            [
                'id'    => 29,
                'title' => 'tool_edit',
            ],
            [
                'id'    => 30,
                'title' => 'tool_show',
            ],
            [
                'id'    => 31,
                'title' => 'tool_delete',
            ],
            [
                'id'    => 32,
                'title' => 'tool_access',
            ],
            [
                'id'    => 33,
                'title' => 'material_create',
            ],
            [
                'id'    => 34,
                'title' => 'material_edit',
            ],
            [
                'id'    => 35,
                'title' => 'material_show',
            ],
            [
                'id'    => 36,
                'title' => 'material_delete',
            ],
            [
                'id'    => 37,
                'title' => 'material_access',
            ],
            [
                'id'    => 38,
                'title' => 'sample_create',
            ],
            [
                'id'    => 39,
                'title' => 'sample_edit',
            ],
            [
                'id'    => 40,
                'title' => 'sample_show',
            ],
            [
                'id'    => 41,
                'title' => 'sample_delete',
            ],
            [
                'id'    => 42,
                'title' => 'sample_access',
            ],
            [
                'id'    => 43,
                'title' => 'report_access',
            ],
            [
                'id'    => 44,
                'title' => 'material_entry_create',
            ],
            [
                'id'    => 45,
                'title' => 'material_entry_edit',
            ],
            [
                'id'    => 46,
                'title' => 'material_entry_show',
            ],
            [
                'id'    => 47,
                'title' => 'material_entry_delete',
            ],
            [
                'id'    => 48,
                'title' => 'material_entry_access',
            ],
            [
                'id'    => 49,
                'title' => 'output_material_create',
            ],
            [
                'id'    => 50,
                'title' => 'output_material_edit',
            ],
            [
                'id'    => 51,
                'title' => 'output_material_show',
            ],
            [
                'id'    => 52,
                'title' => 'output_material_delete',
            ],
            [
                'id'    => 53,
                'title' => 'output_material_access',
            ],
            [
                'id'    => 54,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
