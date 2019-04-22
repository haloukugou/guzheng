<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Chat as ChatModel;
use think\Db;

class Chat extends Base{
    //编辑信息
    public function edit($id=0){
    	$lang = input('lang');
        if(!request()->isPost()){
            $rs = ChatModel::get($id);
            $this->assign('rs',$rs);

            //客服属性
            $attributeWhere[] = ['tabledir','=','Chat']; $attributeWhere[] = ['lang','=',$lang];
            $this->assign('attribute',Db::name('attribute')->where($attributeWhere)->order('sequence desc')->select());

			return $this->fetch();
        }else{
			$result = ChatModel::edit($id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

    //用分页读取数据
    public function index(){
    	$lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = ChatModel::index($lang,$keyword,$order);
		
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//单条删除
    public function delete_one(){
        $chat = ChatModel::get(input('id'));
        $chat->delete();
		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
	    ChatModel::destroy($selectid);
		$this->success(lang('c_success'));
    }	

	//批量更新
    public function update_all(){
		$id = input('id/a'); $sequence = input('sequence/a'); $title = input('title/a'); $account = input('account/a');
        
		foreach($id as $i => $rs){
            $data[] = ['id'=>$id[$i],'sequence'=>$sequence[$i],'title'=>$title[$i],'account'=>$account[$i]];
        }
        $chat = new ChatModel;
		$chat->saveAll($data,true);
		$this->success(lang('c_success'));
    }	
}