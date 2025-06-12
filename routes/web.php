<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BoardMemberController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::resource('admin/members', MemberController::class)
     ->only(['index','create','store']);

     
Route::get('/banner', [BannerController::class, 'index'])->name('banner');
Route::get('/banner/close', [BannerController::class, 'close'])->name('banner.close');

Route::get('/', [FamilyController::class, 'index'])->name('home');

Route::get('/family-book/{gam}', [FamilyController::class, 'show'])->name('family.book');
Route::get('/family-members/{parent}', [FamilyController::class, 'familyMember'])->name('family.members');
Route::get('/board/{pageName}', [BoardMemberController::class, 'index'])
     ->name('board.index');

     
Route::get('/family/search', [FamilyController::class, 'search'])
     ->name('family.search');

Route::get('/members-report', [FamilyController::class, 'report'])->name('members.report');

Route::get('/important-numbers', [PageController::class, 'importantNumbers'])->name('pages.important-numbers');
Route::get('/snehmilan-information', [PageController::class, 'snehmilanInformation'])->name('pages.snehmilan-information');
Route::get('/help', [PageController::class, 'help'])->name('pages.help');
Route::get('/village-history', [PageController::class, 'villageHistory'])->name('village-history');
Route::get('/mass-marriage-Information', [PageController::class, 'massMarriageInformation'])->name('mass-marriage-Information');
Route::get('/find-business', [PageController::class, 'findBusiness'])->name('pages.find-business');
Route::get('/add-product', [PageController::class, 'addProduct'])->name('pages.add-product');
Route::get('/product-report', [PageController::class, 'productReport'])->name('pages.product-report');
     
Route::get('/family/login', [FamilyController::class, 'showLoginForm'])->name('login');
Route::post('/family/login/otp', [FamilyController::class, 'sendOtp'])->name('family.login.sendOtp');
Route::post('/family/login/verify', [FamilyController::class, 'verifyOtp'])->name('family.login.verify');

Route::middleware('auth:family')->group(function(){
     Route::post('/family/logout', [FamilyController::class, 'logout'])->name('family.logout');
     Route::get('/family/profile', [FamilyController::class, 'profile'])->name('family.profile');
     Route::post('/family/profile/order', [FamilyController::class, 'saveOrder'])->name('family.profile.order');

    
     Route::get('family/profile/main/edit',    [FamilyController::class,'editMain'])->name('family.profile.editMain');
     Route::put('family/profile/main',          [FamilyController::class,'updateMain'])->name('family.profile.updateMain');

     Route::get('family/child/create', [FamilyController::class, 'createChild'])->name('family.child.create');
     Route::post('family/child', [FamilyController::class, 'storeChild'])->name('family.child.store');
     Route::get('family/child/{child}/edit',    [FamilyController::class,'editChild'])->name('family.child.edit');
     Route::put('family/child/{child}',         [FamilyController::class,'updateChild'])->name('family.child.update');
     Route::delete('family/child/{child}', [FamilyController::class, 'destroyChild'])->name('family.child.destroy');
});