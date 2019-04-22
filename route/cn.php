<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

//产品
Route::group(['prefix' => 'cn/product/', 'ext' => 'html'], function () {
    Route::get('/cn/shangpin$', 'sort');//模块封面页
    Route::get('/cn/<moduleurl?>-p-<page>$', 'index');//模块首页
    Route::get('/cn/<urlroute?>-p<sortid>-<page>$', 'index');//列表页
    Route::get('/cn/<urlroute?>-p<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//新闻
Route::group(['prefix' => 'cn/news/', 'ext' => 'html'], function () {
    Route::get('/cn/news$', 'sort');//模块封面页
    Route::get('/cn/<moduleurl?>-n-<page>$', 'index');//模块首页
    Route::get('/cn/<urlroute?>-n<sortid>-<page>$', 'index');//列表页
    Route::get('/cn/<urlroute?>-n<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//下载
Route::group(['prefix' => 'cn/down/', 'ext' => 'html'], function () {
    Route::get('/cn/down$', 'sort');//模块封面页
    Route::get('/cn/<moduleurl?>-d-<page>$', 'index');//模块首页
    Route::get('/cn/<urlroute?>-d<sortid>-<page>$', 'index');//列表页
    Route::get('/cn/<urlroute?>-d<id>$', 'view');//详情页
    Route::get('/cn/download-<id>$', 'download');//点击下载
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//案例
Route::group(['prefix' => 'cn/project/', 'ext' => 'html'], function () {
    Route::get('/cn/project$', 'sort');//模块封面页
    Route::get('/cn/<moduleurl?>-c-<page>$', 'index');//模块首页
    Route::get('/cn/<urlroute?>-c<sortid>-<page>$', 'index');//列表页
    Route::get('/cn/<urlroute?>-c<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//技术
Route::group(['prefix' => 'cn/jishu/', 'ext' => 'html'], function () {
    Route::get('/cn/jishu', 'sort');//模块封面页
    Route::get('/cn/<moduleurl?>-j-<page>$', 'index');//模块首页
    Route::get('/cn/<urlroute?>-j<sortid>-<page>$', 'index');//列表页
    Route::get('/cn/<urlroute?>-j<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);


//单页
Route::group(['prefix' => 'cn/about/', 'ext' => 'html'], function () {
    Route::get('/cn/about$', 'sort');//模块封面页
    Route::get('/cn/<moduleurl?>-a-<page>$', 'index');//模块首页
    Route::get('/cn/<urlroute?>-a<sortid>-<page>$', 'index');//列表页
    Route::get('/cn/<urlroute?>-a<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//Route::get('admin', '')