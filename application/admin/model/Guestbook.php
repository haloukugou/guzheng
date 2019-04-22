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

class Guestbook extends Model{
	protected $insert = ['userid','addtime','lang','parentid'];

	//语言
    protected function setLangAttr(){
        return input('lang');
    }

    //父级ID
    protected function setParentidAttr(){
        $parentid = input('parentid');
        if(empty(input('parentid'))) $parentid = 0;
        return $parentid;
    }

    //日期
    protected function setAddtimeAttr(){
        $addtime=strtotime(input('addtime'));
		return $addtime;
    }

    //用户ID
    protected function setUseridAttr(){
        return session('userid');
    }

    /**列表
    * @signid 1已回复2处理中3待回复4已查看5已评价9已删除，大于9就是删除时间戳
    * @parentid 父级ID
    * @lang 语言
    * @keyword 关键词
    * @order 排序
    */
	static function index($signid,$parentid='',$lang,$keyword,$order){
		if($signid > 8){//已软删除
			$where[] = ['signid','>','8'];
		}else{
			$where[] = ['signid','=',$signid];
		}
        $where[] = ['parentid','=',$parentid];
		$keyword = trim($keyword);
		$pageParam['query']['signid'] = $signid;
		$pageParam['query']['parentid'] = $parentid;
		$pageParam['query']['lang'] = $lang;
		$pageParam['query']['keyword'] = $keyword;
		$rs = Db::name('guestbook')->where($where)->where('title|content|realname','like',"%$keyword%")->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}
	
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$guestbook = Guestbook::get($id);
			$result = $guestbook->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$guestbook = new Guestbook;
			$result = $guestbook->allowField(true)->save(input('post.'));
			//如果是回复，则更新原留言状态为1已回复
            if(!empty(input('parentid'))){
                Db::name('guestbook')->where('id',input('parentid'))->setField('signid',1);
            }
		}
		return $guestbook->id;
	}
}