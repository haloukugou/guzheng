<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\cn\controller;
use think\Db;

class Common extends Base{
    //软删除
    public function update_signid(){
        //登录检测
        if(!session('?userid')) $this->redirect('user/login');
        $tabledir = input('tabledir'); $signid = input('signid'); $id = trim(input('id'));
        //软删除
        if($signid == 9) $signid = time();
        //更新模块表
        $result = Db::name($tabledir)->where('id',$id)->setField('signid',$signid);
        if($result < 1) return json(lang('c_fail'));
        return json(1);
    }
}