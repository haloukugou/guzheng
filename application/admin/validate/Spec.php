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

class Spec extends Validate{
	protected $rule = [
		'title' => 'require|length:2,20',
		'tabledir' => 'require|alpha|length:2,20',
	];
	protected $message = [
		'title' => 'y_title',
        'tabledir' => 'y_tabledir',
	];
}