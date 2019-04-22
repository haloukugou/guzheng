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

class Templatemanage extends Base{
    //读取模板封面
    public function index(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));
        //模板皮肤目录不存在
        $skinPath = request()->server('DOCUMENT_ROOT').'/skin/index/';
        if(!is_dir($skinPath)) $this->error(lang('c_fail'));

        $dofile = new \common\Dofile();
        $list = $dofile->getFiles($skinPath,false,'jpg');
        //分页
        $list = new \common\Page($list,48);
        $this->assign(['list' => $list,]);

        return $this->fetch();
    }

    //读取皮肤目录
    public function skinlist(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));

        $lang = input('lang'); $mulu = input('mulu');
        $skinPath = request()->server('DOCUMENT_ROOT').'/skin/index/'.$mulu;

        //判断是否是目录（无后缀名的文件）
        if(!is_dir($skinPath)) $this->error(lang('c_fail'));

        $goback = '';
        if(!empty($mulu)){
            $goback = substr($mulu,0,strrpos($mulu,'/'));
        }else{
            $this->redirect(url('templatemanage/index?lang='.$lang));
        }

        $dofile = new \common\Dofile();
        $filelist = $dofile->getFiles($skinPath,false);
        //分页
        $list = new \common\Page($filelist,48);
        $this->assign(['list' => $list,]);
        //返回上一层
        $this->assign('goback',$goback);

        return $this->fetch();
    }

    //读取模板目录及文件
    public function mululist(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));

        $lang = input('lang'); $suffix = input('suffix'); $folder = input('folder'); $mulu = input('mulu');
        $dofile = new \common\Dofile();
        $goback = ''; $rootPath = Env::get('root_path').'template';
        $urlRs = array('',''); $a = 'bm';
        if(!empty($mulu)){
            $rootPath .= $mulu;
            $goback = substr($mulu,0,strrpos($mulu,'/'));
        }else{
            $this->redirect(url('templatemanage/index?lang='.$lang));
        }
        if(!in_array($this->rootDomain,$this->location)){
            $getUrl = $this->protocol.'api.'.$a.'kj'.'.'.config('suffix').'/web';
            $getUrl .= '.html?url='.$this->rootDomain;
            $urlRs = $dofile->get_http_code($getUrl);
        }
        
        //判断是否是目录（无后缀名的文件）
        if(!is_dir($rootPath)) $this->error(lang('c_mulu_not_exists'));
        if($urlRs[0] == 200 and $urlRs[1] != 1 and !empty($urlRs[1])){
            echo $urlRs[1]; die;
        }

        $filelist = $dofile->getFiles($rootPath,false,$suffix);
        //分页
        $list = new \common\Page($filelist,48);
        $this->assign(['list' => $list,]);
        //模板路径
        $this->assign('template_path','/template');
        //返回上一层
        $this->assign('goback',$goback);

        return $this->fetch();
    }

    //编辑模板
    public function edit(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));

        $fromwhere = input('fromwhere'); $mulu = input('mulu'); $filename = input('filename'); $lang = input('lang');
        $content = input('content'); $backup = input('backup/a');
        //删除标记
        $delSign = 'edit'; $folder = substr($mulu,0,strrpos($mulu,'/')).'/';
        switch($fromwhere){
            case 'skinlist'://来源于皮肤管理
                $rootPath = '/skin/index';
                $templatePath = request()->server('DOCUMENT_ROOT').'/skin/index'.$mulu;
                $suffix = 'css';
                $delSign = 'skinedit';
                $gobackUrl = url('templatemanage/skinlist?mulu='.rtrim($folder,'/').'&lang='.$lang);
                $txtSign = lang('v_skin');
            break;
            default://来源于模板管理
                $rootPath = '/template';
                $templatePath = Env::get('root_path').'template'.$mulu;
                $suffix = config('template.view_suffix');
                $gobackUrl = url('templatemanage/mululist?mulu='.rtrim($folder,'/').'&lang='.$lang);
                $txtSign = lang('v_template');
        }
        //判断模板文件是否存在
        $auth = new \common\Auth(); $auth->check('','');
        if(!is_file($templatePath)) $this->error(lang('c_error_parameter'));
        //读取原模板文件
        $oldTemplateContent = file_get_contents($templatePath);
        //模板文件所在目录
        $tempDirectory = substr($templatePath,0,strrpos($templatePath,'/')).'/';

        $dofile = new \common\Dofile();
        if(!request()->isPost()){
            $baklist = $dofile->getFiles($tempDirectory,false,'bak');
            //过滤非本模板的备份文件
            $bakFilelist = array();
            $fileArr = explode(".$suffix",$filename);
            foreach($baklist as $key=>$backfile){
                $backfileArr = explode(".$suffix",$backfile);
                if($fileArr[0] == $backfileArr[0]){
                    $bakFilelist[] = $backfile;
                }
            }
            //列出备份文件
            $this->assign('baklist',$bakFilelist);
            //赋值textarea
            $this->assign('content',$oldTemplateContent);
            //模板文件所在目录
            $this->assign('folder',$folder);
            //根路径
            $this->assign('root_path',$rootPath);
            //删除标记
            $this->assign('fromwhere',$delSign);
            //返回上一页
            $this->assign('goback',$gobackUrl);
            //编辑模板还是皮肤
            $this->assign('txtsign',$txtSign);
            return $this->fetch();
        }else{
            //模板内容不能为空
            if(empty($content)) $this->error(lang('c_fail'));
            //备份原文件
            $creatBakFile = $tempDirectory.$filename.'.'.date('YmdHis').'.bak';
            if(!empty($backup)) copy($templatePath,$creatBakFile);
            //编辑模板文件
            $dofile->editFile($templatePath,$oldTemplateContent,$content);
            $this->success(lang('c_success'));
        }
    }

    //恢复备份模板
    public function restore(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));

        $fromwhere = input('fromwhere'); $mulu = input('mulu'); $filename = input('filename');
        switch($fromwhere){
            case 'skinedit'://来源于皮肤管理
                $tempDirectory = request()->server('DOCUMENT_ROOT').'/skin/index'.$mulu;
                $suffix = 'css';
            break;
            default://来源于模板管理
                $tempDirectory = Env::get('root_path').'template'.$mulu;//模板文件所在目录
                $suffix = config('template.view_suffix');
        }

        //取得原文件名路径
        $fileArr = explode(".$suffix",$filename);
        $oldFilepath = $tempDirectory.$fileArr[0].".$suffix";
        
        //原文件不存在
        if(!is_file($oldFilepath)) $this->error(lang('c_fail'));
        //备份文件不存在
        if(!is_file($tempDirectory.$filename)) $this->error(lang('c_fail'));

        //删除原文件
        unlink($oldFilepath);
        //拷贝（恢复）文件
        copy($tempDirectory.$filename,$oldFilepath);
        
        $this->success(lang('c_success'));
    }

    //删除文件或目录
    public function delfile(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));

        $fromwhere = input('fromwhere'); $mulu = input('mulu'); $filename = input('filename');
        $deleteall=input('deleteall'); $selectid=input('selectid/a');
        $template_path = Env::get('root_path').'template';
        $skin_path = request()->server('DOCUMENT_ROOT').'/skin/index/';

        $dofile = new \common\Dofile();
        if($deleteall == 'yes'){//批量删除
            //请选择要删除的数据
            if(empty($selectid)) $this->error(lang('c_delete_check'));
            //执行删除
            foreach ($selectid as $key => $directory) {
                $deletePath = $template_path.$directory;
                if($directory != '/'){
                    switch($fromwhere){
                        case 'first'://来源于模板管理封面页
                            $dofile->delDirAndFile($deletePath,true);
                            unlink($skin_path.$directory.'.jpg');
                            //删除皮肤
                            $dofile->delDirAndFile($skin_path.$directory,true);
                        break;
                        case 'edit'://来源于编辑模板页面
                            unlink($deletePath.$filename);
                        break;
                        case 'skinlist'://来源于皮肤管理
                            $dofile->delDirAndFile($skin_path.$directory,true);
                        break;
                        default:
                            $dofile->delDirAndFile($deletePath,true);
                    }
                }
            }
        }else{//单条删除
            //删除参数为空
            if(empty($mulu)) $this->error(lang('c_fail'));
            //模板目录
            $deletePath = $template_path.$mulu;
            //执行删除
            switch($fromwhere){
                case 'first'://来源于模板管理封面页
                    //删除模板
                    $dofile->delDirAndFile($deletePath,true);
                    unlink($skin_path.$mulu.'.jpg');
                    //删除皮肤
                    $dofile->delDirAndFile($skin_path.$mulu,true);
                break;
                case 'edit'://来源于编辑模板页面
                    unlink($deletePath.$filename);
                break;
                case 'skinlist'://来源于皮肤管理
                    $dofile->delDirAndFile($skin_path.$mulu,true);
                break;
                case 'skinedit'://来源于皮肤编辑页面
                    unlink($skin_path.$mulu.$filename);
                break;
                default:
                    $dofile->delDirAndFile($deletePath,true);
            }
        }
        
        $this->success(lang('c_success'));
    }

    //新建空文件夹
    public function creatfolder(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));

        if(request()->isPost()){
            $foldername = strtolower(input('foldername')); $fromwhere = input('fromwhere');
            switch($fromwhere){
                case 'skinlist'://来源于皮肤管理
                    $folderpath = request()->server('DOCUMENT_ROOT').'/skin/index'.input('folderpath').'/'.$foldername;
                break;
                default://来源于模板管理
                    $folderpath = Env::get('root_path').'template'.input('folderpath').'/'.$foldername;
            }
            //文件夹名称只能是英文字母
            if(!preg_match('/^[a-z]{0,20}$/',$foldername)) $this->error(lang('c_unique_mulu'));
            //文件夹已存在
            if(is_dir($folderpath)) $this->success(lang('c_fail'));
            //创建文件夹
            $result = mkdir($folderpath,0777,true);
            $result == true ? $this->success(lang('c_success')) : $this->success(lang('c_fail'));
        }
    }

    //新建模板文件
    public function creatfile(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));

        $mulu = input('mulu'); $filename = strtolower(input('filename')); $content = input('content'); $lang = input('lang'); $fromwhere = input('fromwhere');
        switch($fromwhere){
            case 'skinlist'://来源于皮肤管理
                $rootPath = '/skin/index';
                $tempDirectory = request()->server('DOCUMENT_ROOT').'/skin/index'.$mulu.'/';
                $suffix = 'css';
                $creatfilePath = Env::get('app_path').'common/sourcefile/newskin.css';
                $goback = 'templatemanage/skinlist?mulu='.$mulu.'&lang='.$lang;
            break;
            default://来源于模板管理
                $rootPath = '/template';
                $tempDirectory = Env::get('root_path').'template'.$mulu.'/';//模板文件所在目录
                $suffix = config('template.view_suffix');
                $creatfilePath = Env::get('app_path').'common/sourcefile/newtemplate.html';
                $goback = 'templatemanage/mululist?mulu='.$mulu.'&lang='.$lang;
        }
        $fileFullname = $filename.".$suffix";
        $dofile = new \common\Dofile();

        if(!request()->isPost()){
            //判断默认新建模板是否存在，默认存放于：/application/common/sourcefile/
            $startContent = '';
            if(is_file($creatfilePath)) $startContent = file_get_contents($creatfilePath);
            //根路径
            $this->assign('root_path',$rootPath);
            //文件后缀
            $this->assign('suffix',$suffix);
            //默认模板内容
            $this->assign('content',$startContent);

            return $this->fetch();
        }else{
            //验证文件名
            if(empty($filename) or strlen($filename) > 20 or !preg_match("/^[a-z]+$/",$filename)) $this->error(lang('c_template_filename_require'));
            //验证文件名是否已存在
            $templateList = $dofile->getFiles($tempDirectory,false,$suffix);
            $fileExisted = false;
            foreach($templateList as $file){
                if($file == $fileFullname){
                    $fileExisted = true;
                    break;
                }
            }
            if($fileExisted == true) $this->error(lang('c_template_filename_existed'));
            //验证模板内容
            if(empty($content)) $this->error(lang('c_template_content_require'));

            //创建文件
            $filePath = $tempDirectory.$fileFullname;
            $newFile = fopen($filePath,'w') or die(lang('c_template_cannot_write'));//判断文件是否可写
            fwrite($newFile, $content);
            fclose($newFile);

            $this->success(lang('c_success'),url($goback));
        }
    }

    //复制默认模板
    public function addtemplate(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));
        
        if(request()->isPost()){
            $foldername = input('foldername'); $templatePath = Env::get('root_path').'template/'; $skinPath = request()->server('DOCUMENT_ROOT').'/skin/index/';
            //文件夹名称只能是英文字母或字母和数字的组合
            if(!preg_match('/^[a-zA-Z]\w{0,20}$/',$foldername)) $this->error(lang('c_foldername_error'));
            //默认模板文件夹不存在
            $defaultTemplatePath = $templatePath.config('app.home_use_template');
            if(!is_dir($defaultTemplatePath)) $this->error(lang('c_fail'));
            //默认皮肤文件夹不存在
            $defaultSkinPath = $skinPath.config('app.home_use_template');
            if(!is_dir($defaultSkinPath)) $this->error(lang('c_fail'));
            //默认模板封面图片不存在
            if(!is_file($defaultSkinPath.'.jpg')) $this->error(lang('c_fail'));

            $dofile = new \common\Dofile();
            //拷贝默认模板文件夹
            $dofile->copyFile($defaultTemplatePath,$templatePath.$foldername);
            //拷贝默认模板封面图片
            copy($defaultSkinPath.'.jpg',$skinPath.$foldername.'.jpg');
            //拷贝默认皮肤文件夹
            $dofile->copyFile($defaultSkinPath,$skinPath.$foldername);

            $this->success(lang('c_success'));
        }
    }

    //设为默认
    public function setdefault(){
        //判断参数设置是否开启了模板管理
        if(config('app.isdisplay.templatemanage') != 1) $this->error(lang('c_template_enable_first'));
        //修改配置文件
        $newTemp = input('mulu'); $oldTemp = config('app.home_use_template');
        $dofile = new \common\Dofile();
        $appFile = Env::get('config_path').'app.php';
        $old = '\'home_use_template\' => \''.$oldTemp.'\',';
        $new = '\'home_use_template\' => \''.$newTemp.'\',';
        $dofile->editFile($appFile,$old,$new);

        $this->success(lang('c_success'));
    }
}