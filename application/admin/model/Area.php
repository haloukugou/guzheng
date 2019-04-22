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

class Area extends Model{
    /**列表
    * @lang 语言
    * @keyword 关键词
    * @order 排序
    */
	static function index($lang,$keyword,$order){
		$keyword = trim($keyword);
		$where['lang'] = $lang;
		$rs = Db::name('area')->where($where)->where('title','like',"%$keyword%")->order($order)->select();
		if(empty($keyword)){
			$rs = getChildSort($rs);
		}else{//关键词搜索
			$temp = array();
	        foreach ($rs as $k => $v) {
			        $v['html'] = '';
			        $temp[] = $v;
	        }
			$rs = $temp;
		}
		return $rs;
	}
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$area = Area::get($id);
			$result = $area->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$area = new Area;
			$result = $area->allowField(true)->save(input('post.'));
		}
		return $area->id;
	}
}