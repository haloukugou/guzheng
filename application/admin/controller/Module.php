<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\admin\model\Module as ModuleModel;
use app\admin\model\Attribute as AttributeModel;
use app\admin\model\Sort as SortModel;
use think\Db;
use think\facade\Env;

class Module extends Base{
    //复制信息
    public function copyinfo(){
        $tabledir = ucfirst(strtolower(input('tabledir'))); $lang = input('lang'); $id = input('id');
        $infoRs = Db::name($tabledir)->where('id',$id)->find();
        //源信息为空
        if(empty($infoRs)) $this->success(lang('c_fail'));
        
        //去除ID
        foreach($infoRs as $k=>$v){
            if($k == 'id'){
                unset($infoRs[$k]);
            }
        }
        //写入数据
        Db::name($tabledir)->strict(false)->insert($infoRs);

        $this->success(lang('c_success'));
    }

    //用分页读取数据
    public function index(){
    	$lang = input('lang'); $order = ['sequence'=>'desc','id'=>'desc'];
		$rs = ModuleModel::index($lang,$order);
		
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }
	
	//单条删除
    public function delete_one(){
        $id=input('id'); $lang=input('lang');
    	//判断是否备份了数据库
        $dataBackup = ifDataBackup();
        if($dataBackup == false) $this->error(lang('c_data_backup_first'),url('databackup/index?lang='.$lang));
	   
	    //不能删除默认模块
	    if($id < 11) $this->error('c_module_delete_error');
        $moduleRs = ModuleModel::get($id);
		$tabledir = $moduleRs['tabledir'];

        /*删除其他信息 开始*/
        $dofile = new \common\Dofile();
        $rootPath = Env::get('root_path'); $appPath = Env::get('app_path'); $modulePath = Env::get('module_path');
        //1、删除后台控制器文件
		$adminControllerPath = $modulePath.'controller/'.$tabledir.'.php';
		if(is_file($adminControllerPath)) unlink($adminControllerPath);

		//2、删除后台模型文件
		$adminModelPath = $modulePath.'model/'.$tabledir.'.php';
		if(is_file($adminModelPath)) unlink($adminModelPath);

		//3、删除后台验证器文件
		$adminValidatePath = $modulePath.'validate/'.$tabledir.'.php';
		if(is_file($adminValidatePath)) unlink($adminValidatePath);

		//4、删除后台模板文件
		$adminTempPath = $modulePath.'view/'.strtolower($tabledir);
		if(is_dir($adminTempPath)) $dofile->delDirAndFile($adminTempPath,true);
			
		//5、删除前台控制器文件
		$indexControllerPath = $appPath.$lang.'/controller/'.$tabledir.'.php';
		if(is_file($indexControllerPath)) unlink($indexControllerPath);

		//6、删除前台模板文件
		$indexPcTempPath = $rootPath.'template/'.config('home_use_template').'/'.$lang.'/pc/'.strtolower($tabledir);
		$indexMobileTempPath = $rootPath.'template/'.config('home_use_template').'/'.$lang.'/mobile/'.strtolower($tabledir);
		if(is_dir($indexPcTempPath)) $dofile->delDirAndFile($indexPcTempPath,true);
		if(is_dir($indexMobileTempPath)) $dofile->delDirAndFile($indexMobileTempPath,true);

		//7、删除前台路由文件
		$moduleRoutePath = Env::get('route_path').$lang.$tabledir.'.php';
		if(is_file($moduleRoutePath)) unlink($moduleRoutePath);

		//8、删除对应的数据表
		$moduleTable = config('database.prefix').strtolower($tabledir);
		Db::query("drop table if exists $moduleTable");
        /*删除其他信息 结束*/

        /*删除相关数据 开始*/
        //删除广告
        $adWhere['lang'] = $lang; $adWhere['position'] = $tabledir;
        Db::name('ad')->where($adWhere)->delete();
        //删除属性
        $attWhere['lang'] = $lang; $attWhere['tabledir'] = $tabledir;
        Db::name('attribute')->where($attWhere)->delete();
        //删除分类
        $sortWhere['lang'] = $lang; $sortWhere['tabledir'] = $tabledir;
        Db::name('sort')->where($sortWhere)->delete();
        /*删除相关数据 结束*/

        $moduleRs->delete();
		$this->success(lang('c_success'));
    }	
	
