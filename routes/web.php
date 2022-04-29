<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::get('/users', function () {
    // $search = "Jas";
    // $re = User::where('name', 'LIKE', '%'.$search.'%')->get();
    // dd($re);
    return Inertia::render('Users', [
        //'users' => User::all('id','name', 'created_at')
        'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'LIKE', '%'.$search.'%');
                })
                ->paginate(10, ['id', 'name', 'created_at'])
                ->withQueryString(),
                
        'filters' => Request::only(['search'])
    ]);
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});
Route::post('/logout', function () {
    dd(request('foo'));
});
