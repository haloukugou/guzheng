<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\common\controller;
use think\Controller;
use think\Db;
use think\facade\Cookie;

class User extends Controller{
    /**获取用户信息
    * @userid 用户ID
    **/
    public function getUser($userid){
        $rs = Db::view('user','*')
            ->view('auth_group_access','uid','auth_group_access.uid=user.id')
            ->view('auth_group',['id'=>'g_id','parentid'=>'g_parentid','title'=>'g_title','status'=>'g_status'],'auth_group.id=auth_group_access.group_id')
            ->where('user.id',$userid)
            ->find();
        return $rs;
    }

	/**登录验证
	* @username 用户名
	* @password 已MD5过的密码
	**/
    public function checkLogin($username,$password){
    	//账号密码是否正确
    	$userWhere[] = ['username','=',$username]; $userWhere[] = ['password','=',$password];
        $userRs = Db::name('user')->where($userWhere)->find();
        if(!empty($userRs)){
            return $userRs;
        }else{
            return false;
        }
    }

    /**生成随机数,用于生成salt
    * @length 长度
    **/
    public function randStr($length){
        //生成一个包含：数字、小写字母、大写字母的数组
        $arr = array_merge(range(0,9), range('a','z'), range('A','Z'));
        $str = '';
        $arrLength = count($arr);
        for($i = 0; $i < $length; $i++){
            $rand = mt_rand(0, $arrLength-1);
            $str .= $arr[$rand];
        }
        return $str;
    }

    /**用户勾选"保存一周"
    * @userid 用户ID
    * @identifier 第二身份标识
    * @token MD5了的标识
    * @timeout 过期时间
    **/
    public function saveRemember($userid,$identifier,$token,$timeout){
        $data = ['identifier'=>$identifier,'token'=>$token,'timeout'=>$timeout];
        $rs = Db::name('user')->where('id',$userid)->update($data);
        return $rs;
    }

    //验证用户是否勾选“保存一周”
    public function checkRemember(){
        $arr = array(); $thistime = time(); $identifier = ''; $token = '';
        if(Cookie::has('auth','bmkj_')){
            list($identifier,$token) = explode(':',Cookie::get('auth','bmkj_'));
        }
        if(!ctype_alnum($identifier) or !ctype_alnum($token)){
            return false;
        }
        $userWhere[] = ['identifier','=',$identifier]; $userWhere[] = ['token','=',$token];
        $userRs = Db::name('user')->where($userWhere)->find();
        if(!empty($userRs)){
            if($thistime < $userRs['timeout']){
                return $userRs;
            }
        }
        return false;
    }

    //退出
    public function logout(){
        session(null);
        cookie(null,'bmkj_');
        return 1;
    }
}
