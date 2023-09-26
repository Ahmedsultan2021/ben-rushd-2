<?php

use App\Http\Controllers\FieldResponseController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormResponseController;
use App\Models\Branch;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('form', FormController::class)->except([
    'create', 'edit', 'index','show'
]);
Route::resource('formResponse', FormResponseController::class);
Route::get('get-doctors/{branchId}', function($branchId) {
    
    $branches = Branch::find($branchId);
    $doctors = $branches->doctors;
    

    // Return the doctors as a JSON response
    return response()->json($doctors);

});
