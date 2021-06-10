<?php
use Illuminate\Support\Facades\Route;
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
Route::get('/', function () {
	return view('welcome');
});

Route::group(array('prefix' => 'administrator'), function () {
	Route::get('/dashboard', array('as' => 'admin.dashboard', 'uses' => 'App\Http\Controllers\Admin\HomeController@showHome'));
	Route::get('/logout', array('as' => 'admin.logout', 'uses' => 'App\Http\Controllers\Admin\AdminAuthController@getLogout'));
	Route::get('/', array('as' => 'admin.signin', 'uses' => 'App\Http\Controllers\Admin\AdminAuthController@getSignin'));
	Route::post('admin/signin', array('as' => 'admin.signin', 'uses' => 'App\Http\Controllers\Admin\AdminAuthController@postSignin'));

	Route::get('/sub-admin-or-agent', array('as' => 'admin.subadmin', 'uses' => 'App\Http\Controllers\Admin\UserController@subadmin_register'));
	Route::post('/sub-admin-or-agent', array('as' => 'admin.post-subadmin', 'uses' => 'App\Http\Controllers\Admin\UserController@subadmin_register_post'));

	Route::get('/all-subadmin', array('as' => 'admin.all-subadmin', 'uses' => 'App\Http\Controllers\Admin\UserController@subadmin'));
	Route::get('/sub-admin/data', array('as' => 'admin.subadmin.data', 'uses' => 'App\Http\Controllers\Admin\UserController@data'));

	Route::get('/all-agent', array('as' => 'admin.all-agent', 'uses' => 'App\Http\Controllers\Admin\UserController@agent'));
	Route::get('/agent/data', array('as' => 'admin.agent-all.data', 'uses' => 'App\Http\Controllers\Admin\UserController@agent_data'));

});

Route::group(array('prefix' => 'subadmin'), function () {
	Route::get('/ticket', array('as' => 'admin.ticket', 'uses' => 'App\Http\Controllers\Admin\TicketController@create_ticket'));
	Route::post('/ticket-create', array('as' => 'admin.post-ticket', 'uses' => 'App\Http\Controllers\Admin\TicketController@subadmin_create_post'));

	Route::get('/genrate-report', array('as' => 'admin.genrate-report', 'uses' => 'App\Http\Controllers\Admin\TicketController@genrate_report'));
	Route::post('/genrate-report-post', array('as' => 'admin.genrate-report-post', 'uses' => 'App\Http\Controllers\Admin\TicketController@get_report'));

});
Route::group(array('prefix' => 'agent'), function () {
	Route::get('/all-tickets', array('as' => 'admin.all-tickets', 'uses' => 'App\Http\Controllers\Admin\TicketController@all_tickets'));
	Route::get('/ticket/data', array('as' => 'admin.agent.data', 'uses' => 'App\Http\Controllers\Admin\TicketController@data'));
	Route::get('/ticket/{id}', array('as' => 'admin.agent.ticket-status', 'uses' => 'App\Http\Controllers\Admin\TicketController@reply'));
	Route::post('/genrate-report-post', array('as' => 'admin.ticket-post', 'uses' => 'App\Http\Controllers\Admin\TicketController@reply_confirm'));

});