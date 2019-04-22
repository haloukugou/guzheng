<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\cn\controller;
use app\common\controller\User as commonControllerUser;
use app\common\model\User as commonModelUser;
use app\common\model\Comment as commonModelComment;
use app\common\model\Guestbook as commonModelGuestbook;
use think\facade\Cookie;
use think\Db;

class User extends Base{
    //会员中心
    public function index(){
        if(!session('?userid')) $this->checkLong();
        //个人资料
        $commonControllerUser = new commonControllerUser;
        $userRs = $commonControllerUser->getUser(session('userid'));
        $this->assign('userRs',$userRs);

        return $this->fetch();
    }

    //判断是否持久登录
    public function checkLong(){
        $commonControllerUser = new commonControllerUser;
        $userRs = $commonControllerUser->checkRemember();
        if($userRs !== false){
            //写入session
            session('userid',$userRs['id']);
            session('username',$userRs['username']);
        }else{
            $this->redirect('user/login');
        }
    }

    //注册
    public function reg(){
        if(session('?userid')) $this->redirect('user/index');
        if(request()->isPost()){
            $verify = input('verify');
            //验证码是否正确
            $captcha = new \think\captcha\Captcha();
            if(!$captcha->check($verify)) $this->error(lang('c_error_verify'));
            //表单验证
            $checkResult = $this->validate(input('post.'),'app\common\validate\Userreg');
            if($checkResult !== true) $this->error($checkResult);
            //检查是否同意注册协议
            if(input('agreement') != 1) $this->error(lang('v_please_agree').'"'.lang('v_i_agree').'"');
           
            $lang = $module = request()->module();
            //重定向到会员中心
            $commonModelUser = new commonModelUser;
            $userId = commonModelUser::edit($lang,trim(input('id')));
            if($userId < 1) return $userId->getError();
            //写入session
            session('userid',$userId);
            session('username',input('username'));
            $this->success(lang('c_success'),url('user/index'));
        }else{
            return $this->fetch();
        }
    }

    //修改个人资料
    public function edit(){
        if(!session('?userid')) $this->checkLong();
        if(request()->isPost()){
            $lang = $module = request()->module();
            //执行操作
            $commonModelUser = new commonModelUser;
            $result = commonModelUser::edit($lang,session('userid'));
            if($result < 1) return $result->getError();
            $this->success(lang('c_success'));
        }else{
            //个人资料
            $commonControllerUser = new commonControllerUser;
            $userRs = $commonControllerUser->getUser(session('userid'));
            $this->assign('userRs',$userRs);

            return $this->fetch();
        }
    }

    //修改密码
    public function password(){
        if(!session('?userid')) $this->checkLong();
        //个人资料
        $commonControllerUser = new commonControllerUser;
        $userRs = $commonControllerUser->getUser(session('userid'));

        if(request()->isPost()){
            //表单验证
            $checkResult = $this->validate(input('post.'),'app\common\validate\Userpwd');
            if($checkResult !== true) $this->error($checkResult);
            //旧密码是否正确
            $oldpassword = md5(trim(input('oldpassword')));
            if($oldpassword != $userRs['password']) $this->error(lang('c_oldpassword_error'));

            //执行操作
            $commonModelUser = new commonModelUser;
            $result = commonModelUser::password(session('userid'));
            if($result < 1) return $result->getError();
            $this->success(lang('c_success'));
        }else{
            $this->assign('userRs',$userRs);
            return $this->fetch();
        }
    }

    //登录
    public function login(){
        if(session('?userid')) $this->redirect('user/index');
        if(request()->isPost()){
            $verify = input('verify');
            //验证码是否正确
            $captcha = new \think\captcha\Captcha();
            if(!$captcha->check($verify)) $this->error(lang('c_error_verify'));
            //验证用户名或密码
            $username = trim(input('username')); $password = md5(trim(input('password')));
            $commonControllerUser = new commonControllerUser;
            $userRs = $commonControllerUser->checkLogin($username,$password);
            if($userRs === false){
                $this->error(lang('c_username_password_error'));
            }else{
                $userid = $userRs['id']; $logintimes = $userRs['logintimes'] + 1;
                //更新登录时间和登录次数
                Db::name('user')->where('id',$userid)->update(['lastlogin'=>time(),'logintimes'=>$logintimes]);
                //写入session
                session('userid',$userid);
                session('username',$username);
                //如果勾选"保存一周",则持久登陆
                if(!empty(input('remember'))){
                    $salt = $commonControllerUser->randStr(16);
                    //第二身份标识
                    $identifier = md5($salt.md5($username.$salt));
                    //持久登录标识
                    $token = md5(uniqid(rand(),true));
                    //持久登录超时时间(1周)
                    Cookie::set('auth',"$identifier:$token",['prefix'=>'bmkj_','expire'=>604800]);
                    $timeout = time() + 604800;
                    $commonControllerUser->saveRemember($userid,$identifier,$token,$timeout);
                }
                //把用户名存入cookie，退出登录后在表单保存用户名信息
                Cookie::set('username',$username,604800);
            }
            //跳转至会员中心
            $this->redirect('user/index');
        }else{
            return $this->fetch();
        }
    }

    //退出
    public function logout(){
        $user = new commonControllerUser;
        $result = $user->logout();
        if($result != 1) return json(lang('c_fail'));
        return json(1);
    }
}
