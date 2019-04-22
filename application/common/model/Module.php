<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\common\model;
use think\Model;
use think\Db;

class Module extends Model{
	/**产品、案例等封面页
    *@table 模块表
    *@sortid 分类ID
    *@lang 语言模块
    *@order 排序
    */
    static function moduleSort($table='product',$sortid=0,$lang='cn',$order=''){
        $table = strtolower($table);//强制小写
        $tabledir = ucfirst($table);//首字母大写
        $where[] = ["$table.lang",'=',$lang];
        $where[] = ["$table.signid",'=',1];
        if(empty($order)) $order = "$table.id desc";
	
        //父类找子类，查询类别下包含的信息
        $sortidArr = ""; $sortWhere[] = ['lang','=',$lang]; $sortWhere[] = ['tabledir','=',$tabledir];
        $sortArr = getChildSort(Db::name('sort')->where($sortWhere)->select(),$sortid);
        $countSort = count($sortArr)-1;
        foreach($sortArr as $k => $w){
            if($k != $countSort){
        	    $sortidArr .= $w['id'].",";
            }else{
        	    $sortidArr .= $w['id'];
            }
        }
        $sortidArr = $sortid.','.$sortidArr;
		
	    //视图查询
	    $rs = Db::view($table,'*')->view('sort',['title'=>'sort_title'],"$table.sortid=sort.id")
            ->where($where)->where("$table.sortid",'in',$sortidArr)->limit(6)->order($order)->select();
	    return $rs;
	}
}