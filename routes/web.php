<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('site-bakimda',function (){
    return view('front.offline');
});


/*
|--------------------------------------------------------------------------
| Back Routes
|
*/
//Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){

//
//});

    Route::group(["prefix"=>"blogadmin","middleware"=>"admin"],function(){
        Route::get('/','Back\DashboardController@index')->name('dashboard');
        Route::get('makaleler/silinenler','Back\ArticleController@trashed')->name('trashed.article');
        Route::resource('makaleler','Back\ArticleController');
        Route::get('/switch','Back\ArticleController@switch')->name('switch');
        Route::get('/deletearticle/{id}','Back\ArticleController@delete')->name('delete.article');
        Route::get('/harddeletearticle/{id}','Back\ArticleController@hardDelete')->name('hard.delete.article');
        Route::get('/recoverarticle/{id}','Back\ArticleController@recover')->name('recover.article');
        Route::get('/kategoriler','Back\CategoryController@index')->name('category.index');
        Route::post('/kategoriler/create','Back\CategoryController@create')->name('category.create');
        Route::post('/kategoriler/update','Back\CategoryController@update')->name('category.update');
        Route::post('/kategoriler/delete','Back\CategoryController@delete')->name('category.delete');
        Route::get('/kategori/status','Back\CategoryController@switch')->name('category.switch');
        Route::get('/kategori/getData','Back\CategoryController@getData')->name('category.getdata');


        Route::get('/sayfalar','Back\PageController@index')->name('page.index');
        Route::get('/sayfalar/olustur','Back\PageController@create')->name('page.create');
        Route::get('/sayfalar/guncelle/{id}','Back\PageController@update')->name('page.edit');
        Route::post('/sayfalar/guncelle/{id}','Back\PageController@updatePost')->name('page.edit.post');
        Route::post('/sayfalar/olustur','Back\PageController@post')->name('page.create.post');
        Route::get('/sayfa/switch','Back\PageController@switch')->name('page.switch');
        Route::get('/sayfa/sil/{id}','Back\PageController@delete')->name('page.delete');
        Route::get('/sayfa/siralama','Back\PageController@orders')->name('page.orders');


        Route::get('/ayarlar','Back\ConfigController@index')->name('config.index');
        Route::post('/ayarlar/update','Back\ConfigController@update')->name('config.update');
        Route::get('admin-register','LoginController@getRegister')->name('getRegister');
        Route::post('admin-register','LoginController@postRegister')->name('postRegister');
        Route::get('admin-logout','LoginController@getLogout')->name('logout');



    });

//
//
//
//
//
//
//
///*
//|--------------------------------------------------------------------------
//| Front Routes
//|


//*/


Route::get('admin-login','LoginController@getLogin')->name('getLogin');
Route::post('admin-login','LoginController@postLogin')->name('postLogin');

//
//
Route::get('/','Front\HomepageController@index')->name('homepage');
Route::get('sayfa','Front\HomepageController@index');
Route::get('/iletisim','Front\HomepageController@contact')->name('contact');
Route::post('/iletisim','Front\HomepageController@contactpost')->name('contact.post');
Route::get('/kategori/{category}','Front\HomepageController@category')->name('category');
Route::get('/{category}/{slug}','Front\HomepageController@single')->name('single');
Route::get('/{sayfa}','Front\HomepageController@page')->name('page');