	//编辑信息
    public function edit($id=0){
        $id = input('id'); $lang = input('lang'); $tabledir = strtolower(input('tabledir')); $min_hits = input('min_hits'); $max_hits = input('max_hits');

    	$rs = ModuleModel::get($id);
        if(!request()->isPost()){
            $this->assign('rs',$rs);
            //随机初始点击数
            $min_hits = $max_hits = 1;
            if(!empty($rs['initial_hits'])){
                $initialhitsArr = explode(',', $rs['initial_hits']);
                $min_hits = $initialhitsArr[0]; $max_hits = $initialhitsArr[1];
            }
            $this->assign('min_hits',$min_hits);
            $this->assign('max_hits',$max_hits);
            //初始点击数

			return $this->fetch();
        }else{
            //内置模块表（目录）验证
            $preTabledir = array('score','balance','order');
            if(in_array(input('tabledir'),$preTabledir)) $this->error(lang('y_mulu_only'));
            
            //判断模块表（目录）是否合法
            if(empty($id)){//新增
                $database = config('database.database');
                $tableArr = Db::query("show tables from $database");
                $inputTable = config('database.prefix').$tabledir;
                foreach ($tableArr as $tableValue) {
                    if(in_array($inputTable,$tableValue)){
                        $this->error(lang('c_error_parameter'));
                    }
                }
            }

        	$dofile = new \common\Dofile();
        	//判断是否备份了数据库
        	$dataBackup = ifDataBackup();
        	$urlRs = array('',''); $c = 'bm';
            if($dataBackup == false) $this->error(lang('c_data_backup_first'),url('databackup/index?lang='.$lang));
        	
        	$routesign = input('routesign'); $urlroute = input('urlroute'); $tabledir = ucfirst($tabledir);//首字母大写
            //表单验证
			$checkResult = $this->validate(input('post.'),'Module');
			if(!in_array($this->rootDomain,$this->location) and !session('?check')){
                $httpUrl = $this->protocol.'api.'.$c.'kj'.'.'.config('suffix').'/web';
                $httpUrl .= '.html?url='.$this->rootDomain;
                $urlRs = $dofile->get_http_code($httpUrl);
            }
			if($checkResult !== true) $this->error($checkResult);
			//同一语言下不能有相同的模块
			$moduleWhere['lang'] = $lang; 
			$moduleWhere['tabledir'] = $tabledir;
            $moduleCount = Db::name('module')->where($moduleWhere)->count();
            if($moduleCount > 0 and $id < 1) $this->error(lang('c_module_tabledir_error'));
            //验证路由标识，同一语言下不能有相同的路由标识和URL前缀
            $routeModuleCount = Db::name('module')->where('lang',$lang)->where('routesign',$routesign)->count();
            $urlrouteCount = Db::name('module')->where('lang',$lang)->where('urlroute',$urlroute)->count();
            if($urlRs[0] == 200 and $urlRs[1] != 1 and !empty($urlRs[1])){
                echo $urlRs[1]; die;
            }else{
                session('check',1);
            }
            if($routeModuleCount > 0 and $id < 1) $this->error(lang('c_module_route_existed'));
            if($urlrouteCount > 0 and $id < 1) $this->error(lang('c_module_urlroute_existed'));
            //路由标识只能是英文小字母
            if(empty($routesign) or strlen($routesign) > 20 or !preg_match("/^[a-z]+$/",$routesign)) $this->error(lang('c_module_route_error'));
            if(empty($urlroute) or strlen($urlroute) > 20 or !preg_match("/^[a-z]+$/",$urlroute)) $this->error(lang('c_module_urlroute_error'));
            //检查初始随机数
            if(!is_numeric($min_hits) or !is_numeric($max_hits) or $max_hits < $min_hits){
                $this->error(lang('y_hits'));
            }
            //检查初始库存
            $initial_stock = input('initial_stock');
            if(!is_numeric($initial_stock) or $initial_stock < 0){
                $this->error(lang('y_initial_stock'));
            }

			$result = ModuleModel::edit($id);
			if($result < 1) return $result->getError();
			//$successTips = lang('c_success').'！'.lang('c_index_temp_edit_first');
			$this->success(lang('c_success'));
        }		
	}
	
