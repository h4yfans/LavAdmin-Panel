<?php

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
Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('/', function(){
    if (Auth::check()){
        return redirect()->route('admin.getindex');
    }

    return view('auth.login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/index', 'SummaryController@getIndex')->name('admin.getindex');

    Route::get('/general', 'GeneralSettingsController@getGeneralSettingsAction')->name('admin.getgeneralsettings');
    Route::post('/general', 'GeneralSettingsController@postGeneralSettingsAction')->name('admin.postgeneralsettings');

    Route::get('/site_setting', 'SiteSettingsController@getSiteSettingsAction')->name('admin.getsitesettings');
    Route::post('/site_setting', 'SiteSettingsController@postSiteSettingsAction')->name('admin.postsitesettings');

    Route::post('/site_setting/add_sidemenu', 'SiteSettingsController@postWhichTypeSelectedAction')->name('admin.postwhichtypeselected');
    Route::post('/site_setting/save_sidemenu', 'SiteSettingsController@postSaveSideMenu')->name('admin.postsavemenu');

    Route::get('/addelement', 'ElementController@getElementsAction')->name('admin.getelement');
    Route::post('/addelement/new', 'ElementController@postNewElementAction')->name('admin.postnewelement');
    Route::get('/element/delete/{id}', 'ElementController@getDeleteElementAction')->name('admin.getelementdelete');

    Route::get('/element/addtopic/{id}', 'TopicController@getAddElementTopicAction')->name('admin.getaddelementtopic');
    Route::post('/element/addtopic/{id}/new', 'TopicController@postAddElementTopicAction')->name('admin.postaddelementtopic');

    Route::post('/element/{id}/newsidemenu', 'SideMenuController@postAddElementTopicSideMenuAction')->name('admin.postelementsidemenu');

    Route::get('/element/alltopic/{id}', 'TopicController@getAllElementTopicAction')->name('admin.getallelementtopic');

    Route::get('/element/topic/delete/{id}', 'TopicController@postDeleteElementTopicAction')->name('admin.postdeleteelementtopic');

    Route::get('/element/topic/edit/{id}', 'TopicController@getEditElementTopicAction')->name('admin.geteditelementtopic');
    Route::post('/element/topic/edit/{topic_id}', 'TopicController@postEditElementTopicAction')->name('admin.posteditelementtopic');

    Route::get('/element/add/category/{id}', 'CategoryController@getAddElementCategoryAction')->name('admin.getaddelementcategory');
    Route::get('/element/delete/category/{id}', 'CategoryController@postDeleteElementCategoryAction')->name('admin.postdeleteelementtopiccategory');
    Route::post('/element/add/category/new/{id}', 'CategoryController@postAddElementCategoryAction')->name('admin.postelementtopiccategory');

    Route::get('/element/sidemenus/{id}', 'SideMenuController@getElementSideMenu')->name('admin.getsidemenus');
    Route::post('/element/sidemenus/{id}/new', 'SideMenuController@postElementSideMenu')->name('admin.postsidemenus');

    Route::get('/element/topic/deletesidemenu/{element_id}', 'SideMenuController@getDeleteElementTopicSideMenu')->name('admin.postdeleteelementsidemenu');

    Route::get('/contact', function () {
        return view('admin.contact');
    })->name('contact');
});

