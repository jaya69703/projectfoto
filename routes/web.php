<?php

use App\Http\Controllers\Pages\Profile\AdminController;
use App\Http\Controllers\Pages\Profile\UserController;
use App\Http\Controllers\Pages\Base\TodoController;
use App\Http\Controllers\Pages\Base\AnnouncementController;
use App\Http\Controllers\Pages\Base\WebSettingController;
use App\Http\Controllers\Pages\Base\RootController;
use App\Http\Controllers\Pages\Master\UserManagerController;
use App\Http\Controllers\Pages\Master\PaketController;
use App\Http\Controllers\Pages\Master\BookingController;
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


Route::get('/', [RootController::class, 'index'])->name('root.index');
Route::get('/about-us', [RootController::class, 'about'])->name('root.pages.about');
Route::get('/contact-us', [RootController::class, 'contact'])->name('root.pages.contact');
Route::get('/product/details/{id}', [RootController::class, 'pdetails'])->name('root.pages.pdetails');
Route::get('/product/{pakets:slug}', [RootController::class, 'sample'])->name('root.pages.sample');


Route::get('/errors-verify', function () {
    $data['title'] = "iSchool";
    $data['menu'] = "Error";
    $data['submenu'] = "Error Verify";

    return view('base.base-errors',$data);
})->name('errors.verify');

Route::get('/errors-access', function () {
    $data['title'] = "iSchool";
    $data['menu'] = "Error";
    $data['submenu'] = "Error Access";

    return view('base.base-errors', $data);
})->name('errors.access');

Route::get('/back', function () {
    return back();
})->name('back');

Route::get('/announcement/show/{id}', [AnnouncementController::class, 'show'])->name('guest.app.announ.show');


Route::middleware(['auth', 'user-access:User'])->group(function () {
    Route::get('/user/book/changepass', [RootController::class, 'profile'])->name('user.book.changepass');
    Route::get('/user/book/profile', [RootController::class, 'profile'])->name('user.book.profile');
    Route::patch('/user/book/update-profile', [RootController::class, 'updateUser'])->name('user.book.update');
    Route::put('/user/book/update-password', [RootController::class, 'updatePass'])->name('user.book.update.password');
    Route::post('/user/book/product', [RootController::class, 'booknow'])->name('user.book.product');
    Route::get('/user/book/history', [RootController::class, 'history'])->name('user.book.history');
    Route::get('/user/book/history/{id}', [RootController::class, 'historyShow'])->name('user.book.history.show');
});
Route::middleware(['auth', 'user-access:User'])->group(function () {
    // DASHBOARD ADMIN
    Route::get('/user/home', [UserController::class, 'index'])->name('user.home.index');
    Route::get('/user/profile', [UserController::class, 'show'])->name('user.profile.index');
    Route::patch('/user/profile/update', [UserController::class, 'update'])->name('user.profile.update');

    // TODO LIST APP
    Route::get('/user/app/todo', [TodoController::class, 'index'])->name('user.app.todo.index');
    Route::post('/user/app/todo/store', [TodoController::class, 'store'])->name('auth.app.todo.user.store');
    Route::delete('/user/app/todo/destroy/{id}', [TodoController::class, 'destroy'])->name('auth.app.todo.user.destroy');
    Route::patch('/user/app/todo/update/{id}', [TodoController::class, 'update'])->name('auth.app.todo.user.update');
});
//

Route::middleware(['auth', 'user-access:Admin', 'isverify:1'])->group(function () {
    // DASHBOARD ADMIN
    // DASHBOARD ADMIN
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home.index');
    Route::get('/admin/profile', [AdminController::class, 'show'])->name('admin.profile.index');
    Route::patch('/admin/profile/update', [AdminController::class, 'update'])->name('admin.profile.update');

    // TODO LIST APP
    Route::get('/admin/app/todo', [TodoController::class, 'index'])->name('admin.app.todo.index');
    Route::post('/admin/app/todo/store', [TodoController::class, 'store'])->name('admin.app.todo.store');
    Route::delete('/admin/app/todo/destroy/{id}', [TodoController::class, 'destroy'])->name('admin.app.todo.destroy');
    Route::patch('/admin/app/todo/update/{id}', [TodoController::class, 'update'])->name('admin.app.todo.update');
    // ANNOUNCEMENT LIST APP
    Route::get('/admin/app/announ', [AnnouncementController::class, 'index'])->name('admin.app.announ.index');
    Route::post('/admin/app/announ/store', [AnnouncementController::class, 'store'])->name('admin.app.announ.store');
    Route::get('/admin/app/announ/show/{id}', [AnnouncementController::class, 'show'])->name('admin.app.announ.show');
    Route::patch('/admin/app/announ/update/{id}', [AnnouncementController::class, 'update'])->name('admin.app.announ.update');
    Route::delete('/admin/app/announ/destroy/{id}', [AnnouncementController::class, 'destroy'])->name('admin.app.announ.destroy');

    // ANNOUNCEMENT LIST APP
    Route::get('/admin/paket', [PaketController::class, 'index'])->name('admin.paket.index');
    Route::post('/admin/paket/store', [PaketController::class, 'store'])->name('admin.paket.store');
    Route::get('/admin/paket/show/{id}', [PaketController::class, 'show'])->name('admin.paket.show');
    Route::patch('/admin/paket/edit/{id}', [PaketController::class, 'edit'])->name('admin.paket.edit');
    Route::patch('/admin/paket/update/{id}', [PaketController::class, 'update'])->name('admin.paket.update');
    Route::delete('/admin/paket/destroy/{id}', [PaketController::class, 'destroy'])->name('admin.paket.destroy');


    // MANAGE BOOKING
    Route::get('/admin/booking/all', [BookingController::class, 'index'])->name('admin.booking.all');
    Route::get('/admin/booking/pending', [BookingController::class, 'index'])->name('admin.booking.pending');
    Route::get('/admin/booking/progress', [BookingController::class, 'index'])->name('admin.booking.progress');
    Route::get('/admin/booking/done', [BookingController::class, 'index'])->name('admin.booking.done');

    // EXPORT - IMPORT USER
    Route::post('/admin/usermanage/user/import', [UserManagerController::class, 'importUser'])->name('admin.usermanage.user.import');
    Route::get('/admin/usermanage/user/export', [UserManagerController::class, 'exportUser'])->name('admin.usermanage.user.export');
    // USER MANAGER CRUD
    Route::get('/admin/usermanage/admin', [UserManagerController::class, 'index'])->name('admin.usermanage.admin');
    Route::get('/admin/usermanage/member', [UserManagerController::class, 'index'])->name('admin.usermanage.member');
    Route::post('/admin/usermanage/user/store', [UserManagerController::class, 'store'])->name('admin.usermanage.user.store');
    Route::get('/admin/usermanage/user/edit/{id}', [UserManagerController::class, 'edit'])->name('admin.usermanage.user.edit');
    Route::get('/admin/usermanage/user/show/{id}', [UserManagerController::class, 'store'])->name('admin.usermanage.user.show');
    Route::patch('/admin/usermanage/user/update/{id}', [UserManagerController::class, 'update'])->name('admin.usermanage.user.update');
    Route::patch('/admin/usermanage/worker/update/{id}', [UserManagerController::class, 'update'])->name('admin.usermanage.worker.update');
    Route::delete('/admin/usermanage/user/delete/{id}', [UserManagerController::class, 'Userdestroy'])->name('admin.usermanage.user.destroy');
    Route::delete('/admin/usermanage/worker/delete/{id}', [UserManagerController::class, 'destroy'])->name('admin.usermanage.worker.destroy');
    Route::get('/admin/usermanage/user/create', [UserManagerController::class, 'create'])->name('admin.usermanage.user.create');

    // ANNOUNCEMENT LIST APP
    Route::get('/admin/app/setting', [WebSettingController::class, 'index'])->name('admin.app.setting.index');
    Route::patch('/admin/app/setting/update', [WebSettingController::class, 'update'])->name('admin.app.setting.update');
    // Route::post('/admin/app/setting/store', [WebSettingController::class, 'store'])->name('admin.app.setting.store');
    // Route::get('/admin/app/setting/show/{id}', [WebSettingController::class, 'show'])->name('admin.app.setting.show');
    // Route::delete('/admin/app/setting/destroy/{id}', [WebSettingController::class, 'destroy'])->name('admin.app.setting.destroy');
});

require __DIR__.'/auth.php';
