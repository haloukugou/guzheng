<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

use think\Db;

/**单条删除数据，如：删除产品，新闻等，产品等模块的控制器用到
* @table 表
* @id 信息ID
* @lang 语言
*/
function ModuleDeleteOne($table,$id,$lang){
	$table = strtolower($table);//强制小写
	$tabledir = ucfirst(strtolower($table));//强制小写/首字母大写

    $rs = Db::name($table)->where('id',$id)->find();
    //删除对应的图片和文件
    $moduleWhere['tabledir'] = $tabledir; $moduleWhere['lang'] = $lang;
    $moduleRs = Db::name('module')->where($moduleWhere)->find();
    $isdisplayArr = explode(',', $moduleRs['isdisplay']);
    if(in_array('deletefile', $isdisplayArr)){
        //删除图片
        $thumb = substr($rs['thumb'],1);
        @unlink($thumb);
        //删除附件
        $fileurl = substr($rs['fileurl'],1);
        @unlink($fileurl);
        //删除更多图片
        if(!empty($rs['morepics'])){
            $morepicsArr = explode('|', $rs['morepics']);
            foreach ($morepicsArr as $key => $pic) {
                $pic = substr($pic,1);
                @unlink($pic);
            }
        }
        //删除更多附件
        if(!empty($rs['morefileurl'])){
            $morefileurlArr = explode('|', $rs['morefileurl']);
            foreach ($morefileurlArr as $key => $file) {
                $file = substr($file,1);
                @unlink($file);
            }
        }
    }
    //删除数据
    $result = Db::name($table)->delete($id);
	return $result;
}

/**批量删除数据，如：删除产品，新闻等，产品等模块的控制器用到
* @table 表
* @selectid 勾选的ID
* @lang 语言
*/
function ModuleDeleteAll($table,$selectid,$lang){
	$table = strtolower($table);//强制小写
	$tabledir = ucfirst(strtolower($table));//强制小写/首字母大写

    //删除数据的同时是否删除对应的图片和文件
    $moduleWhere['tabledir'] = $tabledir; $moduleWhere['lang'] = $lang;
    $moduleRs = Db::name('module')->where($moduleWhere)->find();
    $isdisplayArr = explode(',', $moduleRs['isdisplay']);

	foreach($selectid as $i => $rs){
		$id=$selectid[$i];
		$rs = Db::name($table)->where('id',$id)->find();
		//删除对应的图片和文件
		if(in_array('deletefile', $isdisplayArr)){
		    //删除图片
		    $thumb = substr($rs['thumb'],1);
		    @unlink($thumb);
		    //删除附件
		    $fileurl = substr($rs['fileurl'],1);
		    @unlink($fileurl);
		    //删除更多图片
		    if(!empty($rs['morepics'])){
		        $morepicsArr = explode('|', $rs['morepics']);
		        foreach ($morepicsArr as $key => $pic) {
		            $pic = substr($pic,1);
		            @unlink($pic);
		        }
		    }
		    //删除更多附件
		    if(!empty($rs['morefileurl'])){
		        $morefileurlArr = explode('|', $rs['morefileurl']);
		        foreach ($morefileurlArr as $key => $file) {
		            $file = substr($file,1);
		            @unlink($file);
		        }
		    }
		}
		
	}
	//删除数据
    $result = Db::name($table)->delete($selectid);
	return $result;
}

//通用无限分类数组（父级->子级），如：地区
function getAreaArr($table,$id=0,$lang){
    $where['parentid']=$id;
    $where['lang']=$lang;
	$tableArr = Db::name($table)->field('title,id')->where($where)->select();
    $arr = array(); 
    foreach ($tableArr as $k => $rs) {
        $rs[] = getAreaArr($table,$rs['id'],$lang);
        $arr[] = $rs; //组合数组
    } 
    return $arr;
} 

//判断是否备份了数据库
function ifDataBackup(){
    $dataPath = config('app.dataconfig.path');
    $dofile = new \common\Dofile();
    $dataFileArr = $dofile->getFiles($dataPath,false);
    if(!empty($dataFileArr)){
        foreach ($dataFileArr as $dataRs) {
            if(strstr($dataRs,'-') != false){//找到了-
                $dataRsArr = explode('-',$dataRs);
                $backupDate = $dataRsArr[0];
                if($backupDate == date('Ymd')){
                    return true;
                    break;
                }
            }
        }
    }
    return false;
}

/*编辑规格 开始*/
function edit_sku($tabledir,$id){
    /*商品信息 开始
    * @descartes 笛卡尔乘积
    */
    $attid = input('attid'); $specimgs = input('sku_specimg/a'); $prices = input('sku_price/a'); $marketprices = input('sku_marketprice/a');
    $costprices = input('sku_costprice/a'); $stocks = input('sku_stock/a'); $codes = input('sku_code/a'); $sku_ids = input('sku_ids/a');
    $sku_names = input('sku_names/a');
    $sku_pic_arr = $sku_json = array();
    if(!empty($stocks)){
        foreach($sku_ids as $k => $v){
            $v_arr = explode('_',$v);
            if(count($v_arr)>1){
                $descartes = 1;
                foreach ($v_arr as $v_key => $aaa) {
                    $descartes = $descartes*$aaa;
                }
            }else{
                $descartes = $v_arr[0];
            }
            $sku_json[$k]['id'] = $v;
            $sku_json[$k]['descartes'] = $descartes;
            $sku_json[$k]['specimg'] = $specimgs[$k];
            $sku_json[$k]['price'] = $prices[$k];
            $sku_json[$k]['marketprice'] = $marketprices[$k];
            $sku_json[$k]['costprice'] = $costprices[$k];
            $sku_json[$k]['stock'] = $stocks[$k];
            $sku_json[$k]['code'] = $codes[$k];
            $sku_json[$k]['title'] = $sku_names[$k];
        }
    }
    $data['sku_json'] = json_encode($sku_json);
    /*商品信息 结束*/
    $data['sku_default'] = input('sku_default');
    
    if($id > 0){
        Db::name($tabledir)->where('id',$id)->update($data);
    }
}
/*编辑规格 结束*/

/*规格显示 开始*/
function getSkuNameInput($id,$ids_names,$name_default){
    $title = "";
    foreach($ids_names as $v){
        if($v['id'] == $id){
            $title = $v['title'];
            break;
        }
    }
    if($title !='' && $title != $name_default){
        $title = $name_default."<span style='color:gray'>(".$title.")</span>";
    }else{
        $title = $title?$title:$name_default;
    }
    return $title;
}
function getEqual($a, $b, $rs, $fuhao = 'eq') {
    if ($fuhao > 0) {
        if ($a % $fuhao == $b) {
            return $rs;
        }
    } else {
        if ($fuhao == 'eq') {
            if ($a == $b) {
                return $rs;
            }
        } elseif ($fuhao == 'gt') {
            if ($a > $b) {
                return $rs;
            }
        } elseif ($fuhao == 'lt') {
            if ($a < $b) {
                return $rs;
            }
        } elseif ($fuhao == 'in') {
            $arr = explode(",", $b);
            if (in_array($a, $arr)) {
                return $rs;
            }
        }elseif ($fuhao == 'neq') {
            
            if ($a != $b) {
                return $rs;
            }
        }
    }
}
function getNoEqual($a,$b,$rs){
    if($a != $b && $b != ''){
        return $rs;
    }
}
function stripColorTags($content){
    $content = strip_tags($content);
    $content = str_replace("(", "", $content);
    $content = str_replace(")", "", $content);
    return $content;
}
/*规格显示 结束*/