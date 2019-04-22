<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Sort as SortModel;
use app\admin\model\Product as ProductModel;
use app\admin\model\News as NewsModel;
use app\admin\model\About as AboutModel;
use app\admin\model\Project as ProjectModel;
use app\admin\model\Down as DownModel;
use think\Db;
use think\facade\Env;

class Sort extends Base{
    //用分页读取数据
    public function index(){
    	$tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
	    if(empty($tabledir)) $this->error(lang('c_error_parameter'));//所属模块不存在

	    $lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = SortModel::index($tabledir,$lang,$keyword,$order);
		
		$this->assign('list',$rs);
		$this->assign('total',count($rs));
		$this->assign('tabledir',$tabledir);
		
        return $this->fetch();
    }

    //编辑信息
    public function edit($id=0){
		$lang = input('lang'); $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
	    if(empty($tabledir)) $this->error(lang('c_error_parameter'));//所属模块不存在

        if(!request()->isPost()){
            $rs = SortModel::get($id);
            $this->assign('rs',$rs);
			
			$where['lang'] = $lang; $where['tabledir'] = $tabledir;
            $this->assign('sort',getChildSort(Db::name('sort')->where($where)->select()));
			$this->assign('tabledir',$tabledir);
			
			//路由标识
			$moduleWhere['lang'] = $lang; $moduleWhere['tabledir'] = $tabledir;
    	    $moduleRs = Db::name('module')->where($moduleWhere)->find();
		    $this->assign('routesign',$moduleRs['routesign']);

			//前端列表页模板
            $suffix = config('template.view_suffix');
            $templatePath = Env::get('root_path').'template/'.config('app.home_use_template').'/'.$lang.'/pc/'.strtolower($tabledir).'/';
            $dofile = new \common\Dofile();
            $templateList = $dofile->getFiles($templatePath,false,$suffix);
            $this->assign('listtemp',$templateList);
            $this->assign('defaulttemp',"index");

			return $this->fetch();
        }else{
			//表单验证
			$checkResult = $this->validate(input('post.'),'Sort');
			if($checkResult !== true) $this->error($checkResult);
            //路由标识不能为空
			if(empty(input('routesign'))) $this->error(lang('c_fail'));

			$result = SortModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}
	
	//单条删除
    public function delete_one(){
		$id = input('id'); $lang = input('lang');
		$tabledir = strtolower(input('tabledir'));//强制小写
		//参数不能为空
		if(empty($tabledir) or empty($id) or empty($lang)) $this->error(lang('c_fail'));

		//含有模块禁止删除的分类
        $nodeletesortidArr = explode(',', $this->navModuleRs['no_delete_sortid']);
        if(in_array($id, $nodeletesortidArr)) $this->error(lang('c_nodelete_sortid_error'));
		//禁止删除含有子项的父项
        $hasChild = Db::name('sort')->where('parentid',$id)->find();
        if(!empty($hasChild)) $this->error(lang('c_delete_sort_child_first'));
        //禁止删除含有该分类的信息
        $hasInfo = Db::name($tabledir)->where('sortid',$id)->find();
        if(!empty($hasInfo)) $this->error(lang('c_delete_sort_info_first'));

        $result = Db::name('sort')->delete($id);
		if($result > 0){
			$this->success(lang('c_success'));
		}else{
			$this->error(lang('c_fail'));
		}
    }
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a'); $lang = input('lang');
		$tabledir = strtolower(input('tabledir'));//强制小写
		if(empty($selectid) or empty($tabledir)) $this->error(lang('c_delete_check'));
		//含有模块禁止删除的信息
        $nodeletesortidArr = explode(',', $this->navModuleRs['no_delete_sortid']);
        foreach ($selectid as $infoid) {
            if(in_array($infoid, $nodeletesortidArr)) $this->error(lang('c_nodelete_sortid_error'));
            break;
        }
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
		    //禁止删除含有子项的父项
            $hasChild = Db::name('sort')->where('parentid',$id)->find();
            if(!empty($hasChild)){
                $this->error(lang('c_delete_sort_child_first'));
                break;
            }
            //禁止删除含有该分类的信息
            $hasInfo = Db::name($tabledir)->where('sortid',$id)->find();
            if(!empty($hasInfo)){
            	$this->error(lang('c_delete_sort_info_first'));
            	break;
            }

		    $deleteid[] = $id;
	    }

	    //执行删除
		Db::name('sort')->delete($deleteid);
		$this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a'); $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data[] = ['id'=>$id[$i],'sequence'=>$sequence[$i]];
        }

        $sort = new SortModel;
		$sort->saveAll($data,true);
		$this->success(lang('c_success'));
    }	
}