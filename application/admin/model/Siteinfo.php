<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\model;
use think\Model;
use think\Db;

class Siteinfo extends Model{
    /**新增编辑
    * @action 新增编辑标识
    * @lang 语言
    */
	static function edit($action,$lang){
	    if($action == 'edit'){//编辑
			$siteinfo =Siteinfo::get(['lang' => $lang]);
			$id = $siteinfo['id'];
			$result = $siteinfo->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$siteinfo = new Siteinfo;
			$result = $siteinfo->allowField(true)->save(input('post.'));
		}
		return $siteinfo->id;
	}
}