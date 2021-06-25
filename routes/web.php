<?php

use Illuminate\Support\Facades\Route;

#----------------------FRONT END----------------------

    Route::get('/',[
            App\Http\Controllers\MyTubeController::class,'showHome']
    )->name('/');

    Route::get('register/new', [
            App\Http\Controllers\CustomerController::class, 'showCustomerRegister']
    )->name('register-customer');

    Route::get('signIn', [
            App\Http\Controllers\CustomerController::class, 'showSignInCustomer']
    )->name('login-customer');

    Route::post('customer/signIn', [
            App\Http\Controllers\CustomerController::class, 'signInCustomer']
    )->name('customer-sign-in');

    Route::post('signUp', [
            App\Http\Controllers\CustomerController::class, 'signUpCustomer']
    )->name('signup-customer');

    Route::post('search', [
            App\Http\Controllers\SearchController::class, 'searchResult']
    )->name('search');

    Route::get('story/view/{id}', [
            App\Http\Controllers\StoryController::class, 'showStory']
    )->name('view-story');



    Route::middleware(['checkUserAuth'])->group(function () {

        Route::get('profile', [
                App\Http\Controllers\ProfileController::class, 'showProfile']
        )->name('view-profile');

        Route::get('story', [
                App\Http\Controllers\StoryController::class, 'showManageStoryToManager']
        )->name('manager-manage-story');

        Route::get('story/post', [
                App\Http\Controllers\StoryController::class, 'showPostStory']
        )->name('post-story');

        Route::post('story/upload', [
                App\Http\Controllers\StoryController::class, 'uploadStory']
        )->name('save-story');

        Route::post('signOut', [
                App\Http\Controllers\CustomerController::class, 'signOutCustomer']
        )->name('signOut-customer');


        Route::post('story/share', [
                App\Http\Controllers\StoryController::class, 'shareStory']
        )->name('share-story');

        Route::post('story/comment', [
                App\Http\Controllers\CommentController::class, 'submitComment']
        )->name('submit-comment');

        Route::post('comment/delete', [
                App\Http\Controllers\CommentController::class, 'deleteComment']
        )->name('delete-comment');

        Route::post('story/delete', [
                App\Http\Controllers\StoryController::class, 'deleteStory']
        )->name('delete-story');


        Route::get('story/view-own/{id}', [
                App\Http\Controllers\StoryController::class, 'showOwnStory']
        )->name('view-own-story');

        Route::get('story/details/{id}', [
                        App\Http\Controllers\StoryController::class, 'showStoryDetails']
                )->name('view-story-details');

        Route::get('story/edit/{id}', [
                App\Http\Controllers\StoryController::class, 'showStoryEdit']
        )->name('edit-story');

        Route::post('story/edit', [
                App\Http\Controllers\StoryController::class, 'updateStory']
        )->name('update-story');

        Route::get('about', [
                App\Http\Controllers\ProfileController::class, 'showAbout']
        )->name('view-about');

        Route::get('about/edit', [
                App\Http\Controllers\ProfileController::class, 'showEditAbout']
        )->name('edit-about');

        Route::post('about/update', [
                App\Http\Controllers\ProfileController::class, 'updateAbout']
        )->name('update-about');

    });



