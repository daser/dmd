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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/contractors/{id}', 'PagesController@show')->name('show.arrears');

Route::get('/contractbycat/{slug}', 'PagesController@showByCat')->name('show.arrearscat');


if (env('APP_ENV') === 'production') {
  \URL::forceScheme('https');
}

// auth
Route::get('/auth/login',['uses' => 'AuthController@index', 'as' => 'login']);
Route::post('/signin',['uses' => 'AuthController@login', 'as' => 'login.post']);

Route::post('/comments/store',['uses' => 'CommentController@store', 'as' => 'comments.store']);


Route::group( ['middleware' => ['auth']], function() {
  
  // dashboard
  Route::get('/dashboard',['uses' => 'DashbaordController@index', 'as' => 'dashboard']);
  Route::get('/comments/delete/{id}',['uses' => 'DashbaordController@destroy', 'as' => 'comments.delete']);
  Route::get('/logout', ['uses' => 'AuthController@logout','as' => 'logout']);
  Route::get('/users',['uses' => 'UserController@index', 'as' => 'users.index']);
  Route::post('/user/store',['uses' => 'UserController@store', 'as' => 'users.store']);
  Route::post('/user/update/{id}',['uses' => 'UserController@update', 'as' => 'users.update']);
  Route::get('/user/delete/{id}',['uses' => 'UserController@destroy', 'as' => 'users.delete']);
  
  //roles
  Route::get('/roles',['uses' => 'RoleController@index', 'as' => 'roles.index']);
  Route::post('/roles/store',['uses' => 'RoleController@store', 'as' => 'roles.store']); 
  Route::put('/roles/update/{id}', 'RoleController@update')->name('roles.update');
  Route::get('/roles/delete/{id}', 'RoleController@delete')->name('roles.delete');

  // permission
  Route::get('/permissions',['uses' => 'PermissionController@index', 'as' => 'permissions.index']);
  Route::post('/permissions/store',['uses' => 'PermissionController@store', 'as' => 'permissions.store']); 
  Route::put('/permissionsupdate/{id}', 'PermissionController@update')->name('permissions.update');
  Route::get('/permissions/delete/{id}', 'PermissionController@delete')->name('permissions.delete');

   // mdas
   Route::get('/mdas',['uses' => 'MDAController@index', 'as' => 'mdas.index']);
   Route::post('/mda/add',['uses' => 'MDAController@store', 'as' => 'mda.add']);
   Route::post('/mda/update/{slug}',['uses' => 'MDAController@update', 'as' => 'mda.update']);
   Route::get('/mda/delete/{slug}',['uses' => 'MDAController@destroy', 'as' => 'mda.delete']);

  //  economic category
  Route::get('/economic/category',['uses' => 'EconomicCategoryController@index', 'as' => 'economic_category.index']);
  Route::post('/economic/category/store',['uses' => 'EconomicCategoryController@store', 'as' => 'economic_category.store']);
  Route::post('/economic/category/{slug}',['uses' => 'EconomicCategoryController@update', 'as' => 'economic_category.update']);
  Route::get('/economic/category/delete/{slug}',['uses' => 'EconomicCategoryController@destroy', 'as' => 'economic_category.delete']);


  //feedback

    Route::get('/arrears/feedback',['uses' => 'FeedbackController@index', 'as' => 'arrears.feedback']);
    Route::get('/feedback/delete/{slug}',['uses' => 'FeedbackController@destroy', 'as' => 'feedback.delete']);

  // nature of debt
  Route::get('/nature-of-debt',['uses' => 'NatureOfDebtController@index', 'as' => 'nature_of_debt.index']);
  Route::post('/nature-of-debt/store',['uses' => 'NatureOfDebtController@store', 'as' => 'nature_of_debt.store']);
  Route::post('/nature-of-debt/{slug}',['uses' => 'NatureOfDebtController@update', 'as' => 'nature_of_debt.update']);
  Route::get('/nature-of-debt/delete/{slug}',['uses' => 'NatureOfDebtController@destroy', 'as' => 'nature_of_debt.delete']);
  // arrears category
  Route::get('/arrears/category',['uses' => 'ArrearsCategoryController@index', 'as' => 'arrears_category.index']);
  Route::post('/arrears/category',['uses' => 'ArrearsCategoryController@store', 'as' => 'arrears_category.store']);
  Route::post('/arrears/category/{slug}',['uses' => 'ArrearsCategoryController@update', 'as' => 'arrears_category.update']);
  Route::get('/arrears-category/delete/{slug}',['uses' => 'ArrearsCategoryController@destroy', 'as' => 'arrears_category.delete']);

    // arrears
  Route::get('/arrears',['uses' => 'ArrearController@index', 'as' => 'arrears.index']);
  Route::get('/arrears/create',['uses' => 'ArrearController@create', 'as' => 'arrears.create']);
  Route::post('/arrears/store',['uses' => 'ArrearController@store', 'as' => 'arrears.store']);
  Route::get('/arrears/{slug}',['uses' => 'ArrearController@show', 'as' => 'arrears.show']);
  Route::get('/arrears-edit/{slug}',['uses' => 'ArrearController@edit', 'as' => 'arrears.edit']);
  Route::post('/arrears/update/{slug}',['uses' => 'ArrearController@update', 'as' => 'arrears.update']);
  Route::get('/arrears/delete/{slug}',['uses' => 'ArrearController@destroy', 'as' => 'arrears.delete']);
    //reports
  Route::get('/reports',['uses' => 'ReportController@index', 'as' => 'reports.index']);
    Route::post('/reports',['uses' => 'ReportController@yearly', 'as' => 'reports.yearly']);

});
