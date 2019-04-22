<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\common\validate;
use think\Validate;

class Userreg extends Validate{
	protected $rule = [
		'username' => 'require|alphaDash|length:5,20|unique:user',
		'password' => 'require|length:6,20',
		'vpassword' => 'require|confirm:password',
	];
	protected $message = [
		'username.require' => 'y_username_require',
        'username.alphaDash' => 'y_username_alphaDash',
        'username.length' => 'y_username_length',
        'username.unique' => 'y_username_unique',
        'password' => 'y_password_require',
        'vpassword' => 'y_password_confirm',
	];
}