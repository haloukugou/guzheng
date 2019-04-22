<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

//产品
Route::group(['prefix' => 'en/product/', 'ext' => 'html'], function () {
    Route::get('/en/product$', 'sort');//模块封面页
    Route::get('/en/<moduleurl?>-p-<page>$', 'index');//模块首页
    Route::get('/en/<urlroute?>-p<sortid>-<page>$', 'index');//列表页
    Route::get('/en/<urlroute?>-p<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//新闻
Route::group(['prefix' => 'en/news/', 'ext' => 'html'], function () {
    Route::get('/en/news$', 'sort');//模块封面页
    Route::get('/en/<moduleurl?>-n-<page>$', 'index');//模块首页
    Route::get('/en/<urlroute?>-n<sortid>-<page>$', 'index');//列表页
    Route::get('/en/<urlroute?>-n<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//下载
Route::group(['prefix' => 'en/down/', 'ext' => 'html'], function () {
    Route::get('/en/down$', 'sort');//模块封面页
    Route::get('/en/<moduleurl?>-d-<page>$', 'index');//模块首页
    Route::get('/en/<urlroute?>-d<sortid>-<page>$', 'index');//列表页
    Route::get('/en/<urlroute?>-d<id>$', 'view');//详情页
    Route::get('/en/download-<id>$', 'download');//点击下载
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//案例
Route::group(['prefix' => 'en/project/', 'ext' => 'html'], function () {
    Route::get('/en/project$', 'sort');//模块封面页
    Route::get('/en/<moduleurl?>-c-<page>$', 'index');//模块首页
    Route::get('/en/<urlroute?>-c<sortid>-<page>$', 'index');//列表页
    Route::get('/en/<urlroute?>-c<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);

//单页
Route::group(['prefix' => 'en/about/', 'ext' => 'html'], function () {
    Route::get('/en/about$', 'sort');//模块封面页
    Route::get('/en/<moduleurl?>-a-<page>$', 'index');//模块首页
    Route::get('/en/<urlroute?>-a<sortid>-<page>$', 'index');//列表页
    Route::get('/en/<urlroute?>-a<id>$', 'view');//详情页
}, [], ['id' => '\d+', 'sortid' => '\d+', 'page' => '\d+', 'moduleurl' => '[A-Za-z]\w+', 'urlroute' => '[A-Za-z]\w+']);