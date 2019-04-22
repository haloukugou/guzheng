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

class Navigation extends Model{
    /**列表
    * @lang 语言
    * @keyword 关键词
    * @order 排序
    */
	static function index($lang,$keyword,$order){
		$keyword = trim($keyword);
		$where['lang'] = $lang;
		$rs = Db::name('navigation')->where($where)->where('title','like',"%$keyword%")->order($order)->select();
		$rs = getChildSort($rs);
		return $rs;
	}

    //客户端
    protected function setClientAttr(){
		$client = '';
		$client_array=input('client/a');
        for($i=0;$i<count($client_array);$i++){
			$i<count($client_array)-1 ? $client.=$client_array[$i]."," : $client.=$client_array[$i];
	    }
		return $client;
    }
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$navigation = Navigation::get($id);
			$result = $navigation->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$navigation = new Navigation;
			$result = $navigation->allowField(true)->save(input('post.'));
		}
		return $navigation->id;
	}
}