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

class Userpwd extends Validate{
	protected $rule = [
		'password' => 'require|length:6,20',
		'vpassword' => 'require|confirm:password',
	];
	protected $message = [
		'password' => 'y_password_require',
        'vpassword' => 'y_password_confirm',
	];
}