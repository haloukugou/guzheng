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

class Module extends Validate{
	protected $rule = [
	    'tabledir' => 'require|alpha|length:2,20',
	    'urlroute' => 'require|alpha|length:1,30',
	];
	protected $message = [
	    'tabledir' => 'y_mulu',
	    'urlroute' => 'v_urlroute_tips',
	];
}