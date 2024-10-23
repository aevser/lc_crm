<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('project', V1\Project\ProjectController::class);

Route::apiResource('host', V1\Host\HostController::class)->except('show');

Route::apiResource('lead', V1\Lead\LeadController::class)->except('show');
