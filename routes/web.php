<?php

Route::redirect('/', '/login');

//Reports
Route::get('/export_excel','ReportsController@index');
Route::get('/export_excel/generateMat','ReportsController@generateMat')->name('export_excel.generateMat');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Locations
    Route::delete('locations/destroy', 'LocationsController@massDestroy')->name('locations.massDestroy');
    Route::post('locations/media', 'LocationsController@storeMedia')->name('locations.storeMedia');
    Route::post('locations/ckmedia', 'LocationsController@storeCKEditorImages')->name('locations.storeCKEditorImages');
    Route::resource('locations', 'LocationsController');

    // Actives
    Route::delete('actives/destroy', 'ActiveController@massDestroy')->name('actives.massDestroy');
    Route::resource('actives', 'ActiveController');

    // Tools
    Route::delete('tools/destroy', 'ToolController@massDestroy')->name('tools.massDestroy');
    Route::resource('tools', 'ToolController');

    // Materials
    Route::delete('materials/destroy', 'MaterialController@massDestroy')->name('materials.massDestroy');
    Route::resource('materials', 'MaterialController');
    Route::get('/materials/enterMat/{codigo_material}/{cantidad}','MaterialesController@enterMat')->name('materials.enterMat');
    Route::get('/materials/exitMat/{codigo_material}/{cantidad}','MaterialesController@exitMat')->name('materials.exitMat');

    // Samples
    Route::delete('samples/destroy', 'SampleController@massDestroy')->name('samples.massDestroy');
    Route::resource('samples', 'SampleController');

    // Material Entries
    Route::delete('material-entries/destroy', 'MaterialEntryController@massDestroy')->name('material-entries.massDestroy');
    Route::resource('material-entries', 'MaterialEntryController');

    // Output Materials
    Route::delete('output-materials/destroy', 'OutputMaterialController@massDestroy')->name('output-materials.massDestroy');
    Route::resource('output-materials', 'OutputMaterialController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
