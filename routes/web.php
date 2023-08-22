<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\postController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\seniorController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\userDashboardController;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\PreApplicationController;
use App\Http\Controllers\GeneralIntakeSheetController;
use App\Http\Controllers\PendingController;
use App\Http\Controllers\CompletedController;
use App\Http\Controllers\PayoutController;
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

Route::get('/', function () {
    return view('frontend.authentication.login');
});



Route::group(['middleware'=>['role:admin|staff', 'auth']],function(){
    Route::get('/send-sms', [Controller::class, 'sendSms'])->name('send-sms');
    Route::get('/admin-dashboard', [adminDashboardController::class, 'index'])->name('admin-dashboard');
    
    Route::get('/senior-lists', [seniorController::class, 'index'])->name('senior-list');
    Route::get('/senior-view-info/{id}', [seniorController::class, 'show'])->name('show-senior');
    Route::get('/add-senior', [seniorController::class, 'create'])->name('add-senior');
    Route::post('/store-senior', [seniorController::class, 'store'])->name('store-senior');
    Route::delete('/senior/delete',[seniorController::class,'destroy'])->name('senior-destroy');
    Route::delete('/senior/delete/account',[seniorController::class,'destroySenior'])->name('senior-destroy-account');
    Route::put('/senior/decline',[seniorController::class,'decline'])->name('senior-decline');
    Route::put('/senior/restore',[seniorController::class,'restore'])->name('senior-restore');

    Route::get('/add-post', [postController::class, 'create'])->name('add-post');
    Route::post('/store-post', [postController::class, 'store'])->name('store-post');
    Route::get('/edit-post/{id}',[postController::class,'edit'])->name('edit-post');
    Route::put('/update-post/{id}',[postController::class,'update'])->name('update-post');
    Route::delete('/post/delete',[postController::class,'destroy'])->name('post-destroy');
    

    Route::get('/my-profile', [profileController::class, 'index'])->name('show-profile');
    Route::get('/edit-my-profile/{id}', [profileController::class, 'edit'])->name('edit-profile');
    Route::put('/update-my-profile/{id}',[profileController::class,'update'])->name('update-profile');

    Route::get('/pending-accounts', [PendingController::class, 'showPendingAccounts'])->name('pending-accounts');
    Route::get('/account/show/{id}/application', [PendingController::class, 'showPendingAccountsPreapplication'])->name('pending-show');
    Route::get('/account/show/{id}/identifying', [PendingController::class, 'showPendingAccountsIdentifying'])->name('pending-show-identifying');
    Route::get('/account/show/{id}/family', [PendingController::class, 'showPendingAccountsFamily'])->name('pending-show-family');
    Route::get('/account/show/{id}/economic', [PendingController::class, 'showPendingAccountsEconomic'])->name('pending-show-economic');
    Route::get('/account/show/{id}/health', [PendingController::class, 'showPendingAccountsHealth'])->name('pending-show-health');
    Route::get('/account/show/{id}/assesment', [PendingController::class, 'showPendingAccountsAssesment'])->name('pending-show-assesment');
    Route::get('/pending-account/assesment/{id}', [PendingController::class, 'createAssesment'])->name('pending-assesment');
    Route::post('/pending-account/assesment/create/{id}', [PendingController::class, 'storeAssesment'])->name('create-assesment');

    Route::get('/declined-accounts', [PendingController::class, 'showDeclinedAccounts'])->name('declined-accounts');

    Route::put('/pending-account/document/update/{id}', [GeneralIntakeSheetController::class, 'updateDocument'])->name('update-document');
    Route::put('/pending-account/identifying/update/{id}', [GeneralIntakeSheetController::class, 'updateIdentifying'])->name('update-identifying');
    Route::put('/pending-account/economic/update/{id}', [GeneralIntakeSheetController::class, 'updateEconomic'])->name('update-economic');
    Route::put('/pending-account/health/update/{id}', [GeneralIntakeSheetController::class, 'updateHealth'])->name('update-health');
    Route::put('/pending-account/assesment/update/{id}', [GeneralIntakeSheetController::class, 'updateAssesment'])->name('update-assesment');

    Route::get('/completed-accounts', [CompletedController::class, 'showCompletedAccounts'])->name('completed-accounts');


    Route::get('/registration-accounts/view/{id}', [registrationController::class, 'show'])->name('show-registration-accounts');
    Route::put('/registration-accounts/update/{id}',[registrationController::class,'update'])->name('update-registration-accounts');

    Route::get('/application-accounts', [PreApplicationController::class, 'index'])->name('application-accounts');

    Route::get('/payout-lists', [PayoutController::class, 'index'])->name('payout-list');
    Route::get('/payout-create/{id}', [PayoutController::class, 'create'])->name('payout-create');
    Route::post('/payout-store', [PayoutController::class, 'store'])->name('payout-store');
    Route::get('/payout-success', [PayoutController::class, 'show'])->name('payout-success');
    Route::post('/payout-success/filter-ym', [PayoutController::class, 'filterMonthYear'])->name('payout-success-filter-ym');
    Route::post('/payout-success/filter-brgy', [PayoutController::class, 'filterBarangay'])->name('payout-success-filter-brgy');
    Route::post('/payout-success/search', [PayoutController::class, 'searches'])->name('payout-success-search');
    Route::post('/payout-senior/search', [PayoutController::class, 'searchesPayouts'])->name('payout-senior-search');


});


        Route::group(['middleware'=>['role:admin', 'auth']],function(){
            Route::get('/staff-lists', [StaffController::class, 'index'])->name('staff-list');
            Route::get('/staff-view-info/{id}', [StaffController::class, 'show'])->name('show-staff');
            Route::get('/add-staff', [StaffController::class, 'create'])->name('add-staff');
            Route::post('/store-staff', [StaffController::class, 'store'])->name('store-staff');
            Route::delete('/staff/delete',[StaffController::class,'destroy'])->name('staff-destroy');
            Route::get('/edit-staff/{id}', [StaffController::class, 'edit'])->name('staff-edit');
            Route::put('/update-staff/{id}',[StaffController::class,'update'])->name('staff-update');
        });

  Route::group(['middleware'=>['role:senior', 'auth']],function(){
    Route::get('/user-dashboard', [userDashboardController::class, 'index'])->name('user-dashboard');
    Route::get('/profile', [profileController::class, 'showProfile'])->name('user-profile');
    Route::get('/edit-profile/{id}', [profileController::class, 'editUserProfile'])->name('user-edit-profile');
    Route::put('/update-profile/{id}',[profileController::class,'updateUserProfile'])->name('user-update-profile');

    Route::get('/user-registration', [registrationController::class, 'create'])->name('user-registration');
    Route::post('/store-registration', [registrationController::class, 'store'])->name('store-registration');

    Route::get('/user-pre-application', [PreApplicationController::class, 'create'])->name('user-pre-application');
    Route::post('/store-pre-application', [PreApplicationController::class, 'store'])->name('store-pre-application');

        Route::get('/user-pre-application-part2', [PreApplicationController::class, 'createPart2'])->name('user-pre-application-part2');
        Route::post('/store-pre-application-part2', [PreApplicationController::class, 'storeApplication'])->name('store-application-form');

        Route::get('/my-payout-lists', [PayoutController::class, 'showSeniorPayout'])->name('my-payout-list');

        Route::prefix('/general-intake-sheet/')->group(function () {
            Route::get('identifying-information-create', [GeneralIntakeSheetController::class, 'createIdentifyingInformation'])->name('create-identifying-information');
            Route::post('identifying-information-store', [GeneralIntakeSheetController::class, 'storeIdentifyingInformation'])->name('store-identifying-information');

            Route::get('family-composition-create', [GeneralIntakeSheetController::class, 'createFamilyComposition'])->name('create-family-composition');
            Route::post('family-composition-store', [GeneralIntakeSheetController::class, 'storeFamilyComposition'])->name('store-family-composition');

            Route::get('economic-status-create', [GeneralIntakeSheetController::class, 'createEconomicStatus'])->name('create-economic-status');
            Route::post('economic-status-store', [GeneralIntakeSheetController::class, 'storeEconomicStatus'])->name('store-economic-status');

            Route::get('health-condition-create', [GeneralIntakeSheetController::class, 'createHealthCondition'])->name('create-health-condition');
            Route::post('health-condition-store', [GeneralIntakeSheetController::class, 'storeHealthCondition'])->name('store-health-condition');

            
        });
        
            
    });

        




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
