<?php

use App\Http\Controllers\Api\ApiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [ApiController::class, 'login']);


//category
Route::get('category', [ApiController::class, 'getCategories']);

//venues
Route::get('venues', [ApiController::class, 'getVenues']);

//assign lab
Route::post('assign_lab', [ApiController::class, 'assignLab']);

//Add Complaints
Route::post('add_complaints', [ApiController::class, 'AddComplaints']);

//ViewAllComplaints
Route::get('ViewAllComplaints', [ApiController::class, 'ViewAllComplaints']);

//ViewMyComplaints
Route::post('ViewMyComplaints', [ApiController::class, 'ViewMyComplaints']);

Route::post('ViewMyRessolvedComplaints', [ApiController::class, 'ViewMyRessolvedComplaints']);
Route::post('ViewMyUnressolvedComplaints', [ApiController::class, 'ViewMyUnressolvedComplaints']);

//Add Action Compliant 
Route::post('add_complaint_action', [ApiController::class, 'addAction']);

//ViewComplaintAction
Route::get('ViewComplaintAction/{id}', [ApiController::class, 'ViewComplaintAction']);

//AddFeedback
Route::post('AddFeedback', [ApiController::class, 'AddFeedback']);

//Add Setting 
Route::post('AddSetting', [ApiController::class, 'AddSetting']);

//Add LabWithMostComplaint 
Route::get('LabWithMostComplaint', [ApiController::class, 'LabWithMostComplaint']);

//Deallocate Lab
Route::post('lab_deallocate/{id}', [ApiController::class, 'Deallocate']);

//complaintCountWithCategory
Route::get('complaintCountWithCategory', [ApiController::class, 'complaintCountWithCategory']);

//hodUnressolved_complaints
Route::get('hodUnressolved_complaints', [ApiController::class, 'hodUnressolved_complaints']);

//DateWiseComplaints
Route::post('DateWiseComplaints', [ApiController::class,'DateWiseComplaints']);

//labAdminComplaints
Route::get('labAdminComplaints', [ApiController::class, 'labAdminComplaints']);
