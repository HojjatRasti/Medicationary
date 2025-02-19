<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\Blog\QuillController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\InquiriesController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PodcastsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\WebinarsController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Home\AccueilController;
use App\Http\Controllers\Home\WeblogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group این خط یعنی چی؟ ما که وب میدل ور نداریم، کجاس این؟. Make something great!
|
*/


Route::prefix('admin')->group(function(){
    Route::get('',[IndexController::class, 'landscape'])->name('admin.index.landscape')->middleware('auth');

    Route::prefix('users')->middleware('auth')->group(function (){
        Route::get('',[UsersController::class, 'landscape'])->name('admin.users.landscape');
        Route::get('create',[UsersController::class, 'create'])->name('admin.users.create');
        Route::post('store',[UsersController::class, 'store'])->name('admin.users.store');
        Route::get('{user_id}/edit',[UsersController::class, 'edit'])->name('admin.users.edit');
        Route::put('{user_id}/update',[UsersController::class, 'update'])->name('admin.users.update');
        Route::delete('{user_id}/delete',[UsersController::class, 'delete'])->name('admin.users.delete');
    });
        Route::prefix('login')->group(function (){
            Route::get('',[LoginController::class, 'landscape'])->name('login');
            Route::get('/logout',[LoginController::class, 'logout'])->name('admin.logout');
            Route::post('/login',[LoginController::class, 'check'])->name('admin.login.check');
    });
        Route::prefix('webinars')->middleware('auth')->group(function (){
            Route::get('',[WebinarsController::class, 'landscape'])->name('admin.webinars.landscape');
            Route::get('create',[WebinarsController::class, 'create'])->name('admin.webinars.create');
            Route::post('store',[WebinarsController::class, 'store'])->name('admin.webinars.store');
            Route::get('{webinar_id}/edit',[WebinarsController::class, 'edit'])->name('admin.webinars.edit');
            Route::get('category',[CategoriesController::class, 'landscapeWebinar'])->name('admin.webinars.category');
            Route::post('Webinar',[CategoriesController::class, 'store'])->name('admin.webinar.categories.store');
            Route::delete('{category_id}/deleteWebinar',[CategoriesController::class, 'delete'])->name('admin.webinar.categories.delete');
            Route::get('{category_id}/webinars',[CategoriesController::class, 'edit'])->name('admin.webinar.category.edit');
            Route::put('{category_id}/updateWebinar',[CategoriesController::class, 'update'])->name('admin.webinar.categories.update');
            Route::put('{webinar_id}/update',[WebinarsController::class, 'update'])->name('admin.webinars.update');
            Route::delete('{webinar_id}/delete',[WebinarsController::class, 'delete'])->name('admin.webinars.delete');

            Route::get('{product_id}/download',[WebinarsController::class,'download'])->name('admin.webinars.download');

        });
        Route::prefix('podcasts')->middleware('auth')->group(function (){
            Route::get('',[PodcastsController::class, 'landscape'])->name('admin.podcasts.landscape');
            Route::get('create', [PodcastsController::class, 'create'])->name('admin.podcasts.create');
            Route::post('store', [PodcastsController::class, 'store'])->name('admin.podcasts.store');
            Route::get('{podcast_id}/edit', [PodcastsController::class, 'edit'])->name('admin.podcasts.edit');
            Route::get('category',[CategoriesController::class, 'landscapePodcast'])->name('admin.podcasts.category');
            Route::post('Podcast',[CategoriesController::class, 'store'])->name('admin.podcast.categories.store');
            Route::delete('{category_id}/deletePodcast',[CategoriesController::class, 'delete'])->name('admin.podcast.categories.delete');
            Route::get('{category_id}/podcasts',[CategoriesController::class, 'edit'])->name('admin.podcast.category.edit');
            Route::put('{category_id}/updatePodcast',[CategoriesController::class, 'update'])->name('admin.podcast.categories.update');
            Route::put('{podcast_id}/update', [PodcastsController::class, 'update'])->name('admin.podcasts.update');
            Route::delete('{podcast_id}/delete', [PodcastsController::class, 'delete'])->name('admin.podcasts.delete');

            Route::get('{product_id}/download',[PodcastsController::class,'download'])->name('admin.podcasts.download');

        });
        Route::prefix('inquiries')->middleware('auth')->group(function (){
            Route::get('',[InquiriesController::class, 'landscape'])->name('admin.inquiries.landscape');
            Route::get('input',[InquiriesController::class, 'input'])->name('admin.inquiries.input');
            Route::get('toggleStatus',[InquiriesController::class, 'toggleStatus'])->name('admin.inquiries.toggleStatus');
            Route::get('{question_id}/answer',[InquiriesController::class, 'answer'])->name('admin.inquiries.answer');
            Route::post('{question_id}/insert',[InquiriesController::class, 'insert'])->name('admin.inquiries.insert');
            Route::get('{answer_id}/edit',[InquiriesController::class, 'edit'])->name('admin.inquiries.edit');
            Route::get('category',[CategoriesController::class, 'landscapeInquiries'])->name('admin.inquiries.category');
            Route::delete('{category_id}/deleteInquiry',[CategoriesController::class, 'delete'])->name('admin.inquiry.categories.delete');
            Route::get('{category_id}/inquiries',[CategoriesController::class, 'edit'])->name('admin.inquiry.category.edit');
            Route::put('{category_id}/updateAnswer',[CategoriesController::class, 'update'])->name('admin.inquiry.categories.update');
            Route::post('Answer',[CategoriesController::class, 'store'])->name('admin.inquiry.categories.store');
            Route::put('{answer_id}/update',[InquiriesController::class, 'update'])->name('admin.inquiries.update');
            Route::delete('{answer_id}/delete',[InquiriesController::class, 'delete'])->name('admin.inquiries.delete');

            Route::get('{product_id}/download',[InquiriesController::class,'download'])->name('admin.inquiries.download');

        });
        Route::prefix('post')->middleware('auth')->group(function (){
            Route::get('',[PostController::class, 'index'])->name('admin.post.index');
            Route::get('create',[PostController::class, 'create'])->name('admin.post.create');
            Route::post('store',[PostController::class, 'store'])->name('admin.post.store');
            Route::get('{post_id}/edit',[PostController::class, 'edit'])->name('admin.post.edit');
            Route::get('category',[CategoriesController::class, 'landscapeArticles'])->name('admin.post.category');
            Route::delete('{category_id}/deletePost',[CategoriesController::class, 'delete'])->name('admin.post.categories.delete');
            Route::get('{category_id}/articles',[CategoriesController::class, 'edit'])->name('admin.post.category.edit');
            Route::put('{category_id}/updatePost',[CategoriesController::class, 'update'])->name('admin.post.categories.update');
            Route::post('Post',[CategoriesController::class, 'store'])->name('admin.post.categories.store');

            Route::put('{post_id}/update',[PostController::class, 'update'])->name('admin.post.update');
            Route::delete('{post_id}/delete',[PostController::class, 'delete'])->name('admin.post.delete');
//            Route::get('create',[CommentController::class, 'create'])->name('admin.articles.create');
            Route::get('{product_id}/download',[PostController::class,'download'])->name('admin.post.download');

        });

});

Route::prefix('')->group(function (){
    Route::get('',[AccueilController::class, 'landscape'])->name('home.landscape');
    Route::get('webinarsList',[WeblogController::class, 'webinars'])->name('home.webinarsList');
    Route::get('webinar/{webinar_id}/webinarPlayer',[WeblogController::class, 'webinarPlayer'])->name('home.webinarPlayer');
    Route::get('ask',[WeblogController::class, 'ask'])->name('home.ask');
    Route::post('add',[InquiriesController::class, 'addInquiries'])->name('admin.inquiries.addInquiries');
    Route::get('responses',[WeblogController::class, 'responses'])->name('home.responses');
    Route::get('podcast',[WeblogController::class, 'podcast'])->name('home.podcast');
    Route::get('blog',[WeblogController::class, 'blog'])->name('home.blog');
    Route::get('basicSearch',[WeblogController::class, 'basicSearch'])->name('home.blog.search');
    Route::get('categorySearch',[WeblogController::class, 'categorySearch'])->name('home.blog.categorySearch');
//    Route::get('DataTable',[WeblogController::class, 'DataTable'])->name('home.blog.index');
    Route::get('blog/post{post_id}',[WeblogController::class, 'article'])->name('home.post');
});
