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
        ]
        ,'names' => [
            'index' => 'post.index',
            'store' => 'post.store',
        ]
    ]
);
