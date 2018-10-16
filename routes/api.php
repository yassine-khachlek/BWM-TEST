<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => '/v1/auth'

], function ($router) {

    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');

});

Route::resource('/v1/posts/{id}/comments', 'Api\CommentController',
    [
        'only' => [
            'index',
        ]
        ,'names' => [
            'index' => 'post.comment.index',
        ]
    ]
);

Route::resource('/v1/posts', 'Api\PostController',
    [
        'only' => [
            'index',
            'store',
            'show',
            'update',
            'destroy',
        ]
        ,'names' => [
            'index' => 'post.index',
            'store' => 'post.store',
            'show' => 'post.show',
            'update' => 'post.update',
            'destroy' => 'post.destroy',
        ]
    ]
);
