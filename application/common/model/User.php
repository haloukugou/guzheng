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

class User extends Model{
	protected $insert = ['nickname'];

	//添加日期
    protected function setNicknameAttr(){
	    $nickname=trim(input('username'));
		return $nickname;
    }

	//添加日期
    protected function setAddtimeAttr(){
	    $addtime=strtotime(date('Y-m-d H:i:s'));
		return $addtime;
    }

    //修改日期
    protected function setEdittimeAttr(){
	    $edittime=strtotime(date('Y-m-d H:i:s'));
		return $edittime;
    }

	//密码
    protected function setPasswordAttr(){
		$password = input("password");
		return md5($password);
    }

    //IP
    protected function setIpAttr(){
		return request()->ip();
    }
	
    //新增编辑
	static function edit($lang,$id){
	    if($id>0){//编辑
			$user = User::get($id);
			$result = $user->allowField(true)->save(input('post.'),['id'=>$id]);
			//更新auth_group_access表
		}else{//新增
			//会员注册默认会员组
		    $siteRs = Db::name('siteinfo')->whereNotNull('groupid')->where('lang',$lang)->find();
		    if(empty($siteRs)) $this->error(lang('c_fail'));
		    //执行操作
			$user = new User;
			$result = $user->allowField(true)->save(input('post.'));
		    //添加auth_group_access表
			Db::name('auth_group_access')->insert(['group_id'=>$siteRs['groupid'],'uid'=>$user->id]);
		}
		return $user->id;
	}

	//修改密码
	static function password($id){
		$user = User::get($id);
        $user->allowField(true)->save(input('post.'),['id'=>$id]);
        return $user->id;
	}
}