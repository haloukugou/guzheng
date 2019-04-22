<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Ad as AdModel;
use think\Db;

class Ad extends Base{
    //用分页读取数据
    public function index(){
    	$lang = input('lang'); $att_type = input('att_type'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
        if(empty($att_type)) $att_type = 'banner';
		$rs = AdModel::index($lang,$att_type,$keyword,$order);

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
    //编辑信息
    public function edit($id=0){
    	$lang = input('lang');
        if(!request()->isPost()){
            $rs = AdModel::get($id);
            $this->assign('rs',$rs);

            //广告属性
            $attributeWhere[] = ['tabledir','=','Ad']; $attributeWhere[] = ['lang','=',$lang];
            $this->assign('attribute',Db::name('attribute')->where($attributeWhere)->order('sequence desc')->select());

            //模块列表			
			$moduleWhere[] = ['lang','=',input('lang')]; $moduleWhere[] = ['disabled','=',1];
            $this->assign("moduleList",Db::name('Module')->where($moduleWhere)->order('sequence desc,id desc')->select());
			
            return $this->fetch();
        }else{
			$result = AdModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

	//查看图片
    public function view(){
    	$thumb = input('thumb');
    	$this->assign('thumb',$thumb);
    	
    	return view();
    }
	
	//单条删除
    public function delete_one(){
	    $id=input('id');
        $ad = AdModel::get($id);
        if(config('deletefile') == 1){//删除对应的图片
		    $thumb = substr($ad['thumb'],1);
            @unlink($thumb);
        }
        $ad->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));

		$deletefile = config('deletefile');
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$ad = AdModel::get($id);
			if($deletefile == 1){//删除对应的图片
			    $thumb = substr($ad['thumb'],1);
                @unlink($thumb);
            }
	    }

        //执行删除
        Db::name('ad')->delete($selectid);
		$this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
		$id = input('id/a'); $title = input('title/a'); $sequence = input('sequence/a');
        
		foreach($id as $i => $rs){
            $data[] = ['id'=>$id[$i],'title'=>$title[$i],'sequence'=>$sequence[$i]];
        }

        $ad = new AdModel;
		$ad->saveAll($data,true);
		$this->success(lang('c_success'));
    }	
}