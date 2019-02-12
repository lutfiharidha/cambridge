<?php
Route::get('/', 'BerandaController@beranda')->name('beranda');
Route::get('/announcement', 'BerandaController@announcement')->name('announcement');
Route::get('/galleries', 'BerandaController@galleries')->name('galleries');
Route::get('/blog', 'BerandaController@index')->name('blog');
Route::get('/order/{id}/{name}/', 'BerandaController@actionorder')->name('order.action');
Route::post('/successorder', 'BerandaController@order')->name('order.store');
Route::get('/blog/{id}/{created_at}/{title}/', 'BerandaController@action')->name('blog.action');

Auth::routes();
Route::get('change-password', 'Auth\ResetPasswordController@index')->name('password.form');
Route::post('change-password', 'Auth\ResetPasswordController@update')->name('password.update');

Route::get('/home', function () {
    if(Auth::user()->hasRole('admin')){return redirect('/admin');}
        elseif(Auth::user()->hasRole('teacher')){return redirect('/teacher');}
        elseif(Auth::user()->hasRole('student')){return redirect('/student');}
        else{return redirect('/');}
    });

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/orders', 'AdminController@order')->name('data.orders');

    Route::get('/admin/teachers', 'AdminController@indexteacher')->name('data.teacher');
    Route::get('/admin/r/teacher', 'AdminController@createteacher')->name('add.teacher');
    Route::post('/admin/r/teacher', 'AdminController@storeteacher')->name('storeteacher');
    Route::get('/admin/teacher/{id}', 'AdminController@editteacher')->name('edit.teacher');
	Route::patch('/admin/teacher/{id}', 'AdminController@updateteacher')->name('update.teacher');
    Route::delete('/admin/delete/teacher/{user}', 'AdminController@teacherdestroy')->name('teacher.destroy');

    Route::get('/admin/students', 'AdminController@indexstudent')->name('data.student');
    Route::get('/admin/r/student', 'AdminController@createstudent')->name('add.student');
    Route::post('/admin/r/student', 'AdminController@storestudent')->name('storestudent');
    Route::get('/admin/student/{id}', 'AdminController@editstudent')->name('edit.student');
	Route::patch('/admin/student/{id}', 'AdminController@updatestudent')->name('update.student');
    Route::delete('/admin/delete/student/{user}', 'AdminController@studentdestroy')->name('student.destroy');

    Route::get('/admin/package', 'AdminController@indexpackage')->name('data.package');
    Route::get('/admin/r/package', 'AdminController@createpackage')->name('add.package');
    Route::post('/admin/r/package', 'AdminController@storepackage')->name('storepackage');
    Route::get('/admin/package/{id}', 'AdminController@editpackage')->name('edit.package');
    Route::patch('/admin/package/{id}', 'AdminController@updatepackage')->name('update.package');
    Route::delete('/admin/delete/package/{package}', 'AdminController@packagedestroy')->name('package.destroy');

    Route::get('/admin/stories', 'AdminController@indexstories')->name('data.stories');
    Route::get('/admin/r/stories', 'AdminController@createstories')->name('add.stories');
    Route::post('/admin/r/stories', 'AdminController@storestories')->name('storestories');
    Route::get('/admin/stories/{id}', 'AdminController@editstories')->name('edit.stories');
    Route::patch('/admin/stories/{id}', 'AdminController@updatestories')->name('update.stories');
    Route::delete('/admin/delete/stories/{storie}', 'AdminController@storiesdestroy')->name('stories.destroy');

    Route::get('/admin/blog', 'AdminController@indexblog')->name('data.blog');
    Route::get('/admin/r/blog', 'AdminController@createblog')->name('add.blog');
    Route::post('/admin/r/blog', 'AdminController@storeblog')->name('storeblog');
    Route::get('/admin/blog/{id}', 'AdminController@editblog')->name('edit.blog');
    Route::patch('/admin/blog/{id}', 'AdminController@updateblog')->name('update.blog');
    Route::delete('/admin/delete/blog/{blog}', 'AdminController@blogdestroy')->name('blog.destroy');

    Route::get('/admin/announce', 'AdminController@indexannounce')->name('data.announce');
    Route::get('/admin/r/announce', 'AdminController@createannounce')->name('add.announce');
    Route::post('/admin/r/announce', 'AdminController@storeannounce')->name('storeannounce');
    Route::get('/admin/announce/{id}', 'AdminController@editannounce')->name('edit.announce');
    Route::patch('/admin/announce/{id}', 'AdminController@updateannounce')->name('update.announce');
    Route::delete('/admin/delete/announce/{announce}', 'AdminController@announcedestroy')->name('announce.destroy');

    Route::get('/admin/gallery', 'AdminController@indexgallery')->name('data.gallery');
    Route::get('/admin/r/gallery', 'AdminController@creategallery')->name('add.gallery');
    Route::post('/admin/r/gallery', 'AdminController@storegallery')->name('storegallery');
    Route::get('/admin/gallery/{id}', 'AdminController@editgallery')->name('edit.gallery');
    Route::patch('/admin/gallery/{id}', 'AdminController@updategallery')->name('update.gallery');
    Route::delete('/admin/delete/gallery/{gallery}', 'AdminController@gallerydestroy')->name('gallery.destroy');

    Route::get('/admin/class', 'AdminController@indexclass')->name('data.class');
    Route::get('/admin/r/class', 'AdminController@createclass')->name('add.class');
    Route::post('/admin/r/class', 'AdminController@storeclass')->name('storeclass');
    Route::get('/admin/class/{id}', 'AdminController@editclass')->name('edit.class');
    Route::patch('/admin/class/{id}', 'AdminController@updateclass')->name('update.class');
    Route::delete('/admin/delete/class/{class}', 'AdminController@classdestroy')->name('class.destroy');

    Route::get('/admin/module', 'AdminController@indexmodule')->name('datamin.module');
    Route::delete('/admin/delete/module/{module}', 'AdminController@moduledestroy')->name('module.destroymin');
    Route::get('/admin/article', 'AdminController@indexarticle')->name('datamin.article');
    Route::delete('/admin/delete/article/{article}', 'AdminController@articledestroy')->name('article.destroymin');
});

