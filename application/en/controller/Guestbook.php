<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\en\controller;
use app\common\model\Guestbook as commonModelGuestbook;
use think\Db;

class Guestbook extends Base{
    //我的留言
    public function myguestbook(){
        //登录检测
        $memberController = controller("User");
        if(!session('?userid')) $memberController->checkLong();

        $commonModelGuestbook = new commonModelGuestbook;
        $rs = commonModelGuestbook::myguestbook(session('userid'),0,9,trim(input('keyword')));
        $this->assign('list',$rs);
        $this->assign('total',$rs->total());
        $this->assign('last_page',$rs->lastPage());
        
        return $this->fetch();
    }

    //新增编辑
    public function edit($id=0){
        //登录检测
        $memberController = controller("User");
        if(!session('?userid')) $memberController->checkLong();

        if(!request()->isPost()){
            $gbData = Db::view('guestbook','*')->view('user',['avatar','username','nickname','realname'=>'user_realname'],'guestbook.userid=user.id');
            //回复列表
            $replyList = getChildSort($gbData->select(),$id);
            $this->assign('reply_list',$replyList);
            //留言信息
            $this->assign('rs',$gbData->where('guestbook.id',$id)->find());

            return $this->fetch();
        }else{
            //表单验证
            $checkResult = $this->validate(input('post.'),'app\common\validate\Guestbook');
            if($checkResult !== true) $this->error($checkResult);

            //执行操作
            $commonModelGuestbook = new commonModelGuestbook;
            $result = commonModelGuestbook::edit($id=0);//新增
            if($result < 1) return $result->getError();
            $this->success(lang('c_success'),url('guestbook/myguestbook'));
        }
    }
}