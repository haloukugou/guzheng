<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use think\facade\Env;

class Config extends Base{
    public function index(){
        if(!request()->isPost()){
            return $this->fetch();
		}else{
            //判断参数设置是否开启了参数设置
            if(config('app.isdisplay.parameter') != 1) $this->error(lang('c_parameter_enable_first'));

			//表单验证
			$checkResult = $this->validate(input('post.'),'Config');
			if($checkResult !== true) $this->error($checkResult);

            //显示设置
            $siteinfo_array = input('siteinfo/a');
            $siteinfo = empty($siteinfo_array) ? 0 : $siteinfo_array[0];
            $field_array = input('field/a');
            $field = empty($field_array) ? 0 : $field_array[0];
            $guestbook_array = input('guestbook/a');
            $guestbook = empty($guestbook_array) ? 0 : $guestbook_array[0];
            $chat_array = input('chat/a');
            $chat = empty($chat_array) ? 0 : $chat_array[0];
            $ad_array = input('ad/a');
            $ad = empty($ad_array) ? 0 : $ad_array[0];
            $keyword_array = input('keyword/a');
            $keyword = empty($keyword_array) ? 0 : $keyword_array[0];
            $navigation_array = input('navigation/a');
            $navigation = empty($navigation_array) ? 0 : $navigation_array[0];
            $area_array = input('area/a');
            $area = empty($area_array) ? 0 : $area_array[0];
            $comment_array = input('comment/a');
            $comment = empty($comment_array) ? 0 : $comment_array[0];
            $user_array = input('user/a');
            $user = empty($user_array) ? 0 : $user_array[0];
            $authgroup_array = input('authgroup/a');
            $authgroup = empty($authgroup_array) ? 0 : $authgroup_array[0];
            $authrule_array = input('authrule/a');
            $authrule = empty($authrule_array) ? 0 : $authrule_array[0];
            $language_array = input('language/a');
            $language = empty($language_array) ? 0 : $language_array[0];
            $module_array = input('module/a');
            $module = empty($module_array) ? 0 : $module_array[0];
            $parameter_array = input('parameter/a');
            $parameter = empty($parameter_array) ? 0 : $parameter_array[0];
            $databackup_array = input('databackup/a');
            $databackup = empty($databackup_array) ? 0 : $databackup_array[0];
            $templatemanage_array = input('templatemanage/a');
            $templatemanage = empty($templatemanage_array) ? 0 : $templatemanage_array[0];
            $filemanage_array = input('filemanage/a');
            $filemanage = empty($filemanage_array) ? 0 : $filemanage_array[0];
            $typeattribute_array = input('typeattribute/a');
            $typeattribute = empty($typeattribute_array) ? 0 : $typeattribute_array[0];
            $showmodule_array = input('showmodule/a');
            $showmodule = empty($showmodule_array) ? 0 : $showmodule_array[0];
			
		    $str = "<?php
			//配置文件
			return [
                //公共配置
                'url_common_param' => true,// URL普通方式参数，多语言后缀获取
				
                //显示设置
                'isdisplay' => [
                    'siteinfo' => ".$siteinfo.",
                    'field' => ".$field.",
                    'guestbook' => ".$guestbook.",
                    'chat' => ".$chat.",
                    'ad' => ".$ad.",
                    'keyword' => ".$keyword.",
                    'navigation' => ".$navigation.",
                    'area' => ".$area.",
                    'comment' => ".$comment.",
                    'user' => ".$user.",
                    'authgroup' => ".$authgroup.",
                    'authrule' => ".$authrule.",
                    'language' => ".$language.",
                    'module' => ".$module.",
                    'parameter' => ".$parameter.",
                    'databackup' => ".$databackup.",
                    'templatemanage' => ".$templatemanage.",
                    'filemanage' => ".$filemanage.",
                    'typeattribute' => ".$typeattribute.",
                    'showmodule' => ".$showmodule.",
                ],

                //数据库备份还原设置
                'dataconfig' => [
                    'path'     => '../databak/',//数据库备份路径
                    'part'     => '20971520',//数据库备份卷大小，20M
                    'compress' => '".input('compress')."',//数据库备份文件是否启用压缩 0不压缩 1 压缩
                    'level'    => '9', //数据库备份文件压缩级别 1普通 4 一般  9最高
                ],

                //ueditor配置
                'ueditor' => [
                    'water' => '".input('water')."',
                    'waterPosition' => '".input('waterPosition')."',
                    'waterImage' => '".input('waterImage')."',
                    'transparency' => '".input('transparency')."',
                    'waterText' => '".input('waterText')."',
                    'waterfont' => '".input('waterfont')."',
                    'watercolor' => '".input('watercolor')."',
                    'watersize' => '".input('watersize')."',
                    'thumb' => '".input('thumb')."',
                    'thumbwidth' => '".input('thumbwidth')."',
                    'thumbheight' => '".input('thumbheight')."',
                    'imageMaxSize' => '".input('imageMaxSize')."',
                    'fileMaxSize' => '".input('fileMaxSize')."',
                    'thumbnail' => '".input('thumbnail')."',
                ],
			    
                //其他设置
                'app_debug' => '".input('app_debug')."',
                'suffix' => 'net',
			    'deletefile' => '".input('deletefile')."',
                'no_delete_fieldid' => '".input('no_delete_fieldid')."',

            ];";
			$configFile = Env::get('module_path').'/config/app.php';
		    $result = file_put_contents($configFile,$str);
            /*修改总配置文件的调试模式 开始*/
            if(input('app_debug') == 'true'){
                $old_app_debug = 'false';
                $oldFile = '\'exception_tmpl\'         => Env::get(\'app_path\') . \'think_exception.html\',';
                $newFile = '\'exception_tmpl\'         => Env::get(\'think_path\') . \'tpl/think_exception.tpl\',';
            }else{
                $old_app_debug = 'true';
                $oldFile = '\'exception_tmpl\'         => Env::get(\'think_path\') . \'tpl/think_exception.tpl\',';
                $newFile = '\'exception_tmpl\'         => Env::get(\'app_path\') . \'think_exception.html\',';
            }
            $appFile = Env::get('config_path').'app.php';
            $old = '\'app_debug\'              => '.$old_app_debug.',';
            $new = '\'app_debug\'              => '.input('app_debug').',';
            $dofile = new \common\Dofile();
            $dofile->editFile($appFile,$old,$new);
            //修改报错模板参数
            $dofile->editFile($appFile,$oldFile,$newFile);
            /*修改总配置文件的调试模式 结束*/
		    $result ? $this->success(lang('c_success')) : $this->error(lang('c_edit_fail').$configFile.lang('c_file_auth'));
		}
    }
}