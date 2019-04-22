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

class Config extends Validate{
	protected $rule = [
		'waterImage' => 'require',
		'transparency' => 'require|integer',
		'waterText' => 'require',
		'watercolor' => 'require',
		'watersize' => 'require|integer',
		'thumbwidth' => 'require|integer',
		'thumbheight' => 'require|integer',
		'imageMaxSize' => 'require|integer',
		'fileMaxSize' => 'require|integer',
	];
	protected $message = [
		'waterImage' => 'y_waterImage',
        'transparency' => 'y_transparency',
        'waterText' => 'y_waterText',
        'watercolor' => 'y_watercolor',
        'watersize' => 'y_watersize',
        'thumbwidth' => 'y_thumbwidth',
        'thumbheight' => 'y_thumbheight',
        'imageMaxSize' => 'y_imageMaxSize',
        'fileMaxSize' => 'y_fileMaxSize',
	];
}