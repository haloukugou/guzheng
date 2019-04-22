<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

//路由示例：后台module控制器用到
Route::group(['prefix' => 'cn/product/', 'ext' => 'html'], function () {
	Route::get('/cn/product$', 'sort');//模块封面页
    Route::get('/cn/<moduleurl?>-p-<page>$', 'index');//模块首页
    Route::get('/cn/<urlroute?>-p<sortid>-<page>$', 'index');//列表页
    Route::get('/cn/<urlroute?>-p<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//Route::get('admin/captcha/[:id]', "\\think\\captcha\\CaptchaController@index");//解决后台入口文件绑定模块时验证码无法验证的问题