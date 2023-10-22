<?php

use App\Http\Controllers\Pages\App\CategoryBController;
use App\Http\Controllers\Pages\App\TagBController;
use App\Http\Controllers\Pages\App\PostController;

use App\Http\Controllers\Pages\Profile\AdminController;
use App\Http\Controllers\Pages\Profile\SAdminController;
use App\Http\Controllers\Pages\Profile\AuthorController;
use App\Http\Controllers\Pages\Profile\UserController;
use App\Http\Controllers\Pages\Base\TodoController;
use App\Http\Controllers\Pages\Base\PageController;
use App\Http\Controllers\Pages\Base\AnnouncementController;
use App\Http\Controllers\Pages\Base\WebSettingController;
use App\Http\Controllers\Pages\Base\RootController;
use App\Http\Controllers\Pages\Base\MessageController;
use App\Http\Controllers\Pages\Master\UserManagerController;
use App\Http\Controllers\Pages\App\ChatController;
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
Route::get('/blog/{slug}', [RootController::class, 'blogsingle'])->name('root.pages.blog.single');
Route::get('/category/{category:slug}', [RootController::class, 'blogcategory'])->name('root.pages.blog.category');
Route::get('/tag/{tagsb:slug}', [RootController::class, 'blogtags'])->name('root.pages.blog.tags');
Route::get('/privacy-policy', [RootController::class, 'privacyPolicy'])->name('root.pages.privacy-policy');
Route::get('/contact-us', [RootController::class, 'contact'])->name('root.pages.contact');
Route::post('/contact-us/store', [MessageController::class, 'store'])->name('root.pages.contact.store');
Route::get('/product/details/{id}', [RootController::class, 'pdetails'])->name('root.pages.pdetails');
Route::get('/projects', [RootController::class, 'projects'])->name('root.pages.projects');
// Route::get('/product/{pakets:slug}', [RootController::class, 'sample'])->name('root.pages.sample');
Route::get('/services', [RootController::class, 'services'])->name('root.pages.services');


Route::get('/nota-penjualan', function () {
    $data['title'] = "iSchool";
    $data['menu'] = "Error";
    $data['submenu'] = "Error Verify";

    return view('pages.mail.nota-penjualan',$data);
})->name('pages.nota-penjualan');

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

    // APLIKASI CHAT
    Route::get('/member/chat', [ChatController::class, 'index'])->name('member.chat.index');
    Route::post('/member/chat/store', [ChatController::class, 'store'])->name('member.chat.store');
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

