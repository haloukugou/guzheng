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

class Down extends Validate{
	protected $rule = [
	    'sortid' => 'require',
	];
	protected $message = [
	    'sortid' => 'v_sort_check',
	];
}