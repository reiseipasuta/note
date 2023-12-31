<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\GroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [MainController::class, 'getTop'])
->name('top');

Route::get('guest', [MainController::class, 'guest'])
->name('guest');

Route::middleware('auth')->group(function () {


    Route::get('top', [MainController::class, 'getTop'])
    ->name('top');

    Route::get('notetop', [NoteController::class, 'notetop'])
                ->name('notetop');

    Route::get('shownote/{post}', [NoteController::class, 'shownote'])
                ->name('shownote');

    Route::get('getCreate', [NoteController::class, 'getCreate'])
                ->name('getCreate');

    Route::post('create', [NoteController::class, 'create'])
                ->name('create');

    Route::get('edit/{post}', [NoteController::class, 'getEdit'])
                ->name('getEdit');

    Route::patch('edit/{post}', [NoteController::class, 'edit'])
                ->name('edit');

    Route::delete('destroy/{post}', [NoteController::class, 'destroy'])
                ->name('destroy');

    Route::get('getCreateGroup', [GroupController::class, 'getCreateGroup'])
                ->name('getCreateGroup');

    Route::post('createGroup', [GroupController::class, 'createGroup'])
                ->name('createGroup');

    Route::get('showGroup/{group}', [GroupController::class, 'showGroup'])
                ->name('showGroup');

    Route::get('showGroup/{group}/form', [GroupController::class, 'showGroupFrom'])
                ->name('showGroupFrom');

    Route::post('showGroup/{group}/create', [GroupController::class, 'createGroupNote'])
                ->name('createGroupNote');

    Route::get('showGroup/{group}/{post}', [GroupController::class, 'showGroupNote'])
                ->name('showGroupNote');

    Route::get('showGroup/edit/{group}/{post}', [GroupController::class, 'getEditGroupNote'])
                ->name('getEditGroupNote');

    Route::patch('showGroup/edit/{group}/{post}', [GroupController::class, 'editGroupNote'])
                ->name('editGroupNote');

    Route::delete('showGroup/destroy/{group}/{post}', [GroupController::class, 'destroyGroupNote'])
                ->name('destroyGroupNote');

    Route::post('showGroup/{group}/inviteGroup', [GroupController::class, 'inviteGroup'])
                ->name('inviteGroup');

    Route::get('join/{group}/{token}', [GroupController::class, 'joinGroup'])
                ->name('joinGroup');

    Route::post('quit/{group}', [GroupController::class, 'quitGroup'])
                ->name('quitGroup');

    Route::get('/shownote/shareform/{post}', [MainController::class, 'shareForm'])
                ->name('shareForm');

    Route::post('/shownote/share/{post}/{user}', [MainController::class, 'share'])
                ->name('share');

    Route::get('/showshare/{post}', [MainController::class, 'showShare'])
                ->name('showShare');

    Route::get('/showGroup/{group}/shareForm/{post}', [MainController::class, 'shareForm_g'])
                ->name('shareForm_g');

});
