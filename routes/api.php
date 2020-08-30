<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Locations
    Route::post('locations/media', 'LocationsApiController@storeMedia')->name('locations.storeMedia');
    Route::apiResource('locations', 'LocationsApiController');

    // Actives
    Route::apiResource('actives', 'ActiveApiController');

    // Tools
    Route::apiResource('tools', 'ToolApiController');

    // Materials
    Route::apiResource('materials', 'MaterialApiController');

    // Samples
    Route::apiResource('samples', 'SampleApiController');

    // Material Entries
    Route::apiResource('material-entries', 'MaterialEntryApiController');

    // Output Materials
    Route::apiResource('output-materials', 'OutputMaterialApiController');
});
