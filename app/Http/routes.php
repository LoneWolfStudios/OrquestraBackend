<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');

Route::get('/ping', function () {
    return "Pong!";
});

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth',
    'middleware' => 'guest'
], function () {

    Route::get('/login', 'AuthController@getLogin');
    Route::post('/login', 'AuthController@postLogin');

    Route::post('/api_login', 'AuthController@postApiLogin');

});

Route::group([
    'namespace' => 'Auth',
    'prefix' => 'auth'
], function () {

    Route::post('/api_login', 'AuthController@postApiLogin');

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
    'prefix' => 'api',
    'middleware' => 'auth:api'
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

            Route::get('/find/{id}', 'DeviceController@find');
            Route::get('/byUser/{id}', 'DeviceController@byUser');
            Route::post('/create', 'DeviceController@create');

            Route::get('/getSeed/{id}', 'DeviceController@getSeed');

        });

        Route::group([
            'prefix' => 'pin'
        ], function () {

            Route::get('/find/{id}', 'PinController@find');
            Route::get('/byDevice/{id}', 'PinController@byDevice');
            Route::post('/create', 'PinController@create');

        });

        Route::group([
            'prefix' => 'data'
        ], function () {

            Route::post('/send', 'DataController@send');
            Route::get('/byPin/{id}', 'DataController@byPin');

        });

        Route::group([
            'prefix' => 'constraint'
        ], function () {

            Route::get('/find/{id}', 'ConstraintController@find');
            Route::get('/byDevice/{id}', 'ConstraintController@byDevice');
            Route::post('/create', 'ConstraintController@create');

        });

        Route::group([
            'prefix' => 'user'
        ], function () {

            Route::get('/', 'UserController@index');

        });

        Route::group([
            'prefix' => 'visualization'
        ], function () {

            Route::get('/find/{id}', 'VisualizationController@find');
            Route::get('/byDevice/{id}', 'VisualizationController@byDevice');
            Route::post('/create', 'VisualizationController@create');
            Route::get('/all/{id}', 'VisualizationController@all');

            Route::group([
                'prefix' => 'data/{id}'
            ], function () {

                Route::get('/all', 'VisualizationController@dataAll');

            });

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

        Route::get('/detail', 'ViewController@getDetail');
        Route::get('/create', 'ViewController@getCreate');

    });

    Route::group([
        'namespace' => 'Constraint',
        'prefix' => 'constraint'
    ], function () {

        Route::get('/detail', 'ViewController@getDetail');
        Route::get('/create', 'ViewController@getCreate');

    });

    Route::group([
        'namespace' => 'Visualization',
        'prefix' => 'visualization'
    ], function () {

        Route::get('/detail', 'ViewController@getDetail');
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
