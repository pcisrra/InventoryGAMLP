<?php

return [
    'userManagement'   => [
        'title'          => 'Ajustes',
        'title_singular' => 'Ajustes',
    ],
    'permission'       => [
        'title'          => 'Permisos',
        'title_singular' => 'Permiso',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Título',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'             => [
        'title'          => 'Roles',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Título',
            'title_helper'       => '',
            'permissions'        => 'Permisos',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'             => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuario',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Nombre',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'location'         => [
        'title'          => 'Localizaciones',
        'title_singular' => 'Localización',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'code'               => 'Código',
            'code_helper'        => '',
            'description'        => 'Descripción',
            'description_helper' => '',
            'ref_picture'        => 'Fotografía(s)',
            'ref_picture_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'activeManagement' => [
        'title'          => 'Gestión de Activos',
        'title_singular' => 'Gestión de Activo',
    ],
    'active'           => [
        'title'          => 'Activos',
        'title_singular' => 'Activo',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'code'                  => 'Código',
            'code_helper'           => '',
            'classification'        => 'Clasificación',
            'classification_helper' => '',
            'description'           => 'Descripción',
            'description_helper'    => '',
            'cost'                  => 'Costo',
            'cost_helper'           => '',
            'ubication'             => 'Ubicación',
            'ubication_helper'      => '',
            'observations'          => 'Observaciones',
            'observations_helper'   => '',
            'condition'             => 'Estado',
            'condition_helper'      => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
    'tool'             => [
        'title'          => 'Herramientas',
        'title_singular' => 'Herramienta',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'code'                 => 'Código',
            'code_helper'          => '',
            'description'          => 'Descripción',
            'description_helper'   => '',
            'quantity'             => 'Cantidad',
            'quantity_helper'      => '',
            'user_asignado'        => 'Funcionario Asignado',
            'user_asignado_helper' => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => '',
        ],
    ],
    'material'         => [
        'title'          => 'Materiales',
        'title_singular' => 'Material',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'code'                => 'Código',
            'code_helper'         => '',
            'description'         => 'Descripción',
            'description_helper'  => '',
            'unity'               => 'Unidad',
            'unity_helper'        => '',
            'quantity'            => 'Cantidad',
            'quantity_helper'     => '',
            'unitary_cost'        => 'Costo Unitario',
            'unitary_cost_helper' => '',
            'total_cost'          => 'Costo Total',
            'total_cost_helper'   => '',
            'localization'        => 'Ubicación',
            'localization_helper' => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
        ],
    ],
    'sample'           => [
        'title'          => 'Muestras',
        'title_singular' => 'Muestra',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'code'              => 'Código',
            'code_helper'       => '',
            'detail'            => 'Detalle',
            'detail_helper'     => '',
            'material'          => 'Material',
            'material_helper'   => '',
            'condition'         => 'Estado',
            'condition_helper'  => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'report'           => [
        'title'          => 'Reportes',
        'title_singular' => 'Reporte',
    ],
    'materialEntry'    => [
        'title'          => 'Ingresos de Material',
        'title_singular' => 'Ingresos de Material',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'observations'        => 'Observaciones',
            'observations_helper' => '',
            'entry_date'          => 'Fecha de Ingreso',
            'entry_date_helper'   => '',
            'entry_cost'          => 'Costo (ingreso)',
            'entry_cost_helper'   => '',
            'unity'               => 'Unidad',
            'unity_helper'        => '',
            'quantity'            => 'Cantidad',
            'quantity_helper'     => '',
            'material'            => 'Código de Material',
            'material_helper'     => '',
            'user'                => 'Ingresado Por',
            'user_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
        ],
    ],
    'outputMaterial'   => [
        'title'          => 'Solicitudes de Material',
        'title_singular' => 'Solicitudes de Material',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'observations'           => 'Observaciones',
            'observations_helper'    => '',
            'date_sol'               => 'Fecha de Solicitud',
            'date_sol_helper'        => '',
            'ots'                    => 'Ots',
            'ots_helper'             => '',
            'output_unity'           => 'Unidad',
            'output_unity_helper'    => '',
            'output_quantity'        => 'Cantidad',
            'output_quantity_helper' => '',
            'material'               => 'Código de Material',
            'material_helper'        => '',
            'user'                   => 'Solicitante',
            'user_helper'            => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => '',
        ],
    ],
];