Route::middleware(['auth', 'user-access:Author', 'isverify:1'])->group(function () {

    // DASHBOARD ADMIN
    Route::get('/author/home', [AuthorController::class, 'index'])->name('author.home.index');
    Route::get('/author/profile', [AuthorController::class, 'show'])->name('author.profile.index');
    Route::patch('/author/profile/update', [AuthorController::class, 'update'])->name('author.profile.update');

    // AUTHOR UPDATE I
    Route::get('/author/booking/all', [AuthorController::class, 'viewBooking'])->name('author.booking.view');
    Route::patch('/author/book/product/sending/{id}', [AuthorController::class, 'sendProduct'])->name('author.book.product.sending');

    // ROUTING CATEGORY BLOG
    Route::get('/author/category', [CategoryBController::class, 'index'])->name('author.blog.category-index');
    Route::post('/author/category/store', [CategoryBController::class, 'store'])->name('author.blog.category-store');
    Route::patch('/author/category/{id}/update', [CategoryBController::class, 'update'])->name('author.blog.category-update');
    Route::delete('/author/category/{id}/destroy', [CategoryBController::class, 'destroy'])->name('author.blog.category-destroy');

    // ROUTING TAGS BLOG
    Route::get('/author/tags', [TagBController::class, 'index'])->name('author.blog.tags-index');
    Route::post('/author/tags/store', [TagBController::class, 'store'])->name('author.blog.tags-store');
    Route::patch('/author/tags/{id}/update', [TagBController::class, 'update'])->name('author.blog.tags-update');
    Route::delete('/author/tags/{id}/destroy', [TagBController::class, 'destroy'])->name('author.blog.tags-destroy');

    // ROUTING POSTS BLOG
    Route::get('/author/posts', [PostController::class, 'index'])->name('author.blog.post-index');
    Route::get('/author/posts/create', [PostController::class, 'create'])->name('author.blog.post-create');
    Route::post('/author/posts/store', [PostController::class, 'store'])->name('author.blog.post-store');
    Route::get('/author/posts/{id}/edit', [PostController::class, 'edit'])->name('author.blog.post-edit');
    Route::patch('/author/posts/{id}/update', [PostController::class, 'update'])->name('author.blog.post-update');
    Route::delete('/author/posts/{id}/destroy', [PostController::class, 'destroy'])->name('author.blog.post-destroy');

    // APLIKASI TODO LIST
    Route::get('/author/app/todo', [TodoController::class, 'index'])->name('author.app.todo.index');
    Route::post('/author/app/todo/store', [TodoController::class, 'store'])->name('author.app.todo.store');
    Route::delete('/author/app/todo/destroy/{id}', [TodoController::class, 'destroy'])->name('author.app.todo.destroy');
    Route::patch('/author/app/todo/update/{id}', [TodoController::class, 'update'])->name('author.app.todo.update');



});
Route::middleware(['auth', 'user-access:Admin', 'isverify:1'])->group(function () {
    Route::get('/chat-index', function () {
        $data['title'] = "iSchool";
        $data['menu'] = "Error";
        $data['submenu'] = "Chat";

        return view('pages.app.chat.chat-index',$data);
    })->name('chat.index');
    // DASHBOARD ADMIN
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home.index');
    Route::get('/admin/profile', [AdminController::class, 'show'])->name('admin.profile.index');
    Route::patch('/admin/profile/update', [AdminController::class, 'update'])->name('admin.profile.update');

    // MESSAGE USER
    Route::get('/admin/message', [MessageController::class, 'index'])->name('admin.message.index');
    Route::get('/admin/message/show/{id}', [MessageController::class, 'show'])->name('admin.message.show');
    Route::post('/admin/message/reply/{id}', [MessageController::class, 'kirimBalas'])->name('admin.message.reply');
    Route::delete('/admin/message/delete/{id}', [MessageController::class, 'destroy'])->name('admin.message.destroy');

    // APLIKASI TODO LIST
    Route::get('/admin/app/todo', [TodoController::class, 'index'])->name('admin.app.todo.index');
    Route::post('/admin/app/todo/store', [TodoController::class, 'store'])->name('admin.app.todo.store');
    Route::delete('/admin/app/todo/destroy/{id}', [TodoController::class, 'destroy'])->name('admin.app.todo.destroy');
    Route::patch('/admin/app/todo/update/{id}', [TodoController::class, 'update'])->name('admin.app.todo.update');
    // APLIKASI PENGUMUMAN
    Route::get('/admin/app/announ', [AnnouncementController::class, 'index'])->name('admin.app.announ.index');
    Route::post('/admin/app/announ/store', [AnnouncementController::class, 'store'])->name('admin.app.announ.store');
    Route::get('/admin/app/announ/show/{id}', [AnnouncementController::class, 'show'])->name('admin.app.announ.show');
    Route::patch('/admin/app/announ/update/{id}', [AnnouncementController::class, 'update'])->name('admin.app.announ.update');
    Route::delete('/admin/app/announ/destroy/{id}', [AnnouncementController::class, 'destroy'])->name('admin.app.announ.destroy');
    // KELOLA PAGES
    Route::get('/admin/pages', [PageController::class, 'index'])->name('admin.pages.index');
    Route::post('/admin/pages/store', [PageController::class, 'store'])->name('admin.pages.store');
    Route::get('/admin/pages/show/{id}', [PageController::class, 'show'])->name('admin.pages.show');
    Route::patch('/admin/pages/update/{id}', [PageController::class, 'update'])->name('admin.pages.update');
    Route::delete('/admin/pages/destroy/{id}', [PageController::class, 'destroy'])->name('admin.pages.destroy');

    // APLIKASI CHAT
    Route::get('/admin/chat', [ChatController::class, 'index'])->name('admin.chat.index');
    Route::post('/admin/chat/store', [ChatController::class, 'store'])->name('admin.chat.store');

    // FITUR PAKET
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
    Route::get('/admin/usermanage/memplus', [UserManagerController::class, 'index'])->name('admin.usermanage.memberplus');
    Route::get('/admin/usermanage/author', [UserManagerController::class, 'index'])->name('admin.usermanage.author');
    Route::get('/admin/usermanage/admin', [UserManagerController::class, 'index'])->name('admin.usermanage.admin');
    Route::get('/admin/usermanage/show/{id}', [UserManagerController::class, 'show'])->name('admin.usermanage.show');
    // TAMBAH USER 4 ROLE
    Route::post('/admin/usermanage/store', [UserManagerController::class, 'store'])->name('admin.usermanage.store');
    // DELETE USER AUTHOR AND MEMBER PLUS
    Route::delete('/admin/usermanage/delete/{id}', [UserManagerController::class, 'destroy'])->name('admin.usermanage.destroy');
    Route::delete('/admin/usermanage/author/delete/{id}', [UserManagerController::class, 'authordestroy'])->name('admin.usermanage.author.destroy');
    Route::delete('/admin/usermanage/memberplus/delete/{id}', [UserManagerController::class, 'memberplusdestroy'])->name('admin.usermanage.memberplus.destroy');


    // ANNOUNCEMENT LIST APP
    Route::get('/admin/app/setting', [WebSettingController::class, 'index'])->name('admin.app.setting.index');
    Route::patch('/admin/app/setting/update', [WebSettingController::class, 'update'])->name('admin.app.setting.update');
});
Route::middleware(['auth', 'user-access:Super Admin', 'isverify:1'])->group(function () {

    // DASHBOARD SUPER ADMIN
    Route::get('/superadmin/home', [SAdminController::class, 'index'])->name('sadmin.home.index');
    Route::get('/superadmin/profile', [SAdminController::class, 'show'])->name('sadmin.profile.index');
    Route::patch('/superadmin/profile/update', [SAdminController::class, 'update'])->name('sadmin.profile.update');

    Route::get('/superadmin/member/all', [SAdminController::class, 'memberAll'])->name('sadmin.member.all');
    Route::get('/superadmin/member/filter', [SAdminController::class, 'memberFilter'])->name('sadmin.member.filter');
    Route::get('/superadmin/report/member/download/{month}/{format}', [SAdminController::class, 'printReportMember'])->name('sadmin.report-member.download');

    Route::get('/superadmin/transaksi/all', [SAdminController::class, 'transAll'])->name('sadmin.transaksi.all');
    Route::get('/superadmin/transaksi/filter', [SAdminController::class, 'transFilter'])->name('sadmin.transaksi.filter');
    Route::get('/superadmin/report/download/{month}/{format}', [SAdminController::class, 'printReport'])->name('sadmin.report.download');
    // Route::get('/superadmin/transaksi/preview-print', [SAdminController::class, 'previewPrint'])->name('sadmin.transaksi.preview-print');
    // Route::get('/superadmin/transaksi/all', [SAdminController::class, 'transAll'])->name('sadmin.transaksi.all');
    // Route::get('/superadmin/transaksi/all', [SAdminController::class, 'transAll'])->name('sadmin.transaksi.filter');
    // Route::get('/superadmin/transaksi/preview-print', [SAdminController::class, 'previewPrint'])->name('sadmin.transaksi.preview-print');

    Route::get('/superadmin/print', [SAdminController::class, 'cetakDataTransaksi'])->name('sadmin.report.print');

});

require __DIR__.'/auth.php';
