<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Auth;
//Route::get('/', function () {
 //   return view('admin/index');
//});

Route::get('/login', function () {
    return view('auth/signIn');
});


/************** */

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');  // Assure-toi que la vue existe bien (resources/views/admin/dashboard.blade.php)
})->middleware('auth');  // Middleware pour protéger la route (optionnel mais recommandé)

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

/**** */
Route::post('/login_user', [AuthController::class, 'loginUser']);