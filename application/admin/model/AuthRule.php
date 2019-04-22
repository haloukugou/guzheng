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

class AuthRule extends Model{
    /**列表
    * @lang 语言
    * @keyword 关键词
    * @order 排序
    */
	static function index($lang,$keyword,$order){
		$keyword = trim($keyword);
		$where['modulesign'] = 'web';
		$pageParam['query']['lang'] = $lang;
		$rs = Db::name('AuthRule')->where($where)->where('title|name','like',"%$keyword%")->order($order)->select();
		if(empty($keyword)){
			$rs = getChildSort($rs);
		}else{//关键词搜索
			//下面这段竟然是为了数据表不存在的html字段赋值，待改进
			$temp = array();
	        foreach ($rs as $k => $v) {
			        $v['html'] = '';
			        $temp[] = $v;
	        }
			$rs = $temp;
		}
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
			$AuthRule = AuthRule::get($id);
			$result = $AuthRule->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$AuthRule = new AuthRule;
			$result = $AuthRule->allowField(true)->save(input('post.'));
		}
		return $AuthRule->id;
	}
}