<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BiographyController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [PostController::class, 'giveInfos'])->name('home');
Route::get('/accueil', [PostController::class, 'giveInfos'])->name('home');

Route::get('/mentions', [PostController::class, 'mentionsLegals'])->name('footerlinks.mentions');
Route::get('/contactez-nous', [PostController::class, 'contactezNous'])->name('footerlinks.contacteznous');

Route::get('/actualités', [PostController::class, 'index'])->name('posts.index');
Route::get('/actualités/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/annuaire/apifan', [BiographyController::class, 'indexApifan'])->name('biographies.indexApifan');
Route::get('/annuaire/apiculteur', [BiographyController::class, 'indexApiculteur'])->name('biographies.indexApiculteur');

Route::get('/annuaire/biographie/{biography}', [BiographyController::class, 'show'])->name('biographies.show');



Route::middleware(['auth','RedirectIfFirstLogin'])->group(function() {

        /*<--Gestion de profil-->*/
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');    
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');     
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        /*<--Gestion de commentaires-->*/
        Route::post('/posts/{post}/comments/store', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
        Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

        /*<--Gestion de point de biographie-->*/
        Route::post('/biographies/{biography}/addpoint', [BiographyController::class, 'addpoint'])->name('biographies.addpoint');
        Route::delete('/biographies/{biography}/delpoint', [BiographyController::class, 'delpoint'])->name('biographies.delpoint');

        /*<--Gestion de biographie-->*/
        Route::post('/biographies/store', [BiographyController::class, 'store'])->name('biographies.store');
        Route::get('/biographies/edit/{biography}', [BiographyController::class, 'edit'])->name('biographies.edit');
        Route::post('/biographies/update/{biography}', [BiographyController::class, 'update'])->name('biographies.update');

        Route::middleware(['checkRole:admin'])->group(function () {
            Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
            Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
            Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
            Route::post('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');
            Route::delete('/posts/destroy/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
            Route::delete('/posts/destroyIndex/{post}', [PostController::class, 'destroyIndex'])->name('posts.destroyIndex');
            Route::get('/menu-apiculteur', [PostController::class, 'indexDashboardApiculteur'])->name('posts.dashboardApiculteur');
        });
        Route::middleware(['checkRole:apiculteur'])->group(function () {
            Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
            Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
            Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
            Route::post('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');
            Route::delete('/posts/destroy/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
            Route::delete('/posts/destroyIndex/{post}', [PostController::class, 'destroyIndex'])->name('posts.destroyIndex');
            Route::get('/menu-apiculteur', [PostController::class, 'indexDashboardApiculteur'])->name('posts.dashboardApiculteur');
        });
});        

Route::middleware('auth')->group(function() {
    Route::middleware('checkRole:admin')->group(function () {

        Route::get('/menu-admin', [AdminController::class, 'index'])->name('admins.dashboardAdmin');

        Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
        Route::delete('/admin/comments/{comment}', [AdminController::class, 'destroyComment'])->name('admin.comments.destroy');
        Route::delete('/admin/biographies/{biography}', [AdminController::class, 'destroyBiography'])->name('admin.biographies.destroy');
        Route::delete('/admin/posts/{post}', [AdminController::class, 'destroyPost'])->name('admin.posts.destroy');
    });
}); 

Route::middleware(['CheckExistingBiography','auth'])->group(function() {
            /*<--Gestion de biographie-->*/
            Route::get('/biographies/create', [BiographyController::class, 'create'])->name('biographies.create');
        });  

require __DIR__.'/auth.php';