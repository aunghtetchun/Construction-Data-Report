<?php



Route::get('/', function () {
   return redirect()->route('login');
});


Auth::routes();


//admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
   Route::resource('site', SiteController::class);
   Route::resource('item', ItemController::class);
   Route::resource('target', TargetController::class);
   Route::get('/admin/manager','AdminController@managerList')->name('admin.managerList');
   Route::get('/leader','AdminController@leaderList')->name('admin.leaderList');
   Route::get('/admin/manager/create','AdminController@createManager')->name('admin.createManager');
   Route::post('/admin/manager','AdminController@storeManager')->name('admin.storeManager');
   Route::get('/admin/manager/{id}','AdminController@editManager')->name('admin.editManager');
   Route::put('/admin/manager/{id}','AdminController@updateManager')->name('admin.updateManager');

   Route::get('/leader/create','AdminController@createLeader')->name('admin.createLeader');
   Route::post('/leader','AdminController@storeLeader')->name('admin.storeLeader');
   Route::get('/leader/{id}','AdminController@editLeader')->name('admin.editLeader');
   Route::put('/leader/{id}','AdminController@updateLeader')->name('admin.updateLeader');

   Route::get('/report','AdminController@reportList')->name('admin.reportList');
   Route::get('/order','AdminController@orderList')->name('admin.orderList');
   Route::get('/admin-home', 'HomeController@admin')->name('admin.home');

   Route::get('/report/data','AdminController@getReport')->name('admin.getReport');
   Route::get('/order/data','AdminController@getOrder')->name('admin.getOrder');
   Route::post('/order/approve','AdminController@approveOrder')->name('admin.approveOrder');


   Route::get('/sample', 'HomeController@sample')->name('sample');
   Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
   Route::post('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');
   Route::post('/change-name', 'ProfileController@changeName')->name('profile.changeName');
   Route::post('/change-email', 'ProfileController@changeEmail')->name('profile.changeEmail');
   Route::post('/change-photo', 'ProfileController@changePhoto')->name('profile.changePhoto');

});

// worker
Route::middleware(['auth', 'isManager'])->prefix('manager')->name('manager.')->group(function () {
   Route::get('/leader','ManagerController@getLeader')->name('getLeader');
   Route::get('/report','ManagerController@getReport')->name('getReport');
   Route::get('/order','ManagerController@getOrder')->name('getOrder');
   Route::get('/order/create','ManagerController@createOrder')->name('createOrder');
   Route::post('/order','ManagerController@storeOrder')->name('storeOrder');
   Route::get('/order/{id}','ManagerController@editOrder')->name('editOrder');
   Route::put('/order/{id}','ManagerController@updateOrder')->name('updateOrder');
   Route::delete('/order/{id}','ManagerController@deleteOrder')->name('deleteOrder');
   Route::put('/report/{id}','ManagerController@approve')->name('approve');
   Route::delete('/report/{id}','ManagerController@reject')->name('reject');
});

Route::get('/manager-home', 'HomeController@manager')->name('manager.home')->middleware('isManager');

//client
Route::middleware(['auth'])->prefix('leader')->name('leader.')->group(function () {
   Route::get('/report/create','LeaderController@createReport')->name('createReport');
   Route::post('/report','LeaderController@storeReport')->name('storeReport');

});

Route::get('/home', 'HomeController@index')->name('home');
