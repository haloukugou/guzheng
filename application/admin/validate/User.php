<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\validate;
use think\Validate;

class User extends Validate{
	protected $rule = [
		'username' => 'require|alphaDash|length:4,20|unique:user',
		'password' => 'require|length:6,20',
		'vpassword' => 'require|confirm:password',
	];
	protected $message = [
		'username.require' => 'm_require_username',
        'username.alphaDash' => 'm_username_exists',
        'username.length' => 'y_username',
        'username.unique' => 'y_username',
        'password' => 'm_require_password',
        'vpassword' => 'm_password_inconsistent',
	];
	protected $scene = [
        'edit'  =>  ['username'],
    ];
}