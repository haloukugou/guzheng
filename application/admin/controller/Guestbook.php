<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Guestbook as GuestbookModel;
use think\Db;

class Guestbook extends Base{
    //编辑信息
    public function edit($id=0){
        if(!request()->isPost()){
            $rs = GuestbookModel::get($id);
            $this->assign('rs',$rs);
            //用户
            $userRs = Db::name('user')->where('id',$rs['userid'])->find();
            $this->assign('userRs',$userRs);

            return view();
        }else{
			$result = GuestbookModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

    //用分页读取数据
    public function index(){
    	$signid = input('signid'); $lang = input('lang'); $keyword = input('keyword');
    	$order = ['sequence'=>'desc','id'=>'desc'];
    	if(!is_numeric($signid)) $signid = 3;

        //赋值留言状态
        $this->assign('signid',$signid);
    	
		$rs = GuestbookModel::index($signid,0,$lang,$keyword,$order);

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }

    //回复
    public function reply($id=0){
        $id = input('id'); $lang = input('lang'); $signid = input('signid');
        if(!request()->isPost()){
            $rs = Db::name('guestbook')->where('id',$id)->find();
            //留言信息
            $this->assign('rs',$rs);
            //用户
            $userRs = Db::name('user')->where('id',$rs['userid'])->find();
            $this->assign('userRs',$userRs);
            //回复列表
            $replylist = Db::view('guestbook','*')->view('user',['avatar','nickname'],'user.id=guestbook.userid')->where('guestbook.parentid',$id)->select();
            $this->assign('replylist',$replylist);

            return view();
        }else{
            $result = GuestbookModel::edit($id);
            if($result < 1) return $result->getError();
            $this->success(lang('c_success'),url('guestbook/index?lang='.$lang.'&signid='.$signid));
        }       
    }

    //单个更新状态
    public function update_signid(){
        $id = input('id'); $signid = input('signid'); $lang = input('lang');
        //参数不能为空
        if(empty($id) or empty($signid) or empty($lang)) $this->error(lang('c_fail'));
        //软删除
        if($signid == 9) $signid = time();
        //更新模块表
        $result = Db::name('guestbook')->where('id',$id)->setField('signid',$signid);
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
        Db::name('guestbook')->where('id','in',$selectid)->setField('signid',$signid);
        $this->success(lang('c_success'));
    }
	
	//单条删除
    public function delete_one(){
	    $id=input('id'); $lang = input('lang');
        //参数不能为空
        if(empty($id) or empty($lang)) $this->error(lang('c_fail'));
        //删除子信息
        Db::name('guestbook')->where('parentid',$id)->delete();
        //执行删除
        $guestbook = GuestbookModel::get($id);
        $guestbook->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
        //参数错误
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		//删除子信息
        Db::name('guestbook')->where('parentid','in',$selectid)->delete();
        //执行删除
	    GuestbookModel::destroy($selectid);
		$this->success(lang('c_success'));
    }	
}