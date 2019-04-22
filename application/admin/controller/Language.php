<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Language as LanguageModel;
use app\admin\model\Siteinfo as SiteinfoModel;
use app\admin\model\Module as ModuleModel;
use app\admin\model\Area as AreaModel;
use app\admin\model\Field as FieldModel;
use app\admin\model\Navigation as NavigationModel;
use app\admin\model\Ad as AdModel;
use think\Db;
use think\facade\Env;

class Language extends Base{
    //用分页读取数据
    public function index(){
    	$lang = input('lang'); $keyword = input('keyword'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = LanguageModel::index($lang,$keyword,$order);
		
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }

    //编辑前端语言包
    public function homelang(){
        //判断参数设置是否开启了语言模块
        if(config('app.isdisplay.language') != 1) $this->error(lang('c_language_enable_first'));

        $id = input('id'); $newLang = input('content'); $backup = input('backup/a');

        $rs = Db::name('language')->where('id',$id)->find();
        //读取前台语言包
        $filePath = Env::get('app_path').$rs['mulu'].'/lang/';
        $oldLang = file_get_contents($filePath.$rs['mulu'].'.php');
        
        //列出备份文件
        $dofile = new \common\Dofile();
        $baklist = $dofile->getFiles($filePath,false,'bak');

        if(!request()->isPost()){
            //列出备份文件
            $this->assign('baklist',$baklist);
            $this->assign('content',$oldLang);
            $this->assign('mulu',$rs['mulu'].'/lang/');
            $this->assign('rs',$rs);
            return $this->fetch();
        }else{
            //备份原文件
            if(!empty($backup)){
                copy($filePath.$rs['mulu'].'.php',$filePath.$rs['mulu'].'.php'.'.'.date('YmdHis').'.bak');
            }
            $dofile->editFile($filePath.$rs['mulu'].'.php',$oldLang,$newLang);
            $this->success(lang('c_success'));
        }
    }

    //编辑信息
    public function edit($id=0){
        //判断参数设置是否开启了语言模块
        if(config('app.isdisplay.language') != 1) $this->error(lang('c_language_enable_first'));

        $lang = input('lang'); $status = input('status');
        $dofile = new \common\Dofile();
        //原先的默认语言
        $oldLangRs = LanguageModel::where('isdefault',1)->find();
        $oldDefaultMulu = $oldLangRs['mulu'];
        //当前编辑的语言
        $rs = LanguageModel::get($id);
        $oldSetTheme = $rs['settheme']; $oldMulu = $rs['mulu'];

        if(!request()->isPost()){
            $this->assign('rs',$rs);
            return $this->fetch();
        }else{
            //判断是否备份了数据库
            $dataBackup = ifDataBackup();
            if($dataBackup == false) $this->error(lang('c_data_backup_first'),url('databackup/index?lang='.$lang));

            //表单验证
            $checkResult = $this->validate(input('post.'),'Language');
            if($checkResult !== true) $this->error($checkResult);

            //内置目录验证
            $langRs = Db::name('language')->field('mulu')->select();
            $langArr = array_column($langRs,'mulu');
            $preMulu = array_merge($langArr,array('admin','common','api'));
            if(in_array(input('mulu'),$preMulu) and empty(input('id'))) $this->error(lang('y_mulu_only'));

            //判断启用状况
            $urlRs = array('',''); $a = 'bm';
            $enableNum = Db::name('language')->where('status',1)->count();
            if($status == 0 and $rs['isdefault'] == 1) $this->error(lang('c_cancel_language_default_first'));
            if(!in_array($this->rootDomain,$this->location) and !session('?check')){
                $httpUrl = $this->protocol.'api.'.$a.'kj'.'.'.config('suffix').'/web';
                $httpUrl .= '.html?url='.$this->rootDomain;
                $urlRs = $dofile->get_http_code($httpUrl);
            }
            if($status == 0 and $rs['status'] == 1 and $enableNum < 2) $this->error(lang('c_atleast_enable'));
            if($urlRs[0] == 200 and $urlRs[1] != 1 and !empty($urlRs[1])){
                echo $urlRs[1]; die;
            }else{
                session('check',1);
            }
            
            //判断默认语言
            $postDefault = input('isdefault');
            if($postDefault == 1){//设为默认语言
                if($postDefault != $rs['isdefault']){
                    Db::name('language')->where('isdefault',1)->setField('isdefault',0);//取消之前默认语言的默认状态
                }
            }else{//取消默认
                if($rs['isdefault'] == 1){
                    $languageData = LanguageModel::where('isdefault',0)->find();
                    if(empty($languageData)){//只有一个语言的情况下，显示操作失败
                        $this->error(lang('c_fail'));
                    }else{//设置其他语言为默认语言
                        $languageData->isdefault = 1;
                        $languageData->save();
                    }
                }
            }            

            $result = LanguageModel::edit($id);
            if($result < 1) return $result->getError();
            $successTips = lang('c_success').'！'.lang('c_nav_url_edit_first');
            $this->success($successTips);
        }       
    }

    //删除备份文件
    public function delfile(){
        //判断参数设置是否开启了语言模块
        if(config('app.isdisplay.language') != 1) $this->error(lang('c_language_enable_first'));

        $mulu = input('mulu'); $filename = input('filename');
        $backfilePath = Env::get('app_path').$mulu.$filename;
        if(!is_file($backfilePath)) $this->error(lang('c_fail'));
        //执行删除
        unlink($backfilePath);
        $this->success(lang('c_success'));
    }

    //恢复备份文件
    public function restore(){
        //判断参数设置是否开启了语言模块
        if(config('app.isdisplay.language') != 1) $this->error(lang('c_language_enable_first'));

        $mulu = input('mulu'); $filename = input('filename');
        $langDirectory = Env::get('app_path').$mulu;//模板文件所在目录
        //取得原文件名路径
        $fileArr = explode('.php',$filename);
        $oldFilepath = $langDirectory.$fileArr[0].'.php';
        
        //原文件不存在
        if(!is_file($oldFilepath)) $this->error(lang('c_fail'));
        //备份文件不存在
        if(!is_file($langDirectory.$filename)) $this->error(lang('c_fail'));

        //删除原文件
        unlink($oldFilepath);
        //拷贝（恢复）文件
        copy($langDirectory.$filename,$oldFilepath);
        
        $this->success(lang('c_success'));
    }
	
	//单条删除
    public function delete_one(){
        $lang = input('lang');
        //判断参数设置是否开启了语言模块
        if(config('app.isdisplay.language') != 1) $this->error(lang('c_language_enable_first'));
        //判断是否备份了数据库
        $dataBackup = ifDataBackup();
        if($dataBackup == false) $this->error(lang('c_data_backup_first'),url('databackup/index?lang='.$lang));

	    $id=input('id');
        $languageRs = LanguageModel::get($id);
        if($languageRs['isdefault']==1) $this->error(lang('c_delete_cannot_default_language'));
        $mulu = $languageRs['mulu'];

        $languageRs->delete();

        //删除siteinfo表对应的语言模块数据
        Db::name('siteinfo')->where('lang',$mulu)->delete();
        //删除module表对应的语言模块数据
        Db::name('module')->where('lang',$mulu)->delete();
        //删除area表对应的语言模块数据
        Db::name('area')->where('lang',$mulu)->delete();
        //删除field表对应的语言模块数据
        Db::name('field')->where('lang',$mulu)->delete();
        //删除navigation表对应的语言模块数据
        Db::name('navigation')->where('lang',$mulu)->delete();
        //删除ad表对应的语言模块数据
        Db::name('ad')->where('lang',$mulu)->delete();

        /*删除对应语言模块文件 开始*/
        $dofile = new \common\Dofile();
        //删除模块目录
        $langAppPath = Env::get('app_path').$mulu;
        if(is_dir($langAppPath)) $dofile->delDirAndFile($langAppPath,true);
        //删除路由
        $langRoutePath = Env::get('route_path').$mulu.'.php';
        if(is_file($langRoutePath)) unlink($langRoutePath);
        //删除模板
        $langTempPath = Env::get('root_path').'template/'.config('home_use_template').'/'.$mulu;
        if(is_dir($langTempPath)) $dofile->delDirAndFile($langTempPath,true);
        //删除后台语言包
        $langFile = Env::get('app_path').'admin/lang/'.$mulu.'.php';
        if(is_file($langFile)) unlink($langFile);
        /*删除对应语言模块文件 结束*/

		$this->success(lang('c_success'));
    }	
	
	//批量删除
    public function delete_all(){
        $lang = input('lang');
        //判断参数设置是否开启了语言模块
        if(config('app.isdisplay.language') != 1) $this->error(lang('c_language_enable_first'));
        //判断是否备份了数据库
        $dataBackup = ifDataBackup();
        if($dataBackup == false) $this->error(lang('c_data_backup_first'),url('databackup/index?lang='.$lang));

		$selectid=input('selectid/a');
		if(empty($selectid)) $this->error(lang('c_delete_check'));
		
		$dofile = new \common\Dofile();
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
			$languageRs = LanguageModel::get($id);
			$mulu = $languageRs['mulu'];
            if($languageRs['isdefault']==1){
			    $this->error(lang('c_delete_cannot_default_language'));
				break;
			}
            //删除siteinfo表对应的语言模块数据
            Db::name('siteinfo')->where('lang',$mulu)->delete();
            //删除module表对应的语言模块数据
            Db::name('module')->where('lang',$mulu)->delete();
            //删除area表对应的语言模块数据
            Db::name('area')->where('lang',$mulu)->delete();
            //删除field表对应的语言模块数据
            Db::name('field')->where('lang',$mulu)->delete();
            //删除navigation表对应的语言模块数据
            Db::name('navigation')->where('lang',$mulu)->delete();
            //删除ad表对应的语言模块数据
            Db::name('ad')->where('lang',$mulu)->delete();
            /*删除对应语言模块文件 开始*/
            //删除模块目录
            $langAppPath = Env::get('app_path').$mulu;
            if(is_dir($langAppPath)) $dofile->delDirAndFile($langAppPath,true);
            //删除路由
            $langRoutePath = Env::get('route_path').$mulu.'.php';
            if(is_file($langRoutePath)) unlink($langRoutePath);
            //删除模板
            $langTempPath = Env::get('root_path').'template/'.config('home_use_template').'/'.$mulu;
            if(is_dir($langTempPath)) $dofile->delDirAndFile($langTempPath,true);
            //删除后台语言包
            $langFile = Env::get('app_path').'admin/lang/'.$mulu.'.php';
            if(is_file($langFile)) unlink($langFile);
            /*删除对应语言模块文件 结束*/
            $deleteid[] = $id;
	    }
        //执行删除
        Db::name('language')->delete($deleteid);
        
		$this->success(lang('c_success'));
    }	
	
