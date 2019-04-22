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

class Sort extends Model{
    /**列表
    * @tabledir 模块目录
    * @lang 语言
    * @keyword 关键词
    * @order 排序
    */
	static function index($tabledir,$lang,$keyword,$order){
		$tabledir = ucfirst(strtolower($tabledir));//强制小写/首字母大写
		$keyword = trim($keyword);
		$where['lang'] = $lang;
		$where['tabledir'] = $tabledir;
		$rs = Db::name('sort')->where($where)->where('title|seotitle|keyword|description','like',"%$keyword%")->order($order)->select();
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

	//目录
    protected function setTabledirAttr(){
	    $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
		return $tabledir;
    }
    
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$sort = Sort::get($id);
			$result = $sort->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$sort = new Sort;
			$result = $sort->allowField(true)->save(input('post.'));
		}
		return $sort->id;
	}
}