<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\ExpenseCategoryController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\GallaryController;
use App\Http\Controllers\Admin\ReceiveCategoryController;
use App\Http\Controllers\Admin\ReceiveController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SiteKeywordController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DatabaseController;
use App\Models\DonorMember;
use App\Models\ExpenseCategory;
use App\Models\ReceiveCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/add-database', [DatabaseController::class, 'addDatabase']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/get-accounts', [AjaxController::class, 'getAccounts'])->name('get-accounts');
    Route::get('/get-receive-category', [AjaxController::class, 'getReceiveCategory'])->name('get-receive-category');
    Route::get('/get-expense-category', [AjaxController::class, 'getExpenseCategory'])->name('get-expense-category');
    Route::get('/get-members', [AjaxController::class, 'getMembers'])->name('get-members');

    Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('password.update');

    Route::prefix('site-settings')->as('site-settings.')->group(function () {
        Route::get('/', [SiteSettingsController::class, 'index'])->name('index')->middleware(['permission:access-all|site_settings-create']);
        Route::post('store', [SiteSettingsController::class, 'store'])->name('store')->middleware(['permission:access-all|site_settings-create']);
        Route::post('chairman-information/store', [SiteSettingsController::class, 'chairmanInformationStore'])->name('chairman-information.store')->middleware(['permission:access-all|site_settings-create']);
        Route::post('sacretary-information/store', [SiteSettingsController::class, 'sacretaryInformationStore'])->name('sacretary-information.store')->middleware(['permission:access-all|site_settings-create']);
        Route::post('terms_and_condition/store', [SiteSettingsController::class, 'termsAndConditionStore'])->name('terms_and_condition.store')->middleware(['permission:access-all|site_settings-create']);
        Route::post('notice/store', [SiteSettingsController::class, 'notice'])->name('notice.store')->middleware(['permission:access-all|site_settings-create']);
        Route::post('member-notice/store', [SiteSettingsController::class, 'memberNotice'])->name('member-notice.store')->middleware(['permission:access-all|site_settings-create']);
        Route::post('about_us/store', [SiteSettingsController::class, 'aboutUsStore'])->name('about_us.store')->middleware(['permission:access-all|site_settings-create']);
    });
    Route::prefix('member')->as('member.')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('index')->middleware(['permission:access-all|member-visibility']);
        Route::post('store', [MemberController::class, 'store'])->name('store')->middleware(['permission:access-all|member-create']);
        Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('edit')->middleware(['permission:access-all|member-edit']);
        Route::get('/changeStatus/{id}', [MemberController::class, 'changeStatus'])->name('changeStatus')->middleware(['permission:access-all|member-edit']);
        Route::put('/update/{id}', [MemberController::class, 'update'])->name('update')->middleware(['permission:access-all|member-edit']);
        Route::get('/delete/{id}', [MemberController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|member-delete']);
    });
    Route::prefix('donor-member')->as('donor-member.')->group(function () {
        Route::get('/', [DonorController::class, 'index'])->name('index')->middleware(['permission:access-all|member-visibility']);
        Route::post('store', [DonorController::class, 'store'])->name('store')->middleware(['permission:access-all|member-create']);
        Route::get('/edit/{id}', [DonorController::class, 'edit'])->name('edit')->middleware(['permission:access-all|member-edit']);
        Route::put('/update/{id}', [DonorController::class, 'update'])->name('update')->middleware(['permission:access-all|member-edit']);
        Route::get('/delete/{id}', [DonorController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|member-delete']);
    });
    Route::prefix('blog')->as('blog.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index')->middleware(['permission:access-all|blog-visibility']);
        Route::post('store', [BlogController::class, 'store'])->name('store')->middleware(['permission:access-all|blog-create']);
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit')->middleware(['permission:access-all|blog-edit']);
        Route::put('/update/{id}', [BlogController::class, 'update'])->name('update')->middleware(['permission:access-all|blog-edit']);
        Route::get('/delete/{id}', [BlogController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|blog-delete']);
    });
    Route::prefix('gallary')->as('gallary.')->group(function () {
        Route::get('/', [GallaryController::class, 'index'])->name('index')->middleware(['permission:access-all|gallary-visibility']);
        Route::post('store', [GallaryController::class, 'store'])->name('store')->middleware(['permission:access-all|gallary-create']);
        Route::get('/edit/{id}', [GallaryController::class, 'edit'])->name('edit')->middleware(['permission:access-all|gallary-edit']);
        Route::put('/update/{id}', [GallaryController::class, 'update'])->name('update')->middleware(['permission:access-all|gallary-edit']);
        Route::get('/delete/{id}', [GallaryController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|gallary-delete']);
    });
    Route::prefix('expense_category')->as('expense_category.')->group(function () {
        Route::get('/', [ExpenseCategoryController::class, 'index'])->name('index')->middleware(['permission:access-all|expense_category-visibility']);
        Route::post('store', [ExpenseCategoryController::class, 'store'])->name('store')->middleware(['permission:access-all|expense_category-create']);
        Route::get('/edit/{id}', [ExpenseCategoryController::class, 'edit'])->name('edit')->middleware(['permission:access-all|expense_category-edit']);
        Route::put('/update/{id}', [ExpenseCategoryController::class, 'update'])->name('update')->middleware(['permission:access-all|expense_category-edit']);
        Route::get('/delete/{id}', [ExpenseCategoryController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|expense_category-delete']);
    });
    Route::prefix('receive_category')->as('receive_category.')->group(function () {
        Route::get('/', [ReceiveCategoryController::class, 'index'])->name('index')->middleware(['permission:access-all|receive_category-visibility']);
        Route::post('store', [ReceiveCategoryController::class, 'store'])->name('store')->middleware(['permission:access-all|receive_category-create']);
        Route::get('/edit/{id}', [ReceiveCategoryController::class, 'edit'])->name('edit')->middleware(['permission:access-all|receive_category-edit']);
        Route::put('/update/{id}', [ReceiveCategoryController::class, 'update'])->name('update')->middleware(['permission:access-all|receive_category-edit']);
        Route::get('/delete/{id}', [ReceiveCategoryController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|receive_category-delete']);
    });
    Route::prefix('account')->as('account.')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('index')->middleware(['permission:access-all|account-visibility']);
        Route::get('/statement', [AccountController::class, 'statement'])->name('statement')->middleware(['permission:access-all|ledger-visibility']);
        Route::post('store', [AccountController::class, 'store'])->name('store')->middleware(['permission:access-all|account-create']);
        Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('edit')->middleware(['permission:access-all|account-edit']);
        Route::put('/update/{id}', [AccountController::class, 'update'])->name('update')->middleware(['permission:access-all|account-edit']);
        Route::get('/delete/{id}', [AccountController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|account-delete']);
    });
    Route::prefix('receive')->as('receive.')->group(function () {
        Route::get('/', [ReceiveController::class, 'index'])->name('index')->middleware(['permission:access-all|receive-visibility']);
        Route::post('store', [ReceiveController::class, 'store'])->name('store')->middleware(['permission:access-all|receive-create']);
        Route::get('/edit/{id}', [ReceiveController::class, 'edit'])->name('edit')->middleware(['permission:access-all|receive-edit']);
        Route::put('/update/{id}', [ReceiveController::class, 'update'])->name('update')->middleware(['permission:access-all|receive-edit']);
        Route::get('/delete/{id}', [ReceiveController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|receive-delete']);
    });
    Route::prefix('expense')->as('expense.')->group(function () {
        Route::get('/', [ExpenseController::class, 'index'])->name('index')->middleware(['permission:access-all|expense-visibility']);
        Route::post('store', [ExpenseController::class, 'store'])->name('store')->middleware(['permission:access-all|expense-create']);
        Route::get('/edit/{id}', [ExpenseController::class, 'edit'])->name('edit')->middleware(['permission:access-all|expense-edit']);
        Route::put('/update/{id}', [ExpenseController::class, 'update'])->name('update')->middleware(['permission:access-all|expense-edit']);
        Route::get('/delete/{id}', [ExpenseController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|expense-delete']);
    });
    Route::prefix('site_keyword')->as('site_keyword.')->group(function () {
        Route::get('/', [SiteKeywordController::class, 'index'])->name('index')->middleware(['permission:access-all|expense-visibility']);
        Route::post('store', [SiteKeywordController::class, 'store'])->name('store')->middleware(['permission:access-all|expense-create']);
        Route::get('/edit/{id}', [SiteKeywordController::class, 'edit'])->name('edit')->middleware(['permission:access-all|expense-edit']);
        Route::put('/update/{id}', [SiteKeywordController::class, 'update'])->name('update')->middleware(['permission:access-all|expense-edit']);
        Route::get('/delete/{id}', [SiteKeywordController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|expense-delete']);
    });

    // Staff routes
    Route::prefix('staff')->as('staff.')->group(function () {
        Route::get('/', [StaffController::class, 'index'])->name('index')->middleware(['permission:access-all|staff-visibility']);
        Route::get('create', [StaffController::class, 'create'])->name('create')->middleware(['permission:access-all|staff-create']);
        Route::post('store', [StaffController::class, 'store'])->name('store')->middleware(['permission:access-all|staff-create']);
        Route::get('view/{id}', [StaffController::class, 'show'])->name('view')->middleware(['permission:access-all|staff-visibility']);
        Route::get('edit/{id}', [StaffController::class, 'edit'])->name('edit')->middleware(['permission:access-all|edit-visibility']);
        Route::put('update/{id}', [StaffController::class, 'update'])->name('update')->middleware(['permission:access-all|staff-edit']);
        Route::get('delete/{id}', [StaffController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|staff-delete']);

        Route::get('assign/role/{userId}', [StaffController::class, 'assignRole'])->name('assing.role')->middleware(['permission:access-all|roles-create']);
        Route::post('assign/role/{userId}', [StaffController::class, 'saveAssignedRole'])->name('assing.role.store')->middleware(['permission:access-all|roles-create']);
        Route::get('assign/permission/{userId}', [StaffController::class, 'assignPermission'])->name('assing.permission')->middleware(['permission:access-all|roles-create']);
        Route::post('assign/permission/{userId}', [StaffController::class, 'saveAssignedPermission'])->name('assing.permission.store')->middleware(['permission:access-all|roles-create']);
    });
    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('index')->middleware(['permission:access-all|roles-visibility']);
        Route::post('store', [RoleController::class, 'store'])->name('store')->middleware(['permission:access-all|roles-create']);
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('edit')->middleware(['permission:access-all|roles-edit']);
        Route::put('update/{id}', [RoleController::class, 'update'])->name('update')->middleware(['permission:access-all|roles-edit']);
        Route::get('delete/{id}', [RoleController::class, 'destroy'])->name('destroy')->middleware(['permission:access-all|roles-destroy']);
        Route::get('give/permission/{id}', [RoleController::class, 'givePermission'])->name('give.permission')->middleware(['permission:access-all|roles-create']);
        Route::post('give/permission/{id}', [RoleController::class, 'saveAssignedPermission'])->name('save.assigned.permission')->middleware(['permission:access-all|roles-create']);
    });
});
