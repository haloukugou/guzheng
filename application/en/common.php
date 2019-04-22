<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------
use think\Db;

/**四级嵌套循环：分类/关于我们/导航菜单等
* @table 表
* @where 查询条件
* @limit 数量控制
* @order 排序
*/
function sublist($table='sort',$where='',$limit='0,1000',$order='sequence desc'){
	$table = strtolower($table);//强制小写
	$tableList = Db::name($table)->where($where)->limit($limit)->order($order)->select();//一级
	foreach($tableList as $i=> $tableListRs){//二级
	    $subOneWhere['parentid'] = $tableListRs['id'];
	    $tableList[$i]['subOne'] = Db::name($table)->where($subOneWhere)->order($order)->select();
	    foreach($tableList[$i]['subOne'] as $j=> $tableListRsRs){//三级
	        $subTwoWhere['parentid'] = $tableListRsRs['id'];
	        $tableList[$i]['subOne'][$j]['subTwo'] = Db::name($table)->where($subTwoWhere)->order($order)->select();
	        foreach($tableList[$i]['subOne'][$j]['subTwo'] as $k=> $fourRs){//四级
	            $subThreeWhere['parentid'] = $fourRs['id'];
	            $tableList[$i]['subOne'][$j]['subTwo'][$k]['subThree'] = Db::name($table)->where($subThreeWhere)->order($order)->select();
	        }
        }
	}
	return $tableList;
}

/**多维数组查找值
* @value 查找的值
* @array 查找的数组
*/
function deep_in_array($value, $array) {
    foreach($array as $item){
        if(!is_array($item)){
            if($item == $value){
                return true;
            }else{
                continue;
            }
        }
        if(in_array($value, $item)){
            return true;
        }else if(deep_in_array($value, $item)){
            return true;
        }
    }
    return false;
}

/**中文获取星期几
 * 模板调用：{$rs.addtime|getWeek}
 * @date 时间戳
 */
function getWeek($date){
	$w = date('w',$date);                                
    $week=array("0"=>"日","1"=>"一","2"=>"二","3"=>"三","4"=>"四","5"=>"五","6"=>"六"); 
	return $week[$w];
}