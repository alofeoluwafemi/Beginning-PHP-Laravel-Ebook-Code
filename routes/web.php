<?php

Auth::routes();

Route::get('/', function (\App\Inventory $inventory) {
    return redirect()->route('inventory.home');
});

Route::group(['prefix' => 'app','middleware' => 'auth'],function($route){
    $route->get('/', 'AppController@dashboard')
        ->name('inventory.home');
    $route->get('/create', 'InventoryController@createInventory')
        ->name('inventory.create');
    $route->post('/create', 'InventoryController@storeInventory')
        ->name('inventory.store');
    $route->get('/inventories', 'InventoryController@viewInventories')
        ->name('inventory.all');
    //The value in the curly braces must match the model of the table we are deleting from
    //as this will allow Laravel knows which class to resolve
    $route->delete('/inventories/{inventory}/drop','InventoryController@drop')
        ->name('inventory.delete');
    $route->get('/inventories/{inventory}/restore','InventoryController@restoreItem')
        ->name('inventory.restore');
    $route->delete('/inventories/{inventory}/purge','InventoryController@purgeItem')
        ->name('inventory.purge');
    $route->get('/inventories/trash','InventoryController@viewTrash')
        ->name('inventory.trash');
    $route->get('/inventories/{inventory}/edit','InventoryController@editInventory')
        ->name('inventory.edit');
    $route->put('/inventories/{inventory}/edit','InventoryController@updateInventory')
        ->name('inventory.update');
});