#----------------------ADMIN--------------------------

    #-----------------USER--------------------

    Route::middleware(['checkAdminAuth'])->group(function () {

        Route::get('/register/user',[
                App\Http\Controllers\AdminUserController::class,'showUserRegistration']
        )->name('add-admin-user');

        Route::post('/save/user',[
                App\Http\Controllers\AdminUserController::class,'saveUser']
        )->name('save-user');

        Route::get('/edit/user/{id}',[
                App\Http\Controllers\AdminUserController::class,'showEditUser']
        )->name('edit-user');

        Route::get('/delete/user/{id}',[
                App\Http\Controllers\AdminUserController::class,'deleteUser']
        )->name('delete-user');

        Route::post('/update/user',[
                App\Http\Controllers\AdminUserController::class,'updateUser']
        )->name('update-user');

        Route::get('/manage/admin/user',[
                App\Http\Controllers\AdminUserController::class,'showManageAdminUser']
        )->name('manage-admin-user');

        Route::get('/view/stories',[
                App\Http\Controllers\StoryController::class,'showStoriesToAdmin']
        )->name('admin-view-stories');


        Route::get('/manage/story',[
                App\Http\Controllers\StoryController::class,'showManageStoryToAdmin']
        )->name('admin-manage-story');

        Route::get('/unlist/story/{id}',[
                App\Http\Controllers\StoryController::class,'makeStoryUnlist']
        )->name('make-unlisted');

        Route::get('/story-details/{id}',[
                App\Http\Controllers\StoryController::class,'showStoryDetailsToAdmin']
        )->name('admin-view-story-details');

        Route::get('/manage/story/comment/{id}',[
                App\Http\Controllers\CommentController::class,'showStoryCommentToAdmin']
        )->name('admin-view-story-comment');

        Route::get('/manage/comment/delete/{id}',[
                App\Http\Controllers\CommentController::class,'deleteStoryCommentByAdmin']
        )->name('admin-delete-story-comment');

        Route::get('/manage/user',[
                App\Http\Controllers\CustomerController::class,'showManageCustomer']
        )->name('manage-customer');

        Route::get('/user/block/{id}',[
                App\Http\Controllers\CustomerController::class,'blockCustomer']
        )->name('blocked-customer');

        Route::get('/user/unblock/{id}',[
                App\Http\Controllers\CustomerController::class,'unblockCustomer']
        )->name('unblocked-customer');

        Route::post('/story/search',[
                    App\Http\Controllers\SearchController::class,'searchByAdmin']
        )->name('admin-search');

    });

#-------------------------ADMIN USER----------------------------


    Route::get('/admin-login',[
            App\Http\Controllers\AdminUserController::class,'showAdminUserLogin']
    )->name('/admin-login');

    Route::post('/adminUser', [
            App\Http\Controllers\AdminUserController::class, 'signInAdminUser']
    )->name('login-admin-user');


    Route::middleware(['checkAdminUserAuth'])->group(function () {

        Route::post('/admin/logout', [
                App\Http\Controllers\AdminUserController::class, 'logoutAdminUser']
        )->name('logout-admin-user');


        Route::get('/admin/home', [
                App\Http\Controllers\AdminUserController::class, 'showAdminPanel']
        )->name('/admin/home');


        Route::get('/admin/view/stories',[
                App\Http\Controllers\StoryController::class,'showStoriesToAdmin']
        )->name('admin-user-view-stories');


        Route::get('/admin/manage/story',[
                App\Http\Controllers\StoryController::class,'showManageStoryToAdmin']
        )->name('admin-user-manage-story');

        Route::get('/admin/unlist/story/{id}',[
                App\Http\Controllers\StoryController::class,'makeStoryUnlist']
        )->name('admin-user-make-unlisted');

        Route::get('/admin/story-details/{id}',[
                App\Http\Controllers\StoryController::class,'showStoryDetailsToAdmin']
        )->name('admin-user-view-story-details');

        Route::get('/admin/manage/story/comment/{id}',[
                App\Http\Controllers\CommentController::class,'showStoryCommentToAdmin']
        )->name('admin-user-view-story-comment');

        Route::get('/admin/manage/comment/delete/{id}',[
                App\Http\Controllers\CommentController::class,'deleteStoryCommentByAdmin']
        )->name('admin-user-delete-story-comment');

        Route::get('/admin/manage/user',[
                App\Http\Controllers\CustomerController::class,'showManageCustomer']
        )->name('admin-user-manage-customer');

        Route::get('/admin/user/block/{id}',[
                App\Http\Controllers\CustomerController::class,'blockCustomer']
        )->name('admin-user-blocked-customer');

        Route::get('/admin/user/unblock/{id}',[
                App\Http\Controllers\CustomerController::class,'unblockCustomer']
        )->name('admin-user-unblocked-customer');

        Route::post('admin/story/search',[
                App\Http\Controllers\SearchController::class,'searchByAdmin']
        )->name('admin-user-search');


    });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
