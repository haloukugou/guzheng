<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

/**截取中文字符串
 * 模板调用：{$rs.title|msubstr=0,10}
*/
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
    if(function_exists("mb_substr")){
        $slice= mb_substr($str, $start, $length, $charset);
    }elseif(function_exists('iconv_substr')) {
        $slice= iconv_substr($str,$start,$length,$charset);
    }else{
        $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
        $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
        $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }    
    $fix='';
    if(strlen($slice) < strlen($str)){
        $fix='...';
    }
    return $suffix ? $slice.$fix : $slice;
}

/*查找子类并转为一维数组
 * @function 调用的函数：f表示：父级->子级，c表示：子级->父级
 * @table 表名
 * @field 查询的字段
 * @pid 查询条件：id或parentid
 * @rid 取出的字段
 * @type 返回一维数组还是字符串，arr数组，str字符串
*/
function getOneArr($function,$table,$field,$pid,$rid,$str='str'){
    $temp = $function(Db::name($table)->field($field)->select(),$pid);
    $oneArr = array_column($temp,$rid);
    if($str == 'arr') return $oneArr;
    $strRs = "'".$pid."'";
    foreach ($oneArr as $value) {
    	$strRs .= ",'".$value."'";
    }
    return $strRs;
}

//无限级别分类（父级->子级）
function getChildSort($data,$parentid=0,$html="|---",$level=0){
	$temp = array();
	foreach ($data as $k => $v) {
		if($v['parentid'] == $parentid){
			$str = str_repeat($html, $level);
			$v['html'] = $str;
			$temp[] = $v;
			$temp = array_merge($temp,getChildSort($data,$v['id'],'|---',$level+1));
		}
	}
	return $temp;
}

//无限级别分类（子级->父级）
function getParentSort($data,$id,$html="|---",$level=0){
	$temp = array();
	foreach ($data as $k => $v) {
		if($v['id'] == $id){
			$str = str_repeat($html, $level);
			$v['html'] = $str;
			$temp[] = $v;
			$temp = array_merge(getParentSort($data,$v['parentid'],'|---',$level+1),$temp);
		}
	}
	return $temp;
}

/**获取文件大小，模板调用如：{$rs.size|getfilesize}
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function getfilesize($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}