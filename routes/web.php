<?php

use App\Http\Controllers\{
    EventController
};
use Illuminate\Support\Facades\Route;

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');


Route::get('/', function () {
    return view('welcome');
});
