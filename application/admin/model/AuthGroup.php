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

class AuthGroup extends Model{
    /**列表
    * @lang 语言
    * @order 排序
    */
	static function index($lang,$order){
		$where['lang'] = $lang;
		$pageParam['query']['lang'] = $lang;
		$rs = Db::name('AuthGroup')->where($where)->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}
	
	//权限值
    protected function setRulesAttr(){
	    $rules=implode(',',input('rules/a'));
		return $rules;
    }
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$AuthGroup = AuthGroup::get($id);
			$result = $AuthGroup->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$AuthGroup = new AuthGroup;
			$result = $AuthGroup->allowField(true)->save(input('post.'));
		}
		return $AuthGroup->id;
	}
}