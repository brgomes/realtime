<?php

use App\Events\PostCreated;
use App\Http\Controllers\SiteController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::get('create-post', function () {
    $user = User::first();

    $post = $user->posts()->create([
        'title' => Str::random(150),
        'body' => Str::random(400),
    ]);

    // A chamada ao Event está no PostObserver
    //event(new PostCreated($post));

    /**
     * Resumindo:
     *
     * Ao salvar, o Observer chama o Event PostCreated,
     * que chama o Listener NotifyUsersNewPostCreated,
     * que foi configurado no EventServiceProvider
     */

    return 'Ok';
});

Route::get('/', [SiteController::class, 'index']);
