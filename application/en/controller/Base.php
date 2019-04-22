<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\en\controller;
use think\Controller;
use app\en\model\Module as ModuleModel;
use think\facade\Env;
use think\facade\Lang;
use think\facade\Config;
use think\Db;

class Base extends Controller{
    public function initialize(){
    	error_reporting(E_ERROR | E_PARSE );
		$this->lang = $lang = $module = request()->module();
		//加载语言包
		Lang::load(Env::get('module_path').'lang'.DIRECTORY_SEPARATOR.$lang.'.php');
		Lang::load(Env::get('module_path').'lang'.DIRECTORY_SEPARATOR.'custom.php');
		//加载配置文件以获取后台配置
		Config::load(Env::get('app_path').'admin'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR."app.php");
		
		//判断该语言模块是否存在
		$moduleWhere[] = ['mulu','=',$lang]; $moduleWhere[] = ['status','=',1];
		$moduleLangRs = Db::name('language')->where($moduleWhere)->find();
		if(empty($moduleLangRs)){
			header('HTTP/1.1 301 Moved Permanently');//发出301头部
            header('Location: '.request()->root(true));
		}
		$this->assign('langRs',$moduleLangRs);
		//启用的语言模块数量
		$langNum = Db::name('language')->where('status',1)->count();
        $this->assign('langNum',$langNum);
        
		//网站信息
		$siteRs = Db::name('siteinfo')->where('lang',$lang)->find();
		if($siteRs['sitestatus'] == 0){//关闭网站
			echo $siteRs['closereason'];
			die;
		}
		$this->assign('siteRs',$siteRs);
        
		//语言及模块路径变量
		$defaultLangRs = Db::name('language')->where('isdefault',1)->find();
        if($defaultLangRs['mulu'] == $lang){
            $home_path = '/';
        }else{
        	$home_path = '/'.$module.'/';
        }
        $this->assign('lang',$lang);
        $this->assign('home_path',$home_path);
		$this->assign('lang_path','/'.$lang.'/');
		
 		//全局参数
		$fieldList = Db::name('field')->where('lang',$lang)->select();
		foreach($fieldList as $k => $w){
		    $this->assign($w['fieldlabel'],$w['fieldvalue']);
		}
		
		//tp5.1.14起动态配置模板路径改变了，所以使用此笨方法
		$this->view->config('view_path',config('template.view_path'));
        //获取根域名，分享等用到
		$this->assign('root',request()->root(true));

		//留言属性
		$gbWhere[] = ['tabledir','=','Guestbook']; $gbWhere[] = ['parentid','=',0]; $gbWhere[] = ['lang','=',$lang];
		$this->assign('gb_attribute',Db::name('attribute')->where($gbWhere)->order('sequence desc')->select());

		//分类下拉展开标志
		$parentArr = array(); $sortid = input('sortid');
		if(is_numeric($sortid)){
			$parentArr = getParentSort(Db::name('sort')->where('lang',$lang)->field('id,parentid')->select(),$sortid);
		}
		$this->assign('parent_arr',$parentArr);

		//导航嵌套循环
		$navWhere[] = ['lang','=',$lang]; $navWhere[] = ['parentid','=',0];
		$navigation = sublist('navigation',$navWhere,20,'sequence desc');
		$this->assign('navigation',$navigation);
    }
}