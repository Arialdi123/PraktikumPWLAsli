<?php

use App\Http\Controllers\ToDoListController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ToDoListController::class, 'todolist'])->name('todolist.index');

Route::get('/todolist/tambah', [ToDoListController::class, 'create'])->name('todolist.create');
Route::post('/todolist/tambah/data', [ToDoListController::class, 'store'])->name('todolist.store');

Route::get('/todolist/edit/{id}', [ToDoListController::class, 'edit'])->name('todolist.edit');
Route::put('/todolist/{id}', [ToDoListController::class, 'update'])->name('todolist.update');


Route::delete('/todolist/{id}', [ToDoListController::class, 'destroy'])->name('todolist.destroy');