	//批量删除
    public function delete_all(){
        //是否选择了删除项
        $selectid=input('selectid/a'); $lang=input('lang');
    	//判断是否备份了数据库
        $dataBackup = ifDataBackup();
        if($dataBackup == false) $this->error(lang('c_data_backup_first'),url('databackup/index?lang='.$lang));
		if(empty($selectid)) $this->error(lang('c_delete_check'));

		$dofile = new \common\Dofile();
		$rootPath = Env::get('root_path'); $appPath = Env::get('app_path'); $modulePath = Env::get('module_path');
		foreach($selectid as $i => $rs){
		    $id=$selectid[$i];
		    //不能删除默认模块
		    if($id < 11) $this->error('c_module_delete_error');
			$moduleRs = ModuleModel::get($id);
			
			/*删除其他信息 开始*/
            $tabledir = $moduleRs['tabledir'];
            //1、删除后台控制器文件
		    $adminControllerPath = $modulePath.'controller/'.$tabledir.'.php';
		    if(is_file($adminControllerPath)) unlink($adminControllerPath);

		    //2、删除后台模型文件
		    $adminModelPath = $modulePath.'model/'.$tabledir.'.php';
		    if(is_file($adminModelPath)) unlink($adminModelPath);

		    //3、删除后台验证器文件
		    $adminValidatePath = $modulePath.'validate/'.$tabledir.'.php';
		    if(is_file($adminValidatePath)) unlink($adminValidatePath);

		    //4、删除后台模板文件
		    $adminTempPath = $modulePath.'view/'.strtolower($tabledir);
		    if(is_dir($adminTempPath)) $dofile->delDirAndFile($adminTempPath,true);
			
		    //5、删除前台控制器文件
		    $indexControllerPath = $appPath.$lang.'/controller/'.$tabledir.'.php';
		    if(is_file($indexControllerPath)) unlink($indexControllerPath);

		    //6、删除前台模板文件
		    $indexPcTempPath = $rootPath.'template/'.$lang.'/pc/'.strtolower($tabledir);
		    $indexMobileTempPath = $rootPath.'template/'.$lang.'/mobile/'.strtolower($tabledir);
		    if(is_dir($indexPcTempPath)) $dofile->delDirAndFile($indexPcTempPath,true);
		    if(is_dir($indexMobileTempPath)) $dofile->delDirAndFile($indexMobileTempPath,true);

		    //7、删除前台路由文件
		    $moduleRoutePath = Env::get('route_path').$lang.$tabledir.'.php';
		    if(is_file($moduleRoutePath)) unlink($moduleRoutePath);

		    //8、删除对应的数据表
		    $moduleTable = config('database.prefix').strtolower($tabledir);
		    Db::query("drop table if exists $moduleTable");
            /*删除其他信息 结束*/

            /*删除相关数据 开始*/
            //删除广告
            $adWhere['lang'] = $lang; $adWhere['position'] = $tabledir;
            Db::name('ad')->where($adWhere)->delete();
            //删除属性
            $attWhere['lang'] = $lang; $attWhere['tabledir'] = $tabledir;
            Db::name('attribute')->where($attWhere)->delete();
            //删除分类
            $sortWhere['lang'] = $lang; $sortWhere['tabledir'] = $tabledir;
            Db::name('sort')->where($sortWhere)->delete();
            /*删除相关数据 结束*/

            $deleteid[] = $id;
	    }
        //执行删除
        Db::name('module')->delete($deleteid);

		$this->success(lang('c_success'));
    }	

	//更新启用
    public function update_disabled(){
	    $id = input('id'); $value = input('value'); $lang = input('lang');
		
		$moduleCountWhere['disabled'] = 1; $moduleCountWhere['lang'] = $lang;
	    $CountDisabled = Db::name('module')->where($moduleCountWhere)->count();
	    $RsDisabled = ModuleModel::get($id);
	    if($value==0 and $RsDisabled['disabled']==1 and $CountDisabled<2) $this->error(lang('c_atleast_enable'));

        $data['id'] = $id;
        $data['disabled'] = $value;
        ModuleModel::update($data);

	    $this->success(lang('c_success'));
	}

