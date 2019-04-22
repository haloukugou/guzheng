<?php
			//配置文件
			return [
                //公共配置
                'url_common_param' => true,// URL普通方式参数，多语言后缀获取
				
                //显示设置
                'isdisplay' => [
                    'siteinfo' => 1,
                    'field' => 1,
                    'guestbook' => 1,
                    'chat' => 1,
                    'ad' => 1,
                    'keyword' => 1,
                    'navigation' => 1,
                    'area' => 1,
                    'comment' => 0,
                    'user' => 1,
                    'authgroup' => 1,
                    'authrule' => 1,
                    'language' => 1,
                    'module' => 1,
                    'parameter' => 1,
                    'databackup' => 1,
                    'templatemanage' => 1,
                    'filemanage' => 1,
                    'typeattribute' => 1,
                    'showmodule' => 1,
                ],

                //数据库备份还原设置
                'dataconfig' => [
                    'path'     => '../databak/',//数据库备份路径
                    'part'     => '20971520',//数据库备份卷大小，20M
                    'compress' => '1',//数据库备份文件是否启用压缩 0不压缩 1 压缩
                    'level'    => '9', //数据库备份文件压缩级别 1普通 4 一般  9最高
                ],

                //ueditor配置
                'ueditor' => [
                    'water' => '0',
                    'waterPosition' => '9',
                    'waterImage' => '/skin/admin/img/df81.png',
                    'transparency' => '80',
                    'waterText' => ' ',
                    'waterfont' => '4.ttf',
                    'watercolor' => '#0fb504',
                    'watersize' => '30',
                    'thumb' => '1',
                    'thumbwidth' => '280',
                    'thumbheight' => '280',
                    'imageMaxSize' => '300',
                    'fileMaxSize' => '50',
                    'thumbnail' => '0',
                ],
			    
                //其他设置
                'app_debug' => 'false',
                'suffix' => 'net',
			    'deletefile' => '0',
                'no_delete_fieldid' => '',

            ];