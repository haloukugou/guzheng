<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\User as UserModel;
use app\admin\model\AuthGroup as AuthGroupModel;
use think\Db;

class User extends Base{
    //添加 / 编辑信息
    public function edit($id=0){
		$lang = input('lang');
		
	    //判断用户组是否存在
	    $authGroupRs = Db::name('auth_group')->where('status',1)->select();
	    if(empty($authGroupRs)) $this->error(lang('c_add_first').lang('v_authgroup'));
		
	    if(!request()->isPost()){
		    //所属用户组
            $this->assign('authGroup',$authGroupRs);
		    //用户-用户组
            $this->assign('authGroupAccess',Db::name('auth_group_access')->where('uid',$id)->find());
            $this->assign('rs',UserModel::get($id));

            //会员组
		    $this->assign('grouplist',Db::name('auth_group')->select());
			
            return $this->fetch();
		}else{
			//表单验证
			if($id > 0){//编辑
				$checkResult = $this->validate(input('post.'),'user.edit');
			}else{
				$checkResult = $this->validate(input('post.'),'user');
			}
			if($checkResult !== true) $this->error($checkResult);

			$result = UserModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
		}
    }

    //用分页读取管理员
    public function index($keyword=""){
    	$signid = input('signid'); $lang = input('lang'); $group_id = input('group_id');
    	$keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
    	if(empty($signid)) $signid = 1;
		$rs = UserModel::index($lang,$group_id,$signid,$keyword,$order);

		//1正常9已删除，大于9就是删除时间戳
        $this->assign('signid',$signid);

		//会员组
		$this->assign('grouplist',Db::name('auth_group')->select());

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }

    //单个更新会员表的signid标记：1正常9软删除
    public function update_signid(){
        $id = input('id'); $signid = input('signid'); $lang = input('lang');
        //参数不能为空
        if(empty($id) or empty($signid) or empty($lang)) $this->error(lang('c_fail'));
        //软删除
        if($signid == 9) $signid = time();
        //更新会员表
        $result = Db::name('user')->where('id',$id)->setField('signid',$signid);
        //返回
        $this->success(lang('c_success'));
    }

    //批量更新会员表的signid标记：1正常9软删除
    public function updateall_signid(){
        $selectid=input('selectid/a'); $signid = input('signid');
        //参数错误
        if(empty($selectid) or empty($signid)) $this->error(lang('c_fail'));
        //软删除
        if($signid == 9) $signid = time();
        //批量更新数据
        Db::name('user')->where('id','in',$selectid)->setField('signid',$signid);
        $this->success(lang('c_success'));
    }
	
	//单条删除
    public function delete_one(){
		$id = input('id');
	    if($id==1) $this->error(lang('c_delete_cannot_admin'));
		
		$user = UserModel::get($id);
		if(config('deletefile') == 1){//删除对应的图片
		    $avatar = substr($user['avatar'],1);
            @unlink($avatar);
        }
        //删除数据
        $user->delete($id);
		
		//删除用户组的一一对应的关系
        Db::name('auth_group_access')->where('uid',$id)->delete($id);

		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		$isid = in_array("1",$selectid);
		if($isid) $this->error(lang('c_delete_cannot_admin'));

        $deletefile = config('deletefile');
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$user = UserModel::get($id);
			if($deletefile == 1){//删除对应的图片
			    $avatar = substr($user['avatar'],1);
                @unlink($avatar);
            }
            $deleteid[] = $id;
	    }

	    //执行删除
		Db::name('user')->delete($deleteid);
		//删除一一对应关系
        Db::name('auth_group_access')->where('uid','in',$deleteid)->delete();

		$this->success(lang('c_success'));
    }	
}