<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Spec as SpecModel;
use think\Db;

class Spec extends Base{
    //用分页读取数据
    public function index(){
    	$tabledir = input('tabledir'); $lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = SpecModel::index($tabledir,$lang,0,$keyword,$order);

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
    //编辑信息
    public function edit($id=0){
    	$lang = input('lang'); $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
        if(!request()->isPost()){
            $rs = SpecModel::get($id);
            $this->assign('rs',$rs);

            //规格属性
            $attWhere[] = ['tabledir','=','Spec']; $attWhere[] = ['parentid','=',0]; $attWhere[] = ['lang','=',$lang]; $attWhere[] = ['attvalue','=',$tabledir];
            $spec_type = Db::name('attribute')->where($attWhere)->order('sequence desc,id desc')->select();
            //请先添加规格属性
            if(empty($spec_type)) $this->error(lang('c_add_first').lang('v_spec').lang('v_attribute'),url('attribute/edit?tabledir='.$tabledir.'&lang='.$lang.'&moduletable=Spec'));
            $this->assign('spec_type',$spec_type);

            //子规格
            $sub_spec = array();
            if($id > 0) $sub_spec = Db::name('spec')->where('parentid',$id)->order('sequence desc,id desc')->select();
            $this->assign('sub_spec',$sub_spec);
            $this->assign('more_num',count($sub_spec));

            return $this->fetch();
        }else{
        	//表单验证
			$checkResult = $this->validate(input('post.'),'spec');
			if($checkResult !== true) $this->error($checkResult);

			$result = SpecModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}
	
	//单条删除
    public function delete_one(){
	    $id=input('id');
        $spec = SpecModel::get($id);
        //删除子规格
        Db::name('spec')->where('parentid',$id)->delete();
        //执行删除
        $spec->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
        //删除子规格
        Db::name('spec')->where('parentid','in',$selectid)->delete();

		Db::name('spec')->delete($selectid);
		$this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a'); $title = input('title/a'); $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data[] = ['id'=>$id[$i],'title'=>$title[$i],'sequence'=>$sequence[$i]];
        }

        $spec = new SpecModel;
		$spec->saveAll($data,true);
		$this->success(lang('c_success'));
    }
}