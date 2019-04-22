<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\common\model;
use think\Model;
use think\Db;

class Comment extends Model{
	protected $auto = ['ip','anonymous','parentid','signid'];
    protected $insert = ['addtime','userid','tabledir','infoid','lang'];
	/**我的评论
    * @userid 用户ID
    * @signid 1通过2驳回3待审9已删除，大于9就是删除时间戳
    * @keyword 查询关键词
    */
	static function mycomment($userid,$signid=9,$keyword=''){
        $keyword = trim($keyword);
		$where[] = ['userid','=',$userid];
        if($signid > 8){//已软删除
            $where[] = ['signid','<','9'];
        }else{
            $where[] = ['signid','=',$signid];
        }
		$pageParam['query']['userid'] = $userid;
        $pageParam['query']['signid'] = $signid;
		$pageParam['query']['keyword'] = $keyword;
		$rs = Db::name('Comment')->where($where)->where('content','like',"%$keyword%")->order('addtime desc')->paginate(15,false,$pageParam);
		return $rs;
	}
    
    /**评论列表
    * @signid 1通过2驳回3待审9已删除，大于9就是删除时间戳
    * @tabledir 模块表
    * @parentid 评论父级ID
    * @infoid 信息ID
    * @userid 用户ID
    * @star 评分
    * @anonymous 1匿名0不匿名
    * @lang 语言
    * @keyword 查询关键词
    */
	static function index($signid='',$tabledir='',$parentid='',$infoid='',$userid='',$star='',$anonymous='',$lang='',$keyword=''){
		//强制小写/首字母大写
		$tabledir = ucfirst(strtolower($tabledir));
        if(!empty($signid)) $where[] = ['comment.signid','=',$signid];
        if(!empty($tabledir)) $where[] = ['comment.tabledir','=',$tabledir];
        $where[] = ['comment.parentid','=',$parentid];
        if(!empty($infoid)) $where[] = ['comment.infoid','=',$infoid];
        if(!empty($userid)) $where[] = ['comment.userid','=',$userid];
        if(!empty($star)) $where[] = ['comment.star','=',$star];
        if(!empty($anonymous)) $where[] = ['comment.anonymous','=',$anonymous];
        if(!empty($lang)) $where[] = ['comment.lang','=',$lang];
        //关键词
        if(!empty($keyword)) $where[] = ['comment.content','like',"%$keyword%"];
		
        //参数传递
        $pageParam['query']['signid'] = $signid;
        $pageParam['query']['tabledir'] = $tabledir;
        $pageParam['query']['parentid'] = $parentid;
        $pageParam['query']['infoid'] = $infoid;
        $pageParam['query']['userid'] = $userid;
        $pageParam['query']['star'] = $star;
        $pageParam['query']['anonymous'] = $anonymous;
        $pageParam['query']['lang'] = $lang;
        $pageParam['query']['keyword'] = $keyword;

		$rs = Db::view('comment','*')
            ->view('user',['avatar','username','nickname'],"comment.userid=user.id")
            ->where($where)->order('comment.addtime desc')->paginate(15,false,$pageParam);
		return $rs;
	}

    //状态
    protected function setSignidAttr(){
        $signid = input('signid');
        if(empty($signid)) $signid = 3;
        return $signid;
    }

	//添加日期
    protected function setAddtimeAttr(){
	    $addtime=strtotime(date('Y-m-d H:i:s'));
		return $addtime;
    }

    //IP
    protected function setIpAttr(){
		return request()->ip();
    }

    //是否匿名
    protected function setAnonymousAttr(){
		!empty(input('anonymous')) ? $anonymous = 1 : $anonymous = 0;
		return $anonymous;
    }

    //父级ID
    protected function setParentidAttr(){
        $parentid = trim(input('parentid'));
        if(empty($parentid)) $parentid = 0;
        return $parentid;
    }

	//用户ID
    protected function setUseridAttr(){
		return session('userid');
    }

    //信息ID，评论用
    protected function setInfoidAttr(){
        $infoid = input('infoid');
        $parentid = input('parentid');
        if($parentid>0){
            $commentRs = Db::name('comment')->where('id',$parentid)->find();
            $infoid = $commentRs['infoid'];
        }
        return $infoid;
    }

    //模块表，评论用
    protected function setTabledirAttr(){
    	$tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
        $parentid = input('parentid');
        if($parentid>0){
            $commentRs = Db::name('comment')->where('id',$parentid)->find();
            $tabledir = $commentRs['tabledir'];
        }
		return $tabledir;
    }

    //语言
    protected function setLangAttr(){
		return request()->module();
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