<?php

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth',
    'middleware' => 'guest'
], function () {
    
    Route::get('/login', 'AuthController@getLogin');
    Route::post('/login', 'AuthController@postLogin');
    
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
        
            Route::get('/{id}', 'DeviceController@find');    
            Route::get('/byUser/{id}', 'DeviceController@byUser');
            Route::post('/create', 'DeviceController@create');
            
        });

        Route::group([
            'prefix' => 'pin'
        ], function () {
        
            Route::get('/byDevice/{id}', 'PinController@byDevice');
        
        });
        
        Route::group([
            'prefix' => 'constraint'
        ], function () {
        });
        
        Route::group([
            'prefix' => 'user'
        ], function () {
            
            Route::get('/', 'UserController@index');
            
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
    'prefix' => 'user',
    'middleware' => 'auth'
], function () {
    
    Route::get('/', 'IndexController@getIndex');

    Route::group([
        'namespace' => 'Dashboard',
        'prefix' => 'dashboard'
    ], function () {
        
        Route::get('/', 'ViewController@getIndex');

    });

    Route::group([
        'namespace' => 'Device',
        'prefix' => 'device'
    ], function () {
        
        Route::get('/detail', 'ViewController@getDetail');
        Route::get('/create', 'ViewController@getCreate');
        
    });
    
    Route::group([
        'namespace' => 'Pin',
        'prefix' => 'pin'
    ], function () {
        
        Route::get('/create', 'ViewController@getCreate');
        
    });

});

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'IndexController@getIndex');
    
});