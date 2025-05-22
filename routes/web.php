<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;

Route::get('/', [DashboardController::class, 'show']);

Route::get('log-in', [AuthController::class, 'showLogin'])->name('login');
Route::post('log-in', [AuthController::class, 'login']);

Route::get('log-out', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('owner.home.home');
    })->name('home');

    Route::get('about', [AboutController::class, 'show'])->name('aboutShow');
    Route::post('about', [AboutController::class, 'update'])->name('aboutUpdate');

    Route::get('project', [ProjectController::class, 'show'])->name('projectShow');
    Route::get('project/create', [ProjectController::class, 'showCreate'])->name('projectShowCreate');
    Route::post('project/create', [ProjectController::class, 'create'])->name('projectCreate');
    Route::get('project/update/{id}', [ProjectController::class, 'showUpdate'])->name('projectShowUpdate');
    Route::put('project/update/{id}', [ProjectController::class, 'update'])->name('projectUpdate');
    Route::delete('/project/delete/{id}', [ProjectController::class, 'delete'])->name('projectDelete');

    Route::get('skill', [SkillController::class, 'show'])->name('skillShow');
    Route::get('skill/create', [SkillController::class, 'showCreate'])->name('skillShowCreate');
    Route::post('skill/create', [SkillController::class, 'create'])->name('skillCreate');
    Route::get('skill/update/{id}', [SkillController::class, 'showUpdate'])->name('skillShowUpdate');
    Route::put('skill/update/{id}', [SkillController::class, 'update'])->name('skillUpdate');
    Route::delete('skill/delete/{id}', [SkillController::class, 'delete'])->name('skillDelete');

    Route::get('contact', [ContactController::class, 'show'])->name('contactShow');
    Route::get('contact/create', [ContactController::class, 'showCreate'])->name('contactShowCreate');
    Route::post('contact/create', [ContactController::class, 'create'])->name('contactCreate');
    Route::get('contact/update/{id}', [ContactController::class, 'showUpdate'])->name('contactShowUpdate');
    Route::put('contact/update/{id}', [ContactController::class, 'update'])->name('contactUpdate');
    Route::delete('contact/delete/{id}', [ContactController::class, 'delete'])->name('contactDelete');


});