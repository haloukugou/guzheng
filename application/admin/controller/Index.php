<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use think\Db;
use think\facade\Env;

class Index extends Base{
    public function index(){
        return $this->fetch();
    }

    //修改后台入口文件名
    public function editadminfile(){
        if(request()->isPost()){
            $filename = strtolower(trim(input('filename'))); $lang = input('lang');
            if($filename == 'index' or $filename == 'admin') $this->error(lang('c_fail'));
            $rootPath = request()->server('DOCUMENT_ROOT').'/';
            if(empty($filename)) $this->error(lang('c_template_filename_require'));
            if(!preg_match('/^[a-z]{0,20}$/',$filename)) $this->error(lang('c_template_filename_require'));
            
            if(is_file($rootPath.'admin.php')){
                $result = rename($rootPath.'admin.php',$rootPath.$filename.'.php');
                if($result){
                    //修改成功，退出重新登录
                    session(null);
                    $this->success(lang('c_success').'，'.lang('c_login_again'),'/'.$filename.'.php/login/index.html');
                }
            }
            $this->error(lang('c_fail'),url('index/index?lang='.$lang));
        }
    }
	
	//清理缓存
    public function delCache(){
    	$dofile = new \common\Dofile();
    	$delCacheDo = $dofile->delDirAndFile(Env::get('runtime_path'),true);
		$delCacheDo ? $this->success(lang('c_success')) : $this->error(lang('c_fail'));
    }
}