<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\en\model;
use think\Model;
use think\Db;

class Module extends Model{
	/*详情页，如：产品详情，新闻详情...
    * @table 表
    * @id 表的ID
	*/
    static function view($table,$id){
        $table = strtolower($table);//强制小写
	    //视图查询
		$rs = Db::view($table,'*')
            ->view('sort',['title'=>'sort_title','seotitle'=>'sort_seotitle','keyword'=>'sort_keyword','description'=>'sort_description'],"$table.sortid=sort.id")
            ->view('area',['title'=>'area_title'],"$table.areaid=area.id")
            ->view('user',['avatar','nickname'],"$table.userid=user.id")
            ->where("$table.signid",1)
            ->where("$table.id",$id)
            ->find();
		return $rs;
	}

	/**列表页，如：产品列表、新闻列表、关于我们列表等
    * @table 表
    * @sortid 分类ID
    * @urlroute 模块首页路由前缀
    * @route 模块路由符号，-p产品，-n新闻，-d下载，-a单页，-c案例
    * @field 查询字段，*表示所有字段
    * @lang 语言
    * @order 排序
    * @keyword 查询关键词
    */
	static function index($table='product',$sortid=0,$urlroute='list',$route='-p',$field='*',$lang='',$order='',$keyword=''){
        $table = strtolower($table);//强制小写
        $tabledir = ucfirst($table);//首字母大写
        $where[] = ["$table.lang",'=',$lang];
        $where[] = ["$table.signid",'=',1];
		
        //父类找子类，查询类别下包含的信息
        $sortidArr = ""; $sortWhere['lang'] = $lang; $sortWhere['tabledir'] = $tabledir;
        $sortArr = getChildSort(Db::name('sort')->where($sortWhere)->select(),$sortid);
        $countSort = count($sortArr)-1;
        foreach($sortArr as $k => $w){
        	if($k != $countSort){
        		$sortidArr .= $w['id'].",";
        	}else{
        		$sortidArr .= $w['id'];
        	}
        }
        if(!empty($sortid)) $sortidArr = $sortid.','.$sortidArr;
		
		//后台模块设置的前端显示数量
        $listWhere['lang'] = $lang; $listWhere['tabledir'] = $tabledir;
        $listNumRs = Db::name('module')->where($listWhere)->find();
        $listNum = $listNumRs['listnum'];
        //列表页地址
		if(!empty($sortid)){
			$path = '/'.$lang.'/'.$urlroute.$route.$sortid.'-[PAGE].html';
		}else{
			$path = '/'.$lang."/$urlroute$route-[PAGE].html";
		}
		if(!empty($keyword)) $path .= '?keyword='.$keyword;
		
		//视图查询
		$rs = Db::view($table,$field)
            ->view('sort',['title'=>'sort_title','seotitle'=>'sort_seotitle','keyword'=>'sort_keyword','description'=>'sort_description'],"$table.sortid=sort.id")
            ->view('area',['title'=>'area_title'],"$table.areaid=area.id")
            ->view('user',['avatar','nickname'],"$table.userid=user.id")
            ->where($where)->where("$table.sortid",'in',$sortidArr)->where("$table.title|$table.seotitle|$table.keyword|$table.description|$table.content1|sort.title|sort.seotitle|sort.keyword|sort.description|area.title",'like',"%$keyword%")->order($order)
            ->paginate($listNum,false,['page'=>input('param.page')?:1,'path'=>$path]);
		return $rs;
	}

    /**面包屑导航：子类找父类，如：关于我们导航、产品导航等
    * @table 表
    * @tabledir 模块目录
	* @lang 语言
	* @id 页面ID或分类ID
	*/
	static function listNav($table='sort',$tabledir='Product',$id,$lang=''){
        $table = strtolower($table);//强制小写
        $tabledir = ucfirst(strtolower($tabledir));//强制小写/首字母大写
		if($table == 'sort') $where['tabledir'] = $tabledir;//如果是分类表sort
		$where['lang'] = $lang;
		$rs = getParentSort(Db::name($table)->where($where)->order('sequence desc,id desc')->select(),$id);
		return $rs;
	}
}