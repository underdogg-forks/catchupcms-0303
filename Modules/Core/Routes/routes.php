<?php

/*
 * This setting can be controlled from the admin panel.
 * In the interest of keeping this dynamic, don't directly overload it,
 * add a setting to your modules config file.
 * cms.MODULE.config.pxcms-index
 */


Route::group(['middleware' => 'web', 'prefix' => '', 'namespace' => 'Modules\Core\Http\Controllers'], function()
{
	Route::get('/', 'FrontendController@frontend');
});