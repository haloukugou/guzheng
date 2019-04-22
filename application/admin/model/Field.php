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

class Field extends Model{
    /**列表
    * @lang 语言
    * @keyword 关键词
    * @order 排序
    */
	static function index($lang,$keyword,$order){
		$keyword = trim($keyword);
		$where['lang'] = $lang;
		$pageParam['query']['lang'] = $lang;
		$pageParam['query']['keyword'] = $keyword;
		$rs = Db::name('field')->where($where)->where('fieldlabel|fieldtext|fieldvalue','like',"%$keyword%")->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$field = Field::get($id);
			$result = $field->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$field = new Field;
			$result = $field->allowField(true)->save(input('post.'));
		}
		return $field->id;
	}
}