<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\cn\controller;
use app\common\model\Comment as commonModelComment;
use think\Db;

class Comment extends Base{
    //新增编辑
    public function edit(){
        //登录检测
        $memberController = controller("User");
        if(!session('?userid')) $memberController->checkLong();

        $id = trim(input('id'));
        if(!request()->isPost()){
            //评论信息
            $this->assign('commentRs',Db::name('comment')->where('id',$id)->find());

            return $this->fetch();
        }else{
            //表单验证
            $checkResult = $this->validate(input('post.'),'app\common\validate\Comment');
            if($checkResult !== true) $this->error($checkResult);

            //执行操作
            $commonModelComment = new commonModelComment;
            $result = commonModelComment::edit($id);
            if($result < 1) return $result->getError();
            $this->success(lang('c_success'));
        }
    }

    //我的评论
    public function mycomment(){
        //登录检测
        $memberController = controller("User");
        if(!session('?userid')) $memberController->checkLong();

        $commonModelComment = new commonModelComment;
        $rs = commonModelComment::mycomment(session('userid'),9,trim(input('keyword')));
        $this->assign('list',$rs);
        $this->assign('total',$rs->total());
        $this->assign('last_page',$rs->lastPage());
        
        return $this->fetch();
    }
}