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

class Project extends Model{
    protected $auto = ['attvalue'];
    
	//路由标识
    protected function setRoutesignAttr(){
    	$moduleWhere[] = ['lang','=',input('lang')]; $moduleWhere[] = ['tabledir','=',ucfirst(strtolower(input('tabledir')))];
    	$moduleRs = Db::name('module')->where($moduleWhere)->find();
		return $moduleRs['routesign'];
    }

    //路由URL前缀
    protected function setUrlrouteAttr(){
        $urlroute = strtolower(trim(input('urlroute')));
        if(!preg_match('/^[a-z]+$/',$urlroute)){
            $moduleWhere[] = ['lang','=',input('lang')]; $moduleWhere[] = ['tabledir','=',ucfirst(strtolower(input('tabledir')))];
            $moduleRs = Db::name('module')->where($moduleWhere)->find();
            $urlroute = $moduleRs['urlroute'];
        }
        if($urlroute == 'undefined') $urlroute = 'view';
        return $urlroute;
    }
    
    //标签
    protected function setTagsAttr(){
        $tags_array=input('tags/a');
        $tags = '';
        for($i=0;$i<count($tags_array);$i++){
            $i<count($tags_array)-1 ? $tags.=$tags_array[$i].PHP_EOL : $tags.=$tags_array[$i];
        }
        return $tags;
    }

    //客户端
    protected function setClientAttr(){
		$client = '';
		$client_array=input('client/a');
        for($i=0;$i<count($client_array);$i++){
			$i<count($client_array)-1 ? $client.=$client_array[$i]."," : $client.=$client_array[$i];
	    }
		return $client;
    }
	
	//日期
    protected function setAddtimeAttr(){
	    $addtime=strtotime(input('addtime'));
		return $addtime;
    }
	
	//更多图片
    protected function setMorepicsAttr(){
		$morepics = '';
		$morepics_array=input('morepics/a');
        for($i=0;$i<count($morepics_array);$i++){
		    $i<count($morepics_array)-1 ? $morepics.=$morepics_array[$i]."|" : $morepics.=$morepics_array[$i];
	    }
		return $morepics;
    }

    //更多附件
    protected function setMorefileurlAttr(){
		$morefileurl = '';
		$morefileurl_array=input('morefileurl/a');
        for($i=0;$i<count($morefileurl_array);$i++){
		    $i<count($morefileurl_array)-1 ? $morefileurl.=$morefileurl_array[$i]."|" : $morefileurl.=$morefileurl_array[$i];
	    }
		return $morefileurl;
    }

    //属性值
    protected function setAttvalueAttr(){
        $attvalue_json = array();
        $att_num = input('att_num');
        for($i=0;$i<$att_num+1;$i++){
            $postAttValue = input("attvalue".$i."/a");
            if(!empty($postAttValue)){
                $fieldtype = input("att_fieldtype".$i);
                $attvalue_json[$i]['title'] = input("att_title".$i);
                $attvalue_json[$i]['attvalue'] = '';
                for($j=0;$j<count($postAttValue);$j++){
                    if($fieldtype == 'checkbox'){
                        if($j != count($postAttValue)-1){
                            $attvalue_json[$i]['attvalue'] .= $postAttValue[$j].'|';
                        }else{
                            $attvalue_json[$i]['attvalue'] .= $postAttValue[$j];
                        }
                    }else{
                        $attvalue_json[$i]['attvalue'] = $postAttValue[$j];
                    }
                }
            }
        }
        return json_encode($attvalue_json);
    }
    
    /**新增编辑
    * @table 表
    * @id 信息ID
    */
	static function edit($table,$id){
	    if($id>0){//编辑
			$moduleTable = Project::get($id);
			$result = $moduleTable->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$moduleTable = new Project;
			$result = $moduleTable->allowField(true)->save(input('post.'));
		}
        //编辑规格
        edit_sku($table,$moduleTable->id);
		
		//返回控制器
		return $moduleTable->id;
	}
}