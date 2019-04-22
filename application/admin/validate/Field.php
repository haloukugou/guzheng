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

class Field extends Validate{
	protected $rule = ['fieldlabel' => 'require|alpha|length:3,20',];
	protected $message = ['fieldlabel' => 'y_fieldlabel',];
}