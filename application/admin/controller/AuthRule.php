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
use think\Db;

class AuthRule extends Base{
    //用分页读取数据
    public function index(){
        $lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = AuthRuleModel::index($lang,$keyword,$order);

		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		
        return $this->fetch();
    }

    //编辑信息
    public function edit($id=0){
        if(request()->isPost()){
			$result = AuthRuleModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }else{
            $rs = AuthRuleModel::get($id);
            $this->assign('rs',$rs);
			
            $this->assign("authRule",getChildSort(Db::name('auth_rule')->where('modulesign','web')->select()));
			
            return $this->fetch();
        }		
	}
	
	//单条删除
    public function delete_one($id){
        $id = input('id');
        //禁止删除含有子项的父项
        $hasChild = Db::name('auth_rule')->where('parentid',$id)->find();
        if(!empty($hasChild)) $this->error(lang('c_delete_sort_child_first'));
        //执行删除
        $result = Db::name('auth_rule')->delete($id);
        $result > 0 ? $this->success(lang('c_success')) : $this->error(lang('c_fail'));
   }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
            //禁止删除含有子项的父项
            $hasChild = Db::name('auth_rule')->where('parentid',$id)->find();
            if(!empty($hasChild)){
                $this->error(lang('c_delete_sort_child_first'));
                break;
            }
            $deleteid[] = $id;
	    }
        //执行删除
        Db::name('auth_rule')->delete($deleteid);

		$this->success(lang('c_success'));
    }	
}