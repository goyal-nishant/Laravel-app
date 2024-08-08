<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cache', function () {
    return Cache::get('key');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => "Director",
                'pay' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => "Teacher",
                'pay' => '$40,000'
            ],
            [
                'id' => 3,
                'title' => "Crickter",
                'pay' => '$150,000'
            ]
        ]

    ]);
});

Route::get('/jobs/{id}', function($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => "Director",
            'pay' => '$50,000'
        ],
        [
            'id' => 2,
            'title' => "Teacher",
            'pay' => '$40,000'
        ],
        [
            'id' => 3,
            'title' => "Crickter",
            'pay' => '$150,000'
        ]
    ];

    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    return view('job', ['job' => $job]);

});

Route::get('/{id?}', function(string $id = null) {
    return view('parameter', ['id' => $id]);
})->whereNumber('id');


Route::redirect('/test','/');

Route::get('/page', function() {
    return "<h1>This is only a page</h1>";
});
Route::prefix('page')->group(function() {
    Route::get('/about',function() {
        return "<h1>This is for about page</h1>";
    });
    Route::get('/features', function() {
        return "<h1>This is feature page</h1>";  
    });
});

Route::fallback(function() {
    return "<h1>Page not found</h1>";
});