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

class Language extends Validate{
	protected $rule = ['mulu' => 'require|alpha|length:2,20|unique:language',];
	protected $message = ['mulu' => 'y_mulu_only',];
}