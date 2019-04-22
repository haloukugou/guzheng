<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\cn\controller;
use think\Db;

class Index extends Base{
    public function index(){
    	//模块是否启用相关属性：是否启用价格等
    	$lang = request()->module();
		$moduleWhere['lang'] = $lang; $moduleWhere['tabledir'] = 'Product';
		$moduleRs = Db::name('module')->where($moduleWhere)->find();
        $isdisplay_array = explode(',',$moduleRs['isdisplay']);
        $this->assign('isdisplay_array',$isdisplay_array);

        //默认语言，首页网址去掉语言目录
        $langRs = Db::name('language')->where('isdefault',1)->find();
        if($langRs['mulu'] == $lang){
        	if(stripos(request()->url(true),"/$lang") !== false){
        		header('HTTP/1.1 301 Moved Permanently');//发出301头部
                header('Location: '.request()->root(true));
        	}
        }

        return $this->fetch();
    }
}
