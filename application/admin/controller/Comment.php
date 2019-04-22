<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Comment as CommentModel;
use think\Db;

class Comment extends Base{
    //用分页读取数据
    public function index(){
    	$signid = input('signid'); $lang = input('lang'); $keyword = trim(input('keyword')); $tabledir = strtolower(input('tabledir'));//强制小写
    	$order = ['comment.sequence'=>'desc','comment.addtime'=>'desc'];
    	if(!is_numeric($signid)) $signid = 3;

		$rs = CommentModel::index($tabledir,$signid,$lang,$keyword,$order);
		
		//赋值搜索模块列表
		$this->assign('modulelist',Db::name('module')->where('lang',$lang)->order('sequence desc,id desc')->select());
		//赋值当前评论模块
		$mod_title = '';
		$moduleWhere[] = ['tabledir','=',$tabledir];
		$moduleWhere[] = ['lang','=',$lang];
		$moduleRs = Db::name('module')->where($moduleWhere)->find();
		$this->assign('mod_title',$moduleRs['title']);
		//赋值评论状态
		$this->assign('signid',$signid);

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
    //编辑
    public function edit($id=0){
    	$id = input('id'); $lang = input('lang'); $signid = input('signid');
        if(!request()->isPost()){
        	$rs = Db::name('comment')->where('id',$id)->find();
        	//评论信息
        	$this->assign('rs',$rs);
            //模块信息
            $this->assign('mod_rs',Db::name($rs['tabledir'])->where('id',$rs['infoid'])->find());
            //用户
            $userRs = Db::name('user')->where('id',$rs['userid'])->find();
			$this->assign('userRs',$userRs);

            return view();
        }else{
			$result = CommentModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'),url('comment/index?lang='.$lang.'&signid='.$signid));
        }		
	}

	//回复
    public function reply($id=0){
    	$id = input('id'); $lang = input('lang'); $signid = input('signid');
        if(!request()->isPost()){
        	$rs = Db::name('comment')->where('id',$id)->find();
        	//评论信息
        	$this->assign('rs',$rs);
            //模块信息
            $this->assign('mod_rs',Db::name($rs['tabledir'])->where('id',$rs['infoid'])->find());
            //用户
            $userRs = Db::name('user')->where('id',$rs['userid'])->find();
			$this->assign('userRs',$userRs);
			//回复列表
			$replylist = Db::view('comment','*')->view('user',['avatar','nickname'],'user.id=comment.userid')->where('comment.parentid',$id)->select();
			$this->assign('replylist',$replylist);

            return view();
        }else{
			$result = CommentModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'),url('comment/index?lang='.$lang.'&signid='.$signid));
        }		
	}

	//单个删除
    public function delete_one(){
    	$id = input('id'); $lang = input('lang');
        //参数不能为空
        if(empty($id) or empty($lang)) $this->error(lang('c_fail'));
        //删除子信息
        Db::name('comment')->where('parentid',$id)->delete();
        //执行删除
        Db::name('comment')->where('id',$id)->delete();
        //返回
        $this->success(lang('c_success'));
    }

	//单个更新状态
    public function update_signid(){
    	$id = input('id'); $signid = input('signid'); $lang = input('lang');
        //参数不能为空
        if(empty($id) or empty($signid) or empty($lang)) $this->error(lang('c_fail'));
        //软删除
        if($signid == 9) $signid = time();
        //更新模块表
        $result = Db::name('comment')->where('id',$id)->setField('signid',$signid);
        //返回
        $this->success(lang('c_success'));
    }

    //批量更新状态
    public function updateall_signid(){
        $selectid=input('selectid/a'); $signid = input('signid'); $lang = input('lang');
        //参数错误
        if(empty($selectid) or empty($signid) or empty($lang)) $this->error(lang('c_fail'));
        //软删除
        if($signid == 9) $signid = time();
        //批量更新数据
        Db::name('comment')->where('id','in',$selectid)->setField('signid',$signid);
        $this->success(lang('c_success'));
    }

    //批量删除
    public function delete_all(){
        $selectid = input('selectid/a');
        //参数错误
        if(empty($selectid)) $this->error(lang('c_do_check'));
        //删除子信息
        Db::name('comment')->where('parentid','in',$selectid)->delete();
        //执行删除
        Db::name('comment')->delete($selectid);
        $this->success(lang('c_success'));
    }
}