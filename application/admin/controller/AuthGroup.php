<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\AuthRule as AuthRuleModel;
use app\admin\model\AuthGroup as AuthGroupModel;
use app\admin\model\AuthGroupAccess as AuthGroupAccessModel;
use think\Db;

class AuthGroup extends Base{
    //编辑信息
    public function edit($id=0){
		$lang = input('lang');
		$authRuleRs = Db::name('auth_rule')->select();
		if(empty($authRuleRs)) $this->error(lang('c_add_first').lang('v_auth'),url('AuthRule/edit?lang='.$lang));
		
        if(!request()->isPost()){
            $rs = AuthGroupModel::get($id);
            $this->assign('rs',$rs);
			
			//权限组（部门级别）
            $authgroupData = getChildSort(Db::name('auth_group')->select());
            $this->assign("authGroup",$authgroupData);
			
            return $this->fetch();
        }else{
			$result = AuthGroupModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

    //用分页读取数据
    public function index(){
    	$lang = input('lang'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = AuthGroupModel::index($lang,$order);

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//单条删除
    public function delete_one(){
	    $id=input('id');

	    //不能删除默认会员组
	    if($id < 4) $this->error(lang('c_delete_cannot_authgroup'));
		
		//有会员属于该用户组，请先变更会员的用户组
		$authGroupAccessRs = Db::name('auth_group_access')->where('group_id',$id)->find();
		if(!empty($authGroupAccessRs)) $this->error(lang('c_change_authgroup_first'));
		
        $AuthGroup = AuthGroupModel::get($id);
        $AuthGroup->delete();
		
		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));//请选择要删除的数据

		$isid = in_array("1",$selectid);
		if($isid) $this->error(lang('c_delete_cannot_authgroup'));//不可删除创始会员组
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
		    
		    //不能删除默认会员组
	        if($id < 4) $this->error(lang('c_delete_cannot_authgroup'));

		    //有会员属于该用户组，请先变更会员的用户组
		    $authGroupAccessRs = Db::name('auth_group_access')->where('group_id',$id)->find();
		    if(!empty($authGroupAccessRs)) $this->error(lang('c_change_authgroup_first'));

            $deleteid[] = $id;
	    }
	    //执行删除
		Db::name('auth_group')->delete($deleteid);

		$this->success(lang('c_success'));
    }	

	//更新启用
    public function update_status(){
        $data['id'] =input('id');
        $data['status'] = input('value');
        AuthGroupModel::update($data);

		$this->success(lang('c_success'));
	}

	//ajax获取权限值
    public function getrule(){
    	$id = input('id'); $lang = input('lang');
    	//权限列表
    	$auth = new \common\Auth(); $auth->check('','');
        $authruleWhere['parentid'] = 0;
	    $authruleWhere['modulesign'] = 'web';
	    $authrule_arr = Db::name('auth_rule')->where($authruleWhere)->order('sequence desc,id desc')->select();

	    //当前权限
	    $authgroupRs = Db::name('auth_group')->where('id',$id)->find();
	    $rules_array=explode(',',$authgroupRs['rules']);

	    $this->assign("rules_array", $rules_array);
    	$this->assign("authrule_arr", $authrule_arr);

        return view();
	}
}