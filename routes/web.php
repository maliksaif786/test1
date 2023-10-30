<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lab\CategoryController;
use App\Http\Controllers\Lab\SettingController;
use App\Http\Controllers\Lab\TimeController;
use App\Http\Controllers\Lab\VenueController;
use App\Http\Controllers\Lab\SubCategoryController;
use App\Http\Controllers\LabAdmin\LabAdminController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index']);
Auth::routes();

####################  admin Routes ##################################
Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/admin/dashboard', [HomeController::class, 'admin']);
Route::get('lab_admins', [HomeController::class, 'lab_admins']);
Route::get('lab_allocate/{id}', [HomeController::class, 'lab_allocate']);
Route::post('lab_allocattion', [HomeController::class, 'lab_allocattion']);
//Deallocate Lab
Route::get('lab_deallocate/{id}', [HomeController::class, 'Deallocate']);
Route::resource('venues', VenueController::class);
Route::resource('categories', CategoryController::class);
Route::resource('sub_categories', SubCategoryController::class);
Route::get('admin/complaints', [HomeController::class, 'complaints']);
Route::get('category_alert', [SettingController::class, 'category_alert']);
Route::post('category_alert_save', [SettingController::class, 'category_alert_save']);
Route::resource('times', TimeController::class);
});
#################### End admin Route ##################################

#################### Lab admin Route ##################################
Route::middleware(['auth', 'user-access:lab_admin'])->group(function () {
Route::get('/lab/admin', [LabAdminController::class, 'index']);
Route::get('/lab/complaints', [LabAdminController::class, 'complaints']);
Route::get('/take_action/{id}', [LabAdminController::class, 'take_action']);
Route::get('/all_take_action', [LabAdminController::class, 'AllAction']);

Route::post('/action_save', [LabAdminController::class, 'action_save']);
Route::post('/all_action_save', [LabAdminController::class, 'all_action_save']);
Route::post('/update_status', [LabAdminController::class, 'update_status']);


});
#################### End Lab admin Route ##################################


#################### Teacher Routes #######################################
Route::middleware(['auth', 'user-access:teacher'])->group(function () {
Route::get('/teacher/dashboard', [HomeController::class, 'teacher']);
Route::resource('complaints', ComplaintController::class);
Route::get('/get-subcategories/{category}', [ComplaintController::class, 'getSubcategories']);

Route::get('complaint_requests', [ComplaintController::class, 'complaint_request']);
Route::get('complaint_accept/{id}', [ComplaintController::class, 'complaint_accept']);
Route::get('complaint_reject/{id}', [ComplaintController::class, 'complaint_reject']);
Route::get('resolved_complaints', [ComplaintController::class, 'resolved_complaints']);
Route::get('unresolved_complaints', [ComplaintController::class, 'unresolved_complaints']);
Route::get('complaint_detail/{id}', [ComplaintController::class, 'complaint_detail']);
Route::get('feedback/{id}', [ComplaintController::class, 'feedback']);
Route::post('feedback_save', [ComplaintController::class, 'feedback_save']);

});
########################### End Teacher Route #############################




