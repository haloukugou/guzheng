<?php
// +----------------------------------------------------------------------
// | 不要怀念哥，哥只是个搬运工 ———— dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use \tp5er\Backup;
use think\facade\Session;

class Databackup extends Base{
    //备份文件列表
    public function index(){
        //列出备份文件
        $db = new Backup(config('dataconfig'));
        $this->assign('list',$db->fileList());
        //罗列数据表
        $this->assign('tablelist',$db->dataList());
        //调用模板
        return $this->fetch();
    }

    //下载备份文件
    public function down($time = 0){
        $db = new Backup(config('dataconfig'));
        $db->downloadFile($time);
    }

    //删除备份文件
    public function del($time = 0){
        $db = new Backup(config('dataconfig'));
        if($db->delFile($time)){
           $this->success(lang('c_success'));
        }else{
            $this->error(lang('c_fail'));
        }
    }

    //备份数据库表
    public function export(){
       $db = new Backup(config('dataconfig'));
       if(request()->isPost()){
           $input=input('post.'); $fileinfo  =$db->getFile();
           //检查是否有正在执行的任务
           $lock = "{$fileinfo['filepath']}backup.lock";
           if(is_file($lock)){
               $this->error(lang('c_data_later'));
           } else {
               //创建锁文件
               file_put_contents($lock,time());
           }
           // 检查备份目录是否可写
           is_writeable($fileinfo['filepath']) || $this->error(lang('c_data_nodir'));

           //缓存锁文件
           session::set('lock', $lock);
           //缓存备份文件信息
           session::set('backup_file', $fileinfo['file']);
           //缓存要备份的表
           session::set('backup_tables', $input['tables']);
           //创建备份文件
           if(false !== $db->Backup_Init()){
               $this->success(lang('c_data_begin_success'),'',['tab'=>['id' => 0, 'start' => 0]]);
           }else{
               $this->error(lang('c_data_begin_fail'));
           }
       }else if(request()->isGet()){
           $tables =  session::get('backup_tables'); $file=session::get('backup_file');
           $id=input('id'); $start=input('start');
           $start= $db->setFile($file)->backup($tables[$id], $start);
           if(false === $start){
               $this->error(lang('c_data_error'));
           }else if(0 === $start){
               if(isset($tables[++$id])){
                   $tab = array('id' => $id, 'start' => 0);
                   $this->success(lang('v_data_end_backup'), '', array('tab' => $tab));
               } else { //备份完成，清空缓存
                   unlink(session::get('lock'));
                   Session::delete('backup_tables');
                   Session::delete('backup_file');
                   $this->success(lang('v_data_end_backup'));
               }
           }
       }else{
           $this->error(lang('c_error_parameter'));
       }
    }
    
    //还原数据库
    public function import($time = 0, $part = null, $start = null){
        $db = new Backup(config('dataconfig'));
        if(is_numeric($time) && is_null($part) && is_null($start)){
            $list  = $db->getFile('timeverif',$time);
            if(is_array($list)){
                session::set('backup_list', $list);
                $this->success(lang('c_data_start'), '', array('part' => 1, 'start' => 0));
            }else{
                $this->error(lang('c_data_fileerror'));
            }
        }else if(is_numeric($part) && is_numeric($start)){
            $list =session::get('backup_list');
            $start = $db->setFile($list)->import($start);
            if(false===$start){
                $this->error(lang('c_data_restore_error'));
            }elseif(0 === $start){
                if(isset($list[++$part])){
                    $data = array('part' => $part, 'start' => 0);
                    $this->success(lang('c_data_restoring')."#{$part}", '', $data);
                }else{
                    session::delete('backup_list');
                    $this->success(lang('c_data_restore_success'));
                }
            }else{
                $data = array('part' => $part, 'start' => $start[0]);
                if($start[1]){
                    $rate = floor(100 * ($start[0] / $start[1]));
                    $this->success(lang('c_data_restoring')."...#{$part} ({$rate}%)", '', $data);
                } else {
                    $data['gz'] = 1;
                    $this->success(lang('c_data_restoring')."#{$part}", '', $data);
                }
                $this->success(lang('c_data_restoring')."#{$part}", '');
            }
        }else{
            $this->error(lang('c_error_parameter'));
        }
    }
}