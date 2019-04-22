<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\model;
use think\Model;
use think\Db;

class Spec extends Model{
    /**列表
    * @tabledir 数据表
    * @lang 语言
    * @parentid 父级ID
    * @keyword 关键词
    * @order 排序
    */
	static function index($tabledir,$lang,$parentid=0,$keyword,$order){
		$tabledir = ucfirst(strtolower($tabledir));//强制小写/首字母大写
		$keyword = trim($keyword);
		$where[] = ['spec.lang','=',$lang];
		$where[] = ['spec.tabledir','=',$tabledir];
		$where[] = ['spec.parentid','=',$parentid];
		$pageParam['query']['tabledir'] = $tabledir;
		$pageParam['query']['lang'] = $lang;
		$pageParam['query']['parentid'] = $parentid;
		$pageParam['query']['keyword'] = $keyword;
		$rs = Db::view('spec','*')
            ->view('attribute',['title'=>'att_title'],'attribute.id=spec.attid')
            ->where($where)->where('spec.title','like',"%$keyword%")->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}

	//模块表名
    protected function setTabledirAttr(){
	    $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
		return $tabledir;
    }
    
    //新增编辑
	static function edit($id){
		$tabledir = input('tabledir'); $attid = input('attid'); $spec_sign = input('spec_sign'); $lang = input('lang');
		$sub_id = input('sub_id/a'); $title = input('sub_title/a'); $spec_value = input('sub_spec_value/a'); $sequence = input('sub_sequence/a');
		$specModel = new Spec;
	    if($id>0){//编辑
			$spec = Spec::get($id);
			$result = $spec->allowField(true)->save(input('post.'),['id'=>$id]);
			/*删除子规格 开始*/
			$data = $updateData = $deleteidArr = array();
			foreach (Db::name('spec')->where('parentid',$id)->select() as $key => $specRs) {
				if(!in_array($specRs['id'], $sub_id)){
                    $deleteidArr[] = $specRs['id'];
				}
			}
			if(!empty($deleteidArr)) Db::name('spec')->where('id','in',$deleteidArr)->delete();
			/*删除子规格 结束*/
			foreach($sub_id as $i => $sub){
				if(empty($sub_id[$i])){//新增子规格
                    $data[] = ['parentid'=>$spec->id,'tabledir'=>$tabledir,'attid'=>$attid,'spec_sign'=>$spec_sign,'title'=>$title[$i],'spec_value'=>$spec_value[$i],'sequence'=>$sequence[$i],'lang'=>$lang];
                }else{//更新子规格
                	$updateData[] = ['id'=>$sub_id[$i],'parentid'=>$spec->id,'tabledir'=>$tabledir,'attid'=>$attid,'spec_sign'=>$spec_sign,'title'=>$title[$i],'spec_value'=>$spec_value[$i],'sequence'=>$sequence[$i],'lang'=>$lang];
                }
                if(!empty($updateData)) $specModel->saveAll($updateData);
            }
		}else{//新增
			$spec = new Spec;
			$result = $spec->allowField(true)->save(input('post.'));
			/*新增子规格*/
		    foreach($sub_id as $i => $sub){
                $data[] = ['parentid'=>$spec->id,'tabledir'=>$tabledir,'attid'=>$attid,'spec_sign'=>$spec_sign,'title'=>$title[$i],'spec_value'=>$spec_value[$i],'sequence'=>$sequence[$i],'lang'=>$lang];
            }
		}
		if(!empty($data)) $specModel->saveAll($data);

		return $spec->id;
	}
}