<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get("/logout", [AuthenticationController::class, 'logout']);
    Route::get("/profile", [AuthenticationController::class, 'profile']);
    Route::post("/posts", [PostController::class, 'store']);
    Route::patch("/posts/{id}/update", [PostController::class, 'update'])->middleware("pemilik-postingan");
    Route::delete("/posts/{id}/delete", [PostController::class, 'destroy'])->middleware("pemilik-postingan");

    Route::post("/comments", [CommentController::class, 'store']);
    Route::patch("/comments/{id}/update", [CommentController::class, 'update'])->middleware("pemilik-komentar");
    Route::delete("/comments/{id}/delete", [CommentController::class, 'destroy'])->middleware("pemilik-komentar");
});

Route::get("/posts", [PostController::class, 'index']);
Route::get("/posts/{id}", [PostController::class, 'show']);

Route::post("/login", [AuthenticationController::class, 'login']);
