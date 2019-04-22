<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Field as FieldModel;
use think\Db;

class Field extends Base{
    //编辑信息
    public function edit($id=0){
		if(!request()->isPost()){
            $rs = FieldModel::get($id);
            $this->assign('rs',$rs);
			return $this->fetch();
        }else{
			//表单验证
			$checkResult = $this->validate(input('post.'),'Field');
			if($checkResult !== true) $this->error($checkResult);
			
			$lang = input('lang'); $fieldlabel = input('fieldlabel');
			$fieldNum = FieldModel::where(['lang'=>$lang,'fieldlabel'=>$fieldlabel])->count();
			if(($fieldNum>1 and $id>0) or ($fieldNum>0 and $id<1)) $this->error(lang('y_condition_fieldlabel'));
				
			$result = FieldModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

    //用分页读取数据
    public function index(){
    	$lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = FieldModel::index($lang,$keyword,$order);
		
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//单条删除
    public function delete_one(){
	    $id=input('id');
        $fieldRs = FieldModel::get($id);

        //含有禁止删除的信息
        $nodeleteidArr = explode(',', config('no_delete_fieldid'));
        if(in_array($id, $nodeleteidArr)) $this->error(lang('c_nodeleteid_error'));

        //删除对应的图片
        if(config('deletefile') == 1 and ($fieldRs['fieldtype'] == 'thumb' or $fieldRs['fieldtype'] == 'file')){
		    $thumb = substr($fieldRs['fieldvalue'],1);
            @unlink($thumb);
        }
        $fieldRs->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));

		//含有模块禁止删除的信息
        $nodeleteidArr = explode(',', config('no_delete_fieldid'));
        foreach ($selectid as $infoid) {
            if(in_array($infoid, $nodeleteidArr)) $this->error(lang('c_nodeleteid_error'));
            break;
        }
		
		$deletefile = config('deletefile');
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$fieldRs = FieldModel::get($id);
			//删除对应的图片
            if($deletefile == 1 and ($fieldRs['fieldtype'] == 'thumb' or $fieldRs['fieldtype'] == 'file')){
		        $thumb = substr($fieldRs['fieldvalue'],1);
                @unlink($thumb);
            }
	    }

	    //执行删除
		Db::name('field')->delete($selectid);
		$this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a'); $fieldtext = input('fieldtext/a'); $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data[] = ['id'=>$id[$i],'fieldtext'=>$fieldtext[$i],'sequence'=>$sequence[$i]];
        }

        $field = new FieldModel;
		$field->saveAll($data,true);
		$this->success(lang('c_success'));
    }	
}