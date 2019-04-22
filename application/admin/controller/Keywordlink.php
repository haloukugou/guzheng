<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Keywordlink as KeywordlinkModel;
use think\Db;

class Keywordlink extends Base{
    //用分页读取数据
    public function index(){
    	$lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = KeywordlinkModel::index($lang,$keyword,$order);
		
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
    //编辑信息
    public function edit($id=0){
        if(!request()->isPost()){
            $rs = Db::name('keywordlink')->where('id',$id)->find();
            $this->assign('rs',$rs);
			return $this->fetch();
        }else{
			//表单验证
			$checkResult = $this->validate(input('post.'),'Keywordlink');
			if($checkResult !== true) $this->error($checkResult);
				
			$result = KeywordlinkModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}
	
	//单条删除
    public function delete_one(){
        $keywordlink = KeywordlinkModel::get(input('id'));
        $keywordlink->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
	    KeywordlinkModel::destroy($selectid);
		$this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a'); $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data[] = ['id'=>$id[$i],'sequence'=>$sequence[$i]];
        }

        $keywordlink = new KeywordlinkModel;
		$keywordlink->saveAll($data,true);
		$this->success(lang('c_success'));
    }	
}