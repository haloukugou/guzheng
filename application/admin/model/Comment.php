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

class Comment extends Model{
    /**列表
    * @tabledir 模块表
    * @signid 1通过2驳回3待审9已删除，大于9就是删除时间戳
    * @lang 语言
    * @keyword 关键词
    * @order 排序
    */
	static function index($tabledir,$signid,$lang,$keyword,$order){
		if($signid > 8){//已软删除
			$where[] = ['comment.signid','>','8'];
		}else{
			$where[] = ['comment.signid','=',$signid];
		}
		$where[] = ['comment.lang','=',$lang];
		if(!empty($tabledir)) $where[] = ['comment.tabledir','=',$tabledir];
		$pageParam['query']['tabledir'] = $tabledir;
		$pageParam['query']['signid'] = $signid;
		$pageParam['query']['lang'] = $lang;
		$pageParam['query']['keyword'] = $keyword;
		if(!empty($tabledir)){
			$rs = Db::view('comment','*')
                ->view($tabledir,['title'=>'m_title'],"$tabledir.id=comment.infoid")
                ->view('user',['avatar','nickname'],"$tabledir.userid=user.id")
                ->where($where)->where("comment.content|$tabledir.title|user.nickname",'like',"%$keyword%")->order($order)
                ->paginate(20,false,$pageParam);
		}else{
			$rs = Db::view('comment','*')
                ->view('user',['avatar','nickname'],"comment.userid=user.id")
                ->where($where)->where("comment.content|user.nickname",'like',"%$keyword%")->order($order)
                ->paginate(20,false,$pageParam);
		}
		return $rs;
	}
	
	//日期
    protected function setAddtimeAttr(){
	    $addtime=strtotime(input('addtime'));
		return $addtime;
    }
    
    //新增编辑
	static function edit($id){
	    if($id>0){//编辑
			$comment = Comment::get($id);
			$result = $comment->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$comment = new Comment;
			$result = $comment->allowField(true)->save(input('post.'));
		}
		return $comment->id;
	}
}