Route::group(['middleware' => ['auth', 'role:teacher']], function () {
    Route::get('/teacher', 'TeacherController@index')->name('teacher');

    Route::get('/teacher/blog', 'TeacherController@indexblog')->name('te.blog');
    Route::get('/teacher/r/blog', 'TeacherController@createblog')->name('addte.blog');
    Route::post('/teacher/r/blog', 'TeacherController@storeblog')->name('storete.blog');
    Route::get('/teacher/blog/{id}', 'TeacherController@editblog')->name('editte.blog');
    Route::patch('/teacher/blog/{id}', 'TeacherController@updateblog')->name('updatete.blog');
    Route::delete('/teacher/delete/blog/{blog}', 'TeacherController@blogdestroy')->name('blog.destroyte');

    Route::get('/teacher/module', 'TeacherController@indexmodule')->name('data.module');
    Route::get('/teacher/r/module', 'TeacherController@createmodule')->name('add.module');
    Route::post('/teacher/r/module', 'TeacherController@storemodule')->name('storemodule');
    Route::get('/teacher/module/{id}', 'TeacherController@editmodule')->name('edit.module');
    Route::patch('/teacher/module/{id}', 'TeacherController@updatemodule')->name('update.module');
    Route::delete('/teacher/delete/module/{module}', 'TeacherController@moduledestroy')->name('module.destroy');

    Route::get('/teacher/article', 'TeacherController@indexarticle')->name('data.article');
    Route::get('/teacher/r/article', 'TeacherController@createarticle')->name('add.article');
    Route::post('/teacher/r/article', 'TeacherController@storearticle')->name('storearticle');
    Route::get('/teacher/article/{id}', 'TeacherController@editarticle')->name('edit.article');
    Route::patch('/teacher/article/{id}', 'TeacherController@updatearticle')->name('update.article');
    Route::delete('/teacher/delete/article/{article}', 'TeacherController@articledestroy')->name('article.destroy');
});

Route::group(['middleware' => ['auth', 'role:student']], function () {
    Route::get('/student', 'StudentController@index')->name('student');

    Route::get('/student/article', 'StudentController@indexarticle')->name('article');
    Route::get('/student/article/{id}/{created_at}/{title}/', 'StudentController@action')->name('article.action');

    Route::get('/student/module', 'StudentController@indexmodule')->name('module');
});