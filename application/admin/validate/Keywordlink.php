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

class Keywordlink extends Validate{
	protected $rule = ['keyword' => 'require|unique:keywordlink|length:2,50',];
	protected $message = ['keyword' => 'y_keyword',];
}