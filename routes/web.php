<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

// Fibonacci
$app->get('fibonacci', ['uses' => 'FibonacciController@full']);
$app->get('fibonacci/{position}', ['uses' => 'FibonacciController@position']);
