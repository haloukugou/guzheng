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

class Filemanage extends Base{
    //用分页读取数据
    public function index(){
        //判断参数设置是否开启了文件管理
        if(config('app.isdisplay.filemanage') != 1) $this->error(lang('c_file_enable_first'));

        $lang = input('lang'); $suffix = input('suffix'); $folder = input('folder'); $mulu = input('mulu');
        $goback = ''; $rootPath = request()->server('DOCUMENT_ROOT').'/uploads';
        if(!empty($mulu)){
            $rootPath .= $mulu;
            $goback = substr($mulu,0,strrpos($mulu,'/'));
        }
        
        //判断是否是目录（无后缀名的文件）
        if(!is_dir($rootPath)) $this->error(lang('c_mulu_not_exists'));

        $dofile = new \common\Dofile();
        $filelist = $dofile->getFiles($rootPath,false,$suffix);
        //分页
        $list = new \common\Page($filelist,48);
        $this->assign(['list' => $list,]);
        //上传路径
        $this->assign('upload_path','/uploads');
        //返回上一层
        $this->assign('goback',$goback);

        return $this->fetch();
    }

    //删除文件或目录
    public function delfile(){
        //判断参数设置是否开启了文件管理
        if(config('app.isdisplay.filemanage') != 1) $this->error(lang('c_file_enable_first'));

        $mulu = input('mulu'); $selectid=input('selectid/a'); $deleteall=input('deleteall');
        $upload_path = request()->server('DOCUMENT_ROOT').'/uploads';

        $dofile = new \common\Dofile();
        if($deleteall == 'yes'){//批量删除
            //请选择要删除的数据
            if(empty($selectid)) $this->error(lang('c_delete_check'));
            //执行删除
            foreach ($selectid as $key => $mulu) {
                $deletePath = $upload_path.$mulu;
                if($mulu != '/') $dofile->delDirAndFile($deletePath,true);
            }
        }else{//单条删除
            //删除参数为空
            if(empty($mulu)) $this->error(lang('c_fail'));
            //不是文件且不是目录
            $deletePath = $upload_path.$mulu;
            if(!is_file($deletePath) and !is_dir($deletePath)) $this->error(lang('c_fail'));
            //执行删除
            $dofile->delDirAndFile($deletePath,true);
        }
        
        $this->success(lang('c_success'));
    }
}