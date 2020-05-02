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

// --------------------------------------------------------Backend---------------------------------------------------------
Route::group(['namespace'=>'Admin'], function(){
  Route::group(['prefix'=>'login', 'middleware' => 'CheckLogedIn'], function(){
     Route::get('/', 'LoginController@getLogin');
     Route::post('/', 'LoginController@postLogin');

  });
  
  Route::get('logout', 'HomeController@getLogout');
  Route::group(['prefix'=>'admin', 'middleware' => 'CheckLogedOut'], function(){
        Route::get('home', 'HomeController@getHome');

        Route::group(['prefix'=>'category'], function(){
                 Route::get('/', 'CategoryController@getCategory');

                 Route::get('add', 'CategoryController@getAddCategory');
                 Route::post('add', 'CategoryController@postAddCategory');

                 Route::get('edit/{id}', 'CategoryController@getEditCategory');
                 Route::post('edit/{id}', 'CategoryController@postEditCategory');

                 Route::get('delete/{id}', 'CategoryController@getDeleteCategory');
        }); 

        Route::group(['prefix'=>'product'], function(){
                 Route::get('/', 'ProductController@getProduct');

                 Route::get('add', 'ProductController@getAddProduct');
                 Route::post('add', 'ProductController@postAddProduct');

                 Route::get('edit/{id}', 'ProductController@getEditProduct');
                 Route::post('edit/{id}', 'ProductController@postEditProduct')->middleware('CheckAdmin');

                 Route::get('delete/{id}', 'ProductController@getDeleteProduct')->middleware('CheckAdmin');
        }); 
        
        Route::group(['prefix'=>'user'], function(){
                 Route::get('/', 'UserController@getUser')->middleware('CheckAdmin');
                 Route::post('/', 'UserController@postUser')->middleware('CheckAdmin');
     
                 Route::get('add', 'UserController@getAddUser')->middleware('CheckAdmin');
                 Route::post('add', 'UserController@postAddUser')->middleware('CheckAdmin');
     
                 Route::get('edit/{id}', 'UserController@getEditUser');
                 Route::post('edit/{id}', 'UserController@postEditUser');
     
                 Route::get('delete/{id}', 'UserController@getDeleteUser')->middleware('CheckAdmin');
        }); 
        Route::group(['prefix'=>'customer'], function(){
          Route::get('/', 'CustomerController@getCustomer');

          Route::get('verify/{id}', 'CustomerController@getVerify');

          Route::get('edit/{id}', 'CustomerController@getEditCustomer');

          Route::get('delete/{id}', 'CustomerController@getDeleteCustomer')->middleware('CheckAdmin');
        }); 

        Route::group(['prefix'=>'client'], function(){
          Route::get('/', 'ClientController@getClient');

          Route::get('edit/{id}', 'ClientController@getEditClient');

          Route::get('delete/{id}', 'ClientController@getDeleteClient')->middleware('CheckAdmin');

          Route::get('detailBill/{idClient}/{id}', 'ClientController@getDetailClient');

          Route::get('deleteBill/{id}', 'ClientController@getDeleteBill')->middleware('CheckAdmin');

          Route::get('deleteDetailBill/{id}', 'ClientController@getDeleteDetailBill')->middleware('CheckAdmin');

        }); 

        Route::group(['prefix'=>'comment'], function(){
          Route::get('/', 'CommentController@getComment');

          Route::get('edit/{id}', 'CommentController@getEditComment');
          Route::post('edit/{id}', 'CommentController@postEditComment');

          Route::get('delete/{id}', 'CommentController@getDeleteComment')->middleware('CheckAdmin');
        }); 

        Route::group(['prefix'=>'contact'], function(){
          Route::get('/', 'ContactController@getContact');
          Route::get('update', 'ContactController@postContact');
          Route::get('delete/{id}', 'ContactController@getDeleteContact')->middleware('CheckAdmin');
        });
        
        
        Route::group(['prefix'=>'gallery'], function(){
          Route::get('/', 'GalleryController@getGallery');

          Route::post('/', 'GalleryController@postGallery');

          // Route::get('edit/{id}', 'GalleryController@getEditGallery');
          // Route::post('edit/{id}', 'GalleryController@postEditGallery');

          Route::get('delete/{id}', 'GalleryController@getDeleteGallery')->middleware('CheckAdmin');
 }); 
  }); 
});




// --------------------------------------------------------Frontend---------------------------------------------------------


Route::get('/', 'FrontendController@getHome');

Route::group(['prefix' => 'shop'], function(){
  Route::get('/', 'FrontendController@getShop');
  // Route::post('/', 'FrontendController@postShop');
});


Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html', 'FrontendController@postComment');
Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');
Route::get('search', 'FrontendController@getSearch');

Route::get('contact', 'FrontendController@getContact');
Route::post('contact', 'FrontendController@postContact');
Route::get('blog', 'FrontendController@getBlog');
Route::get('about', 'FrontendController@getAbout');
Route::get('security', 'FrontendController@getPolicy');

Route::get('register', 'FrontendController@getRegister');
Route::post('register', 'FrontendController@postRegister');

Route::group(['middleware' => 'CheckClientIn'], function(){
    Route::get('clientLogin', 'FrontendController@getLogin');
    Route::post('clientLogin', 'FrontendController@clientLogin');
});

Route::group(['middleware' => 'CheckClientOut'], function(){
    Route::get('account/{id}', 'FrontendController@getAccount');
    Route::post('account/{id}', 'FrontendController@postAccount');
    Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
    Route::get('/auth/{provide}/callback', 'SocialAuthController@handleProviderCallback');
    Route::get('outLogin', 'FrontendController@outLogin');
});



Route::group(['prefix' => 'cart'], function(){
  Route::get('add/{id}','CartController@getAddCart');
  Route::get('show','CartController@getShowCart');
  Route::get('delete/{id}','CartController@getDeleteCart');
  Route::get('update','CartController@getUpdateCart');
  Route::group(['middleware' => 'CheckCart'], function(){
      Route::get('checkout','CartController@getCheckout');
      Route::post('checkout','CartController@postCheckout');
      Route::get('complete', 'CartController@getComplete');
  });
});

