<?php
// routes/api.php
use App\Http\Controllers\UserController;
// api endpoint url for fetching users
Route::get('/users', [UserController::class, 'index']);
