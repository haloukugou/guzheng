<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Siteinfo as SiteinfoModel;
use think\Db;

class Siteinfo extends Base{
    //编辑信息
    public function index($id=0){
		$lang = input('lang');
		if(!request()->isPost()){
			$where['lang'] = $lang;
            $rs = Db::name('siteinfo')->where($where)->order('id desc')->find();
            $this->assign('rs',$rs);

            //前台注册会员默认会员组
            $groupWhere[] = ['id','>',1]; $groupWhere[] = ['lang','=',$lang];
            $this->assign('authgroupList',Db::name('auth_group')->where($groupWhere)->order('sequence desc')->select());

			return $this->fetch();
        }else{
        	if(empty(input('groupid'))) $this->error(lang('c_add_first').lang('v_authgroup'),url('auth_group/edit?lang='.$lang));
			$siteinfo = Db::name('siteinfo')->where('lang',$lang)->select();
			$action = !empty($siteinfo) ? 'edit' : 'add'; //判断是新增还是编辑
			$result = SiteinfoModel::edit($action,$lang);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}
}