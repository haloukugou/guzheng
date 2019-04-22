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
use think\Db;
use think\facade\Lang;
use think\facade\Env;

class Login extends Controller {
    public function index(){
        $system_version = 'WEB_V5.1.35_20190306';
		if(!request()->isPost()){
            //加载默认语言
            Lang::load(Env::get('module_path').'lang'.DIRECTORY_SEPARATOR.config('default_lang').'.php');
            //登陆欢迎词
            $helloWords = explode("**",lang('v_helloWords'));
            $helloChosen = $helloWords[mt_rand(0,(count($helloWords)-1))];
            $this->assign('helloChosen', $helloChosen);
            //判断春夏秋冬显示背景
            $month=date("n");
            $month = ceil($month/3);
            switch ($month) {
                case 1:
                    $season="spring";
                    break;
                case 2:
                    $season="summer";
                    break;
                case 3:
                    $season="autumn";
                    break;    
                default:
                    $season="winter";
                    break;
            }
            $this->assign('season', $season);
            //登录语言选择
            $this->assign('langlist', Db::name('Language')->order('sequence desc')->limit(10)->select());
            if(!function_exists('curl_init')){
                echo 'curl function can not be used';die;
            }
            //版本信息
            $this->assign('system_version',$system_version);
            return $this->fetch();
		}else{
            $username = input('username'); $password = input('password'); $verify = input('verify');
            //验证码是否正确
            $captcha = new \think\captcha\Captcha();
            if(!$captcha->check($verify)) $this->error(lang('c_error_verify'),url('login/index'));

            //账号密码是否正确
            $userWhere['username'] = $username; $userWhere['password'] = md5($password);
            $userRs = Db::name('user')->where($userWhere)->find();
            if(empty($userRs)) $this->error(lang('c_error_username_or_password'),url('login/index'));
		
            $userid = $userRs['id'];
            //写入session
            session('userid',$userid);
            session('username',$userRs['username']);
            session('nickname',$userRs['nickname']);
            session('avatar',$userRs['avatar']);
		
            $groupRs = Db::name("Auth_group_access")->where('uid',$userid)->find();
            $groupid = $groupRs['group_id'];
            $rulesRs = Db::name("Auth_group")->where('id',$groupid)->find();
            $rules = $rulesRs['rules'];
            
            $arr_rules=explode(',',$rules);
            session('groupid',$groupid);
            session('rules',$arr_rules);
            session('system_version',$system_version);//系统版本
            //重定向到首页
            $this->success(lang('c_success_login'),url('Index/index?lang='.input('language')));
		}
    }

	//退出登录
    public function logout(){
        session(null);
		//重定向到登录界面
        $this->redirect(url('Login/index'));
    }
}