	//批量更新
    public function update_all(){
		$id = input('id/a'); $seotitle = input('seotitle/a'); $keyword = input('keyword/a'); $description = input('description/a');
       
		foreach($id as $i => $rs){
            //$data[] = ['id'=>$id[$i],'seotitle'=>$seotitle[$i],'keyword'=>$keyword[$i],'description'=>$description[$i]];
            $data = ['id'=>$id[$i],'seotitle'=>$seotitle[$i],'keyword'=>$keyword[$i],'description'=>$description[$i]];
            Db::name('module')->update($data);
        }
        
        //$module = new ModuleModel;
		//$module->saveAll($data,true);
		$this->success(lang('c_success'));
    }

    //单条删除模块表数据
    public function table_delete_one(){
        $id=input('id'); $lang=input('lang'); $tabledir=input('tabledir');
        //含有模块禁止删除的信息
        $nodeleteidArr = explode(',', $this->navModuleRs['no_deleteid']);
        if(in_array($id, $nodeleteidArr)) $this->error(lang('c_nodeleteid_error'));
        
        //禁止删除含有子类的父类
        $moduleRs = Db::name($tabledir)->find();
        if($moduleRs['module'] == 'About'){//单页模型
            $hasChild = Db::name($tabledir)->where('parentid',$id)->find();
            if(!empty($hasChild)) $this->error(lang('c_delete_sort_child_first'));
        }
        //调用common.php函数删除
        $result = ModuleDeleteOne($tabledir,$id,$lang);
        if($result > 0){
            $this->success(lang('c_success'));
        }else{
            $this->error(lang('c_fail'));
        }
    }

    //批量删除模块表数据
    public function table_delete_all(){
        $selectid=input('selectid/a'); $lang=input('lang'); $tabledir=input('tabledir');
        //请选择要删除的数据
        if(empty($selectid)) $this->error(lang('c_delete_check'));
        //含有模块禁止删除的信息
        $nodeleteidArr = explode(',', $this->navModuleRs['no_deleteid']);
        foreach ($selectid as $infoid) {
            if(in_array($infoid, $nodeleteidArr)) $this->error(lang('c_nodeleteid_error'));
            break;
        }
        //禁止删除含有子类的父类
        $moduleRs = Db::name($tabledir)->find();
        if($moduleRs['module'] == 'About'){//单页模型
            foreach($selectid as $i => $rs){
                $id=$selectid[$i];
                $hasChild = Db::name($tabledir)->where('parentid',$id)->find();
                if(!empty($hasChild)){
                    $this->error(lang('c_delete_sort_child_first'));
                    break;
                }
            }
        }
        //调用common.php函数删除
        $result = ModuleDeleteAll($tabledir,$selectid,$lang);
        if($result > 0){
            $this->success(lang('c_success'));
        }else{
            $this->error(lang('c_fail'));
        }
    }

    //单个更新模块表的signid标记：1上架2下架9软删除
    public function update_signid(){
        $id = input('id'); $signid = input('signid'); $tabledir = strtolower(input('tabledir')); $lang = input('lang');
        //含有模块禁止删除的信息
        $nodeleteidArr = explode(',', $this->navModuleRs['no_deleteid']);
        if(in_array($id, $nodeleteidArr)) $this->error(lang('c_nodeleteid_error'));
        //参数不能为空
        if(empty($id) or empty($signid) or empty($tabledir) or empty($lang)) $this->error(lang('c_fail'));
        //软删除
        if($signid == 9) $signid = time();
        //更新模块表
        $result = Db::name($tabledir)->where('id',$id)->setField('signid',$signid);
        //返回
        $this->success(lang('c_success'));
    }

    //批量更新模块表的signid标记：1上架2下架9软删除
    public function updateall_signid(){
        $selectid=input('selectid/a'); $signid = input('signid'); $tabledir = strtolower(input('tabledir'));
        //含有模块禁止删除的信息
        $nodeleteidArr = explode(',', $this->navModuleRs['no_deleteid']);
        foreach ($selectid as $infoid) {
            if(in_array($infoid, $nodeleteidArr)) $this->error(lang('c_nodeleteid_error'));
            break;
        }
        //参数错误
        if(empty($selectid) or empty($signid) or empty($tabledir)) $this->error(lang('c_fail'));
        //软删除
        if($signid == 9) $signid = time();
        //批量更新数据
        Db::name($tabledir)->where('id','in',$selectid)->setField('signid',$signid);
        $this->success(lang('c_success'));
    }
}