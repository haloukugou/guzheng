<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Attribute as AttributeModel;
use think\Db;

class Attribute extends Base{
    //用分页读取数据
    public function index(){
    	$tabledir = input('tabledir'); $lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
        $template = $moduleTitle = '';

        if(input('moduletable') == 'Spec'){
            $template = 'spec_index';
            $moduleTitle = lang('v_spec');
            $rs = AttributeModel::index('Spec',$lang,0,$keyword,$order);
        }else{
            $rs = AttributeModel::index($tabledir,$lang,0,$keyword,$order);
        }

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());

        //所属表
        $tableArr = array('Ad','Chat','Guestbook','Navigation');
        if(in_array($tabledir,$tableArr)){
            $template = 'global_index';
            $langSign = 'v_'.strtolower($tabledir);
            $moduleTitle = lang($langSign);
        }
        $this->assign('module_title',$moduleTitle);
		
        return $this->fetch($template);
    }
	
    //编辑信息
    public function edit($id=0){
    	$lang = input('lang'); $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写

        //所属表
        $template = $moduleTitle = '';
        $tableArr = array('Ad','Chat','Guestbook','Navigation','Spec');
        if(in_array($tabledir,$tableArr)){
            $template = 'global_edit';
            $langSign = 'v_'.strtolower($tabledir);
            $moduleTitle = lang($langSign);
        }
        if(input('moduletable') == 'Spec'){
            $template = 'spec_edit';
            $moduleTitle = lang('v_spec');
        }
        $this->assign('module_title',$moduleTitle);

        if(!request()->isPost()){
            $rs = AttributeModel::get($id);
            $this->assign('rs',$rs);

            if(!in_array($tabledir,$tableArr) and input('moduletable') != 'Spec'){//模块表
                //子属性
                $sub_attribute = array();
                if($id > 0) $sub_attribute = Db::name('attribute')->where('parentid',$id)->order('sequence desc,id desc')->select();
                $this->assign('sub_attribute',$sub_attribute);
                $this->assign('more_num',count($sub_attribute));
            }
            
            return $this->fetch($template);
        }else{
            //表单验证
            $checkResult = $this->validate(input('post.'),'attribute');
            if($checkResult !== true) $this->error($checkResult);

            if(!in_array($tabledir,$tableArr) and input('moduletable') != 'Spec'){//模块表
                $result = AttributeModel::edit($id);
            }else{//其他表
                $result = AttributeModel::globaledit($id);
            }
			
			if($result < 1) return $result->getError();
            if(input('moduletable') != 'Spec'){
                $url = url('attribute/index?tabledir='.$tabledir.'&lang='.$lang);
            }else{
                $url = url('attribute/index?tabledir='.$tabledir.'&lang='.$lang.'&moduletable=Spec');
            }
			$this->success(lang('c_success'),$url);
        }		
	}
	
	//单条删除
    public function delete_one(){
	    $id=input('id');
        $attribute = AttributeModel::get($id);
        //删除子规格
        Db::name('attribute')->where('parentid',$id)->delete();
        //执行删除
        $attribute->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
        //删除子规格
        Db::name('attribute')->where('parentid','in',$selectid)->delete();

		Db::name('attribute')->delete($selectid);
		$this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a'); $title = input('title/a'); $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data[] = ['id'=>$id[$i],'title'=>$title[$i],'sequence'=>$sequence[$i]];
        }

        $attribute = new AttributeModel;
		$attribute->saveAll($data,true);
		$this->success(lang('c_success'));
    }

    //ajax属性
    public function getattr(){
        $id = input('id'); $lang = input('lang'); $attributeid = input('attributeid');
        $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写;

        //属性列表
        $list = array();
        if(!empty($attributeid) and $attributeid != 0){
            $attWhere[] = ['tabledir','=',$tabledir]; $attWhere[] = ['parentid','=',$attributeid]; $attWhere[] = ['lang','=',$lang];
            $list = Db::name('attribute')->where($attWhere)->order('sequence desc,id desc')->select();
        }
        $this->assign("list", $list);

        //模块属性值
        $rs_attvalue = array();
        $rs = Db::name($tabledir)->where('id',$id)->find();
        if(!empty($rs) and !empty($rs['attvalue'])) $rs_attvalue = json_decode($rs['attvalue'],true);
        $rs_attvalue = array_column($rs_attvalue,'attvalue');
        $this->assign("rs_attvalue",$rs_attvalue);
        //print_r($rs_attvalue);die;

        return view();
    }
}