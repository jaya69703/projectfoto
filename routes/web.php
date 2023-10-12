<?php

use App\Http\Controllers\Pages\Profile\AdminController;
use App\Http\Controllers\Pages\Profile\UserController;
use App\Http\Controllers\Pages\Base\TodoController;
use App\Http\Controllers\Pages\Base\AnnouncementController;
use App\Http\Controllers\Pages\Base\WebSettingController;
use App\Http\Controllers\Pages\Base\RootController;
use App\Http\Controllers\Pages\Base\MessageController;
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
Route::get('/blog', [RootController::class, 'blog'])->name('root.pages.blog');
Route::get('/blog/single', [RootController::class, 'blogsingle'])->name('root.pages.blog.single');
Route::get('/contact-us', [RootController::class, 'contact'])->name('root.pages.contact');
Route::post('/contact-us/store', [MessageController::class, 'store'])->name('root.pages.contact.store');
Route::get('/product/details/{id}', [RootController::class, 'pdetails'])->name('root.pages.pdetails');
Route::get('/projects', [RootController::class, 'projects'])->name('root.pages.projects');
// Route::get('/product/{pakets:slug}', [RootController::class, 'sample'])->name('root.pages.sample');
Route::get('/services', [RootController::class, 'services'])->name('root.pages.services');


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


Route::middleware(['auth', 'user-access:Member'])->group(function () {
    Route::get('/member/book/changepass', [RootController::class, 'profile'])->name('member.book.changepass');
    Route::get('/member/book/profile', [RootController::class, 'profile'])->name('member.book.profile');
    Route::patch('/member/book/update-profile', [RootController::class, 'updateUser'])->name('member.book.update');
    Route::put('/member/book/update-password', [RootController::class, 'updatePass'])->name('member.book.update.password');
    Route::post('/member/book/product', [RootController::class, 'booknow'])->name('member.book.product');
    Route::patch('/member/book/product/payment/{id}', [RootController::class, 'uploadProof'])->name('member.book.product.payment');
    Route::get('/member/book/history', [RootController::class, 'history'])->name('member.book.history');
    Route::get('/member/book/history/{id}', [RootController::class, 'historyShow'])->name('member.book.history.show');
});
Route::middleware(['auth', 'user-access:Member'])->group(function () {
    // DASHBOARD ADMIN
    Route::get('/member/home', [UserController::class, 'index'])->name('member.home.index');
    Route::get('/member/profile', [UserController::class, 'show'])->name('member.profile.index');
    Route::patch('/member/profile/update', [UserController::class, 'update'])->name('member.profile.update');

    // TODO LIST APP
    Route::get('/member/app/todo', [TodoController::class, 'index'])->name('member.app.todo.index');
    Route::post('/member/app/todo/store', [TodoController::class, 'store'])->name('member.app.todo.store');
    Route::delete('/member/app/todo/destroy/{id}', [TodoController::class, 'destroy'])->name('member.app.todo.destroy');
    Route::patch('/member/app/todo/update/{id}', [TodoController::class, 'update'])->name('member.app.todo.update');
});
//

Route::middleware(['auth', 'user-access:Admin', 'isverify:1'])->group(function () {
    // DASHBOARD ADMIN
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home.index');
    Route::get('/admin/profile', [AdminController::class, 'show'])->name('admin.profile.index');
    Route::patch('/admin/profile/update', [AdminController::class, 'update'])->name('admin.profile.update');

    // MESSAGE USER
    Route::get('/admin/message', [MessageController::class, 'index'])->name('admin.message.index');
    Route::get('/admin/message/show/{id}', [MessageController::class, 'show'])->name('admin.message.show');
    Route::delete('/admin/message/delete/{id}', [MessageController::class, 'destroy'])->name('admin.message.destroy');

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
    Route::get('/admin/booking/verify', [BookingController::class, 'index'])->name('admin.booking.verify');
    Route::delete('/admin/booking/delete/{id}', [BookingController::class, 'destroy'])->name('admin.booking.destroy');
    Route::patch('/admin/book/product/verify/{id}', [BookingController::class, 'verifyPayment'])->name('admin.book.product.verify');


    // USER MANAGER CRUD
    Route::get('/admin/usermanage/member', [UserManagerController::class, 'index'])->name('admin.usermanage.member');
    Route::get('/admin/usermanage/member-plus', [UserManagerController::class, 'index'])->name('admin.usermanage.memberplus');
    Route::get('/admin/usermanage/author', [UserManagerController::class, 'index'])->name('admin.usermanage.author');
    Route::get('/admin/usermanage/admin', [UserManagerController::class, 'index'])->name('admin.usermanage.admin');
    // Tambah User
    Route::post('/admin/usermanage/store', [UserManagerController::class, 'store'])->name('admin.usermanage.store');



    Route::post('/admin/usermanage/member/store', [UserManagerController::class, 'store'])->name('admin.usermanage.member.store');
    Route::get('/admin/usermanage/member/edit/{id}', [UserManagerController::class, 'edit'])->name('admin.usermanage.member.edit');
    Route::get('/admin/usermanage/member/show/{id}', [UserManagerController::class, 'store'])->name('admin.usermanage.member.show');
    Route::patch('/admin/usermanage/member/update/{id}', [UserManagerController::class, 'update'])->name('admin.usermanage.member.update');
    Route::patch('/admin/usermanage/worker/update/{id}', [UserManagerController::class, 'update'])->name('admin.usermanage.worker.update');
    Route::delete('/admin/usermanage/member/delete/{id}', [UserManagerController::class, 'Userdestroy'])->name('admin.usermanage.member.destroy');
    Route::delete('/admin/usermanage/worker/delete/{id}', [UserManagerController::class, 'destroy'])->name('admin.usermanage.worker.destroy');
    Route::get('/admin/usermanage/member/create', [UserManagerController::class, 'create'])->name('admin.usermanage.member.create');

    // ANNOUNCEMENT LIST APP
    Route::get('/admin/app/setting', [WebSettingController::class, 'index'])->name('admin.app.setting.index');
    Route::patch('/admin/app/setting/update', [WebSettingController::class, 'update'])->name('admin.app.setting.update');
});

require __DIR__.'/auth.php';
