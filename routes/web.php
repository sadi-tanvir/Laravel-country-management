<?php

use Illuminate\Support\Facades\Route;

Route::get('/{page?}', function ($page = null) {
    $page = $page ?? 'index';
    $path = public_path("html/{$page}.html");

    if (File::exists($path)) {
        return response()->file($path);
    }

    abort(404);
});
