<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Area as AreaModel;
use app\admin\model\Product as ProductModel;
use app\admin\model\News as NewsModel;
use app\admin\model\About as AboutModel;
use app\admin\model\Project as ProjectModel;
use app\admin\model\Down as DownModel;
use think\Db;

class Area extends Base{
    //用分页读取数据
    public function index(){
        $lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = AreaModel::index($lang,$keyword,$order);
		
		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		
        return $this->fetch();
    }

    //编辑信息
    public function edit($id=0){
        if(!request()->isPost()){
            $rs = AreaModel::get($id);
            $this->assign('rs',$rs);
			
			$where['lang'] = input('lang');
            $this->assign('Area',getChildSort(Db::name('area')->where($where)->select()));

            return $this->fetch();
        }else{
			$result = AreaModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}
	
	//单条删除
    public function delete_one(){
		$id = input('id'); $lang = input('lang');
        //禁止删除默认地区
        if(in_array($id, array('1','2'))) $this->error(lang('c_fail'));
        //禁止删除含有子项的父项
        $hasChild = Db::name('area')->where('parentid',$id)->find();
        if(!empty($hasChild)) $this->error(lang('c_delete_sort_child_first'));
        //执行删除
        $result = Db::name('area')->delete($id);
        $result > 0 ? $this->success(lang('c_success')) : $this->error(lang('c_fail'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a'); $lang = input('lang');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
            //禁止删除默认地区
            if(in_array($id, array('1','2'))){
                $this->error(lang('c_fail'));
                break;
            }
            //禁止删除含有子项的父项
            $hasChild = Db::name('area')->where('parentid',$id)->find();
            if(!empty($hasChild)){
                $this->error(lang('c_delete_sort_child_first'));
                break;
            }
            $deleteid[] = $id;
	    }

        //执行删除
        Db::name('area')->delete($deleteid);
		$this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a'); $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data[] = ['id'=>$id[$i],'sequence'=>$sequence[$i]];
        }

        $area = new AreaModel;
        $area->saveAll($data,true);
		$this->success(lang('c_success'));
    }	
}