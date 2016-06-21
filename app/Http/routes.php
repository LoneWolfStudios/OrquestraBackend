<?php

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth',
    'middleware' => 'guest'
], function () {
    
    Route::get('/login', 'AuthController@getIndex');
    Route::post('/login', 'AuthController@postIndex');
    
});

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth',
    'middleware' => 'auth'
], function () {
    
    Route::get('/logout', 'AuthController@getLogout');
    
});

Route::group([
    'namespace' => 'Api',
    'prefix' => 'api'
], function () {
    
    Route::group([
        'namespace' => 'v1',
        'prefix' => 'v1'
    ], function () {
        
        Route::group([
            'prefix' => 'action'
        ], function () {
        });
        
        Route::group([
            'prefix' => 'device'
        ], function () {
        });

        Route::group([
            'prefix' => 'pin'
        ], function () {
        });
        
        Route::group([
            'prefix' => 'constraint'
        ], function () {
        });
        
        Route::group([
            'prefix' => 'user'
        ], function () {
        });

        Route::group([
            'prefix' => 'visualization'
        ], function () {
        });
        
    });
    
});

Route::get('/', function () {
    return redirect()->to('web');
});

Route::group([
    'namespace' => 'Web',
    'prefix' => 'web'
], function () {
    
    Route::get('/', 'IndexController@getIndex');
    
});

Route::group([
    'namespace' => 'User',
    'prefix' => 'user'
], function () {
    
    Route::get('/', 'IndexController@getIndex');

    Route::group([
        'namespace' => 'Dashboard',
        'prefix' => 'dashboard'
    ], function () {
        
        Route::get('/', 'ViewController@getIndex');

    });

});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {

    Route::get('/', 'IndexController@getIndex');
    
});