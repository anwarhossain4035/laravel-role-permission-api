<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;

Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('users', UserController::class);
    Route::get('/permissions', [PermissionController::class, 'index']); // List all permissions
    Route::get('/users/{user}/permissions', [UserController::class, 'getPermissions']);
    Route::post('/users/{user}/permissions', [UserController::class, 'assignPermissions']);
    Route::delete('/users/{user}/permissions', [UserController::class, 'revokePermissions']);
    Route::post('/permissions', [PermissionController::class, 'store']); // Create a new permission
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy']); // Delete a permission
});