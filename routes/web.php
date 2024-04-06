<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkingDaysController;


Route::get('/', [WorkingDaysController::class, 'showInputForm'])->name('input-form');
Route::post('/calculate-working-days', [WorkingDaysController::class, 'calculateWorkingDays'])->name('calculate-working-days');