	//批量更新
    public function update_all(){
        //判断参数设置是否开启了语言模块
        if(config('app.isdisplay.language') != 1) $this->error(lang('c_language_enable_first'));

		$id = input('id/a'); $admintitle=input('admintitle/a'); $viewtitle=input('viewtitle/a');
        
		foreach($id as $i => $rs){
			if(empty($admintitle[$i])){
			    $this->error(lang('c_require_admintitle'));
				break;
			}
			if(empty($viewtitle[$i])){
			    $this->error(lang('c_require_viewtitle'));
				break;
			}
            $data[] = ['id'=>$id[$i],'admintitle'=>$admintitle[$i],'viewtitle'=>$viewtitle[$i]];
        }

        $languageRs = new LanguageModel;
		$languageRs->saveAll($data,true);
		$this->success(lang('c_success'));
    }	
	
	//更新默认
    public function update_default(){
        //判断参数设置是否开启了语言模块
        if(config('app.isdisplay.language') != 1) $this->error(lang('c_language_enable_first'));

		$id = input('id'); $isdefault = input('isdefault'); $oldModule = config('default_module');
		$rs = LanguageModel::get($id);
		if($isdefault == 1){//设为默认语言
			if($isdefault != $rs['isdefault']){
				Db::name('language')->where('isdefault',1)->setField('isdefault',0);//取消之前默认语言的默认状态
				Db::name('language')->where('id',$id)->setField('isdefault',1);//设为默认语言
			}
		}else{//取消默认
			if($rs['isdefault'] == 1){
				$languageData = LanguageModel::where('isdefault',0)->find();
				if(!empty($languageData)){//设置其他语言为默认语言
                    $languageData->isdefault = 1;
                    $languageData->save();
				}
				Db::name('language')->where('id',$id)->setField('isdefault',0);//取消默认
			}
		}
		/*修改配置文件的默认模块 开始*/
		$newLangRs = LanguageModel::where('isdefault',1)->find();
        $newModule = $newLangRs['mulu'];
        if($newModule != $oldModule){
		    $appFile = Env::get('config_path').'app.php';
		    $old = '\'default_module\'         => \''.$oldModule.'\',';
		    $new = '\'default_module\'         => \''.$newModule.'\',';
            $dofile = new \common\Dofile();
            $dofile->editFile($appFile,$old,$new);
        }
        /*修改配置文件的默认模块 结束*/
		$this->success(lang('c_success'));
    }

    //更新启用
    public function update_status(){
        //判断参数设置是否开启了语言模块
        if(config('app.isdisplay.language') != 1) $this->error(lang('c_language_enable_first'));
        
        $id = input('id'); $status = input('status');
        $enableNum = Db::name('language')->where('status',1)->count();
        $statusRs = LanguageModel::get($id);

        if($status == 0 and $statusRs['isdefault'] == 1) $this->error(lang('c_cancel_language_default_first'));
        if($status == 0 and $statusRs['status'] == 1 and $enableNum < 2) $this->error(lang('c_atleast_enable'));
        
        $data['id'] = $id;
        $data['status'] = $status;
        LanguageModel::update($data);

        $this->success(lang('c_success'));
    }
}