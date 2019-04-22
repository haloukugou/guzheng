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

class Attribute extends Model{
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
		$attvalue = ucfirst(strtolower(input('tabledir')));
		$where[] = ['lang','=',$lang];
		$where[] = ['tabledir','=',$tabledir];
		$where[] = ['parentid','=',$parentid];
		$pageParam['query']['tabledir'] = $tabledir;
		$pageParam['query']['lang'] = $lang;
		$pageParam['query']['parentid'] = $parentid;
		$pageParam['query']['keyword'] = $keyword;
		if($tabledir == 'Spec'){
			$where[] = ['attvalue','=',$attvalue];
			$pageParam['query']['attvalue'] = $attvalue;
		}
		$rs = Db::name('attribute')->where($where)->where('title','like',"%$keyword%")->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}

	//模块表名
    protected function setTabledirAttr(){
	    $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
	    if(input('moduletable') == 'Spec') $tabledir = 'Spec';
		return $tabledir;
    }
    
    //模块表属性的新增编辑
	static function edit($id){
		$tabledir = input('tabledir'); $fieldtype = input('fieldtype/a'); $lang = input('lang');
		$sub_id = input('sub_id/a'); $title = input('sub_title/a'); $attvalue = input('sub_attvalue/a'); $sequence = input('sub_sequence/a');
		$attributeModel = new Attribute;
		$data = $updateData = $deleteidArr = array();
	    if($id>0){//编辑
	    	$attribute = Attribute::get($id);
			$result = $attribute->allowField(true)->save(input('post.'),['id'=>$id]);
			/*删除子属性 开始*/
			foreach (Db::name('attribute')->where('parentid',$id)->select() as $key => $attributeRs) {
				if(!in_array($attributeRs['id'], $sub_id)){
                    $deleteidArr[] = $attributeRs['id'];
				}
			}
			if(!empty($deleteidArr)) Db::name('attribute')->where('id','in',$deleteidArr)->delete();
			/*删除子属性 结束*/
			foreach($sub_id as $i => $sub){
				if(empty($sub_id[$i])){//新增子属性
                    $data[] = ['title'=>$title[$i],'attvalue'=>$attvalue[$i],'tabledir'=>$tabledir,'parentid'=>$attribute->id,'fieldtype'=>$fieldtype[$i],'sequence'=>$sequence[$i],'lang'=>$lang];
                }else{//更新子属性
                	$updateData[] = ['id'=>$sub_id[$i],'title'=>$title[$i],'attvalue'=>$attvalue[$i],'tabledir'=>$tabledir,'parentid'=>$attribute->id,'fieldtype'=>$fieldtype[$i],'sequence'=>$sequence[$i],'lang'=>$lang];
                }
                if(!empty($updateData)) $attributeModel->saveAll($updateData);
            }
		}else{//新增
            $attribute = new Attribute;
			$result = $attribute->allowField(true)->save(input('post.'));
			/*新增子属性*/
		    foreach($sub_id as $i => $sub){
                $data[] = ['title'=>$title[$i],'attvalue'=>$attvalue[$i],'tabledir'=>$tabledir,'parentid'=>$attribute->id,'fieldtype'=>$fieldtype[$i],'sequence'=>$sequence[$i],'lang'=>$lang];
            }
		}
		if(!empty($data)) $attributeModel->saveAll($data);

		return $attribute->id;
	}

	//其他表属性的新增编辑
	static function globaledit($id){
		if($id>0){//编辑
			$attribute = Attribute::get($id);
			$result = $attribute->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$attribute = new Attribute;
			$result = $attribute->allowField(true)->save(input('post.'));
		}
		return $attribute->id;
	}
}