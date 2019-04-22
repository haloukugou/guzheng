<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\model;
use think\Model;
use think\Db;

class User extends Model{
    /**列表
    * @lang 语言
    * @group_id 会员组
    * @signid 1正常9已删除，大于9就是删除时间戳
    * @keyword 关键词
    * @order 排序
    */
	static function index($lang,$group_id,$signid=1,$keyword,$order){
		$where[] = ['user.id','>',0];
		if(!empty($group_id)) $where[] = ['auth_group.id','=',$group_id];
		if(!empty($keyword)) $where[] = ['user.nickname|user.realname|user.mobile|user.email|user.qq|user.wechat','like',"%$keyword%"];
		if($signid > 8){//已软删除
			$where[] = ['user.signid','>','8'];
		}else{
			$where[] = ['user.signid','=',$signid];
		}
		$pageParam['query']['signid'] = $signid;
		$pageParam['query']['lang'] = $lang;
		$pageParam['query']['group_id'] = $group_id;
		$pageParam['query']['keyword'] = $keyword;
		//视图查询
		$rs = Db::view('user','*')
            ->view('auth_group_access','*','user.id=auth_group_access.uid')
            ->view('auth_group',['id'=>'Auth_group_id','status','rules','title'],'auth_group_access.group_id=auth_group.id')
            ->where($where)->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}

	//日期
    protected function setAddtimeAttr(){
		return time();
    }

	//密码
    protected function setPasswordAttr(){
		$password = input("password");
		return md5($password);
    }
	
    //新增编辑
	static function edit($id){
		$groupid = input("groupid");
		$AuthGroupAccess = new AuthGroupAccess;
	    if($id>0){//编辑
		    $password = input('password');
			$user = User::get($id);
			if(empty($password)){//密码为空时，只写入以下字段值（不更新密码字段）
			    $result = $user->allowField(['id','username','email','mobile','nickname','avatar'])->save(input('post.'),['id'=>$id]);
			}else{
			    $result = $user->allowField(true)->save(input('post.'),['id'=>$id]);
			}
			//更新auth_group_access表
			$AuthGroupAccess->save(['group_id'=>$groupid],['uid'=>$user->id]);
		}else{//新增
			$user = new User;
			$result = $user->allowField(true)->save(input('post.'));
			//添加auth_group_access表
            $AuthGroupAccess->data(['group_id'=>$groupid,'uid'=>$user->id])->save();
		}
		return $user->id;
	}
}