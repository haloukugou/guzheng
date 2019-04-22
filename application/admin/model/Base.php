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

class Ad extends Model{
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
		$rs = Db::name('ad')->where($where)->where('title|description','like',"%$keyword%")->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}
    
    //位置
    protected function setPositionAttr(){
	    $position=implode(',',input('position/a'));
		return $position;
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
			$ad = Ad::get($id);
			$result = $ad->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$ad = new Ad;
			$result = $ad->allowField(true)->save(input('post.'));
		}
		return $ad->id;
	}
}