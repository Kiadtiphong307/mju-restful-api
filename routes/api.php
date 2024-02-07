<?php

use App\Http\Controllers\MjuStudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::put('/update/{student_code}', [MjuStudentController::class, 'update']);



Route::resource('mju', MjuStudentController::class);



