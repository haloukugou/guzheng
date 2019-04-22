<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Navigation as NavigationModel;
use think\Db;

class Navigation extends Base{
    //用分页读取数据
    public function index(){
        $lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = NavigationModel::index($lang,$keyword,$order);
		
		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		
        return $this->fetch();
    }

    //编辑信息
    public function edit($id=0){
			$lang = input('lang');
        if(!request()->isPost()){
            $rs = NavigationModel::get($id);
            $this->assign('rs',$rs);
            $this->assign("Navigation",getChildSort(Db::name('navigation')->where('lang',$lang)->select()));

            //导航属性
            $attributeWhere[] = ['tabledir','=','Navigation']; $attributeWhere[] = ['lang','=',$lang];
            $this->assign('attribute',Db::name('attribute')->where($attributeWhere)->order('sequence desc')->select());

            //模块列表          
            $moduleWhere[] = ['lang','=',input('lang')]; $moduleWhere[] = ['disabled','=',1]; $moduleWhere[] = ['tabledir','=','Product'];
            $this->assign("moduleList",Db::name('Module')->where($moduleWhere)->order('sequence desc,id desc')->select());
			
			return $this->fetch();
        }else{
			$result = NavigationModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'),url('navigation/index?lang='.$lang));
        }		
	}
	
	//单条删除
    public function delete_one(){
		$id = input('id');
        //禁止删除含有子项的父项
        $hasChild = Db::name('navigation')->where('parentid',$id)->find();
        if(!empty($hasChild)) $this->error(lang('c_delete_sort_child_first'));
        //执行删除
        $result = Db::name('navigation')->delete($id);
        $result > 0 ? $this->success(lang('c_success')) : $this->error(lang('c_fail'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
        for($i=0;$i<count($selectid);$i++){
		    $id=$selectid[$i];
            //禁止删除含有子项的父项
            $hasChild = Db::name('navigation')->where('parentid',$id)->find();
            if(!empty($hasChild)){
                $this->error(lang('c_delete_sort_child_first'));
                break;
            }
            $deleteid[] = $id;
	    }

        //执行删除
        Db::name('navigation')->delete($deleteid);
        $this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a'); $sequence = input('sequence/a');

		foreach($id as $i => $rs){
            $data[] = ['id'=>$id[$i],'sequence'=>$sequence[$i]];
        }

        $navigation = new NavigationModel;
        $navigation->saveAll($data,true);
		$this->success(lang('c_success'));
    }	
}