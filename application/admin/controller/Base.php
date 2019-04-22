<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use think\Controller;
use app\admin\model\Module as ModuleModel;
use think\Db;

class Base extends Controller {
    public function initialize(){
        $lang = input('lang'); $userid = session('userid'); $groupid = session('groupid');
        //判断用户是否登陆
        if(!isset($userid)) $this->redirect(url('login/index'));
        
        //默认语言
        $defaultLangWhere[] = ['isdefault','=',1];
        $muluRs = Db::name('language')->where($defaultLangWhere)->find();

        //判断是否获取语言
        if(empty(input('lang'))){
            $lang = config('default_lang');
            $langUrl = request()->url(true);
            $haveStr = strpos($langUrl,'?');
            $haveStr === false ? $langUrl .= '?lang='.$muluRs['mulu'] : $langUrl .= '&lang='.$muluRs['mulu'];
            $this->redirect($langUrl);
        }
        $this->assign('lang',$lang);

        //头部当前语言
        $nowLangWhere[] = ['mulu','=',$lang];
        $nowLang = Db::name('language')->where($nowLangWhere)->find();
        $this->protocol = 'http://';
        $this->assign('nowLang',$nowLang);

        //头部语言循环
        $headlang = Db::name('language')->where('status',1)->order('sequence desc')->limit(100)->select();
        $this->location = array('localhost','127.0.0.1');
        $this->assign('headlang',$headlang);
        //启用的语言数量
        $this->assign('languageNum',count($headlang));

        //（左侧）启用模块循环
        $moduleWhere[] = ['lang','=',$lang]; $moduleWhere[] = ['disabled','=',1];
        $this->assign('modulelist',Db::name('module')->where($moduleWhere)->order('sequence desc')->select());
        
        //导航变量
        $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
        $navModuleWhere[] = ['lang','=',$lang];
        if($tabledir != 'Spec'){
            $navModuleWhere[] = ['tabledir','=',$tabledir];
        }else{
            $navModuleWhere[] = ['tabledir','=',ucfirst(strtolower(input('moduletable')))];
        }
        $this->navModuleRs = $navModuleRs = Db::name('module')->where($navModuleWhere)->find();
        $rootDomain = request()->rootDomain();
        if(is_numeric(substr($rootDomain,-1))) $rootDomain = request()->server('SERVER_NAME');
        $this->rootDomain = $rootDomain;
        $this->assign('domain',request()->domain());
        $this->assign('navModuleRs',$navModuleRs);

        //后台入口文件名是否已经修改
        $admintips = is_file(request()->server('DOCUMENT_ROOT').'/admin.php') ? 'yes' : '';
        $this->assign('admintips',$admintips);

        $controller = request()->controller(); $action = request()->action();
        $this->assign('controller',$controller);
        $this->assign('action',$action);
        //头部状态
        $home_current = $global_current = '';
        $currentTable = array('Siteinfo','Guestbook','User','Area','AuthGroup','AuthRule','Language','Module','Config','Navigation','Banner','Comment','Ad','Keywordlink','Chat','Field','Databackup','Templatemanage','Filemanage');
        if(in_array($controller,$currentTable)){
            $global_current = 'active';
        }else{
            $home_current = 'active';
        }
        if($controller == 'Attribute' and in_array(input('tabledir'),$currentTable)){
            $global_current = 'active'; $home_current = '';
        }
        $this->assign('home_current',$home_current);
        $this->assign('global_current',$global_current);

        //权限控制
        $auth = new \common\Auth();
        $rule  = strtolower($controller.'/'.$action);
        $checkUser = $auth->check($rule,$userid);
        
        if(($groupid == 1)) return true;//超级管理员允许访问任何页面
        if(!$checkUser){
            $this->error(lang('c_no_auth'),url('login/logout?lang='.$lang));
        }
    }

    //汉字转拼音
    public function pinyin(){
        $pinyin = new \common\Pinyin();
        $str = trim(input('title')); 
        echo $pinyin->strtopin($str); 
    }
}