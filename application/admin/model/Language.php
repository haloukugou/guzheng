<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\model;
use think\Model;
use think\Db;
use think\facade\Env;

class Language extends Model{
    /**列表
    * @lang 语言
    * @keyword 关键词
    * @order 排序
    */
	static function index($lang,$keyword,$order){
		$keyword = trim($keyword);
		$pageParam['query']['lang'] = $lang;
		$rs = Db::name('language')->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}
	
	//目录
    protected function setMuluAttr(){
	    $mulu=strtolower(input('mulu'));//强制小写
		return $mulu;
    }
	
    //新增编辑
	static function edit($id){
        $id = input('id'); $mulu = input('mulu'); $settheme = input('settheme'); $oldModule = config('default_module');
        $rootPath = Env::get('root_path'); $appPath = Env::get('app_path'); $routePath = Env::get('route_path');
        $rs = Language::get($id);
        $oldSetTheme = $rs['settheme']; $oldMulu = $rs['mulu'];
        $dofile = new \common\Dofile();
        $auth = new \common\Auth(); $auth->check('','');
	    if($id>0){//编辑
			$result = $rs->allowField(true)->save(input('post.'),['id'=>$id]);
		}else{//新增
			$rs = new Language;
			$result = $rs->allowField(true)->save(input('post.'));
            
			/*创建新语言模块 开始*/
			$oldLangRs = Db::name('language')->where('isdefault',1)->find();
    	    $oldDefaultMulu = $oldLangRs['mulu'];
    	    //创建模块目录及文件
    	    $fromModule = $appPath.$oldDefaultMulu;
    	    $toModule = $appPath.$mulu;
    	    $dofile->copyFile($fromModule,$toModule);
    	    //创建语言路由文件
    	    $fromRoute = $routePath.$oldDefaultMulu.'.php';
    	    $toRoute = $routePath.$mulu.'.php';
    	    copy($fromRoute,$toRoute);
    	    //创建语言模板
    	    $fromTemplate = $rootPath.'template/'.config('app.home_use_template').'/'.$oldDefaultMulu;
    	    $toTemplate = $rootPath.'template/'.config('app.home_use_template').'/'.$mulu;
    	    $dofile->copyFile($fromTemplate,$toTemplate);
    	    //创建后台语言包文件
    	    $fromAdminLang = $appPath.'admin/lang/'.$oldDefaultMulu.'.php';
    	    $toAdminLang = $appPath.'admin/lang/'.$mulu.'.php';
    	    copy($fromAdminLang,$toAdminLang);

    	    //往数据表siteinfo里添加模块数据
    	    $siteinfoRs = Db::name('siteinfo')->where('lang',$oldDefaultMulu)->find();
    	    $tableName = config('database.prefix').'siteinfo';
    	    $tableSQL = Db::query("desc $tableName");
    	    $tableFieldList = array();
    	    //读取表siteinfo里的字段
    	    foreach ($tableSQL as $sqlRs){
    	        if($sqlRs['Field'] != 'id'){
    	            if($sqlRs['Field'] != 'lang'){
    	                $tableFieldList[$sqlRs['Field']] = $siteinfoRs[$sqlRs['Field']];
    	            }else{
    	                $tableFieldList[$sqlRs['Field']] = $mulu;
    	            }
    	        }
    	    }
    	    Db::name('siteinfo')->insert($tableFieldList);
    	    //往数据表module里添加模块数据
    	    $moduleRs = Db::name('module')->where('lang',$oldDefaultMulu)->select();
    	    $tableName = config('database.prefix').'module';
    	    $tableSQL = Db::query("desc $tableName");
    	    $tableFieldList = array();
    	    foreach($moduleRs as $k=>$v){
    	        //读取表module里的字段
    	        foreach ($tableSQL as $sqlRs){
    	            if($sqlRs['Field'] != 'id'){
    	                if($sqlRs['Field'] != 'lang'){
    	        	        $tableFieldList[$k][$sqlRs['Field']] = $v[$sqlRs['Field']];
    	                }else{
    	        	        $tableFieldList[$k][$sqlRs['Field']] = $mulu;
    	                }
    	            }
    	        }
    	    }
    	    Db::name('module')->insertAll($tableFieldList);
    	    //往数据表area里添加模块数据
    	    $areaRs = Db::name('area')->where('lang',$oldDefaultMulu)->find();
    	    $tableName = config('database.prefix').'area';
    	    $tableSQL = Db::query("desc $tableName");
    	    $tableFieldList = array();
    	    //读取表area里的字段
    	    foreach ($tableSQL as $sqlRs){
    	        if($sqlRs['Field'] != 'id'){
    	            if($sqlRs['Field'] != 'lang'){
    	                $tableFieldList[$sqlRs['Field']] = $areaRs[$sqlRs['Field']];
    	            }else{
    	                $tableFieldList[$sqlRs['Field']] = $mulu;
    	            }
    	        }
    	    }
    	    Db::name('area')->insert($tableFieldList);
    	    //往数据表field里添加模块数据
    	    $fieldRs = Db::name('field')->where('lang',$oldDefaultMulu)->select();
    	    $tableName = config('database.prefix').'field';
    	    $tableSQL = Db::query("desc $tableName");
    	    $tableFieldList = array();
    	    foreach($fieldRs as $k=>$v){
    	        //读取表field里的字段
    	        foreach ($tableSQL as $sqlRs){
    	            if($sqlRs['Field'] != 'id'){
    	                if($sqlRs['Field'] != 'lang'){
    	        	        $tableFieldList[$k][$sqlRs['Field']] = $v[$sqlRs['Field']];
    	                }else{
    	        	        $tableFieldList[$k][$sqlRs['Field']] = $mulu;
    	                }
    	            }
    	        }
    	    }
    	    Db::name('field')->insertAll($tableFieldList);
    	    //往数据表navigation里添加模块数据
    	    $navWhere['lang'] = $oldDefaultMulu; $navWhere['parentid'] = 0;
    	    $navigationRs = Db::name('navigation')->where($navWhere)->select();
    	    $tableName = config('database.prefix').'navigation';
    	    $tableSQL = Db::query("desc $tableName");
    	    $tableFieldList = array();
    	    foreach($navigationRs as $k=>$v){
    	        //读取表navigation里的字段
    	        foreach ($tableSQL as $sqlRs){
    	            if($sqlRs['Field'] != 'id'){
    	                if($sqlRs['Field'] != 'lang'){
    	        	        if($sqlRs['Field'] != 'linkurl'){
    	        	            $tableFieldList[$k][$sqlRs['Field']] = $v[$sqlRs['Field']];
    	        	        }else{
    	        	            $navLinkurl = str_replace('/'.$oldDefaultMulu.'/','/'.$mulu.'/',$v['linkurl']);
    	        	            $tableFieldList[$k][$sqlRs['Field']] = $navLinkurl;
    	        	        }
    	                }else{
    	        	        $tableFieldList[$k][$sqlRs['Field']] = $mulu;
    	                }
    	            }
    	        }
    	    }
    	    Db::name('navigation')->insertAll($tableFieldList);
    	    //往数据表ad里添加模块数据
    	    $adRs = Db::name('ad')->where('lang',$oldDefaultMulu)->select();
    	    $tableName = config('database.prefix').'ad';
    	    $tableSQL = Db::query("desc $tableName");
    	    $tableFieldList = array();
    	    foreach($adRs as $k=>$v){
    	        //读取表ad里的字段
    	        foreach ($tableSQL as $sqlRs){
    	            if($sqlRs['Field'] != 'id'){
    	                if($sqlRs['Field'] != 'lang'){
    	        	        if($sqlRs['Field'] != 'linkurl'){
    	        	            $tableFieldList[$k][$sqlRs['Field']] = $v[$sqlRs['Field']];
    	        	        }else{
    	        	            $adLinkurl = str_replace('/'.$oldDefaultMulu.'/','/'.$mulu.'/',$v['linkurl']);
    	        	            $tableFieldList[$k][$sqlRs['Field']] = $adLinkurl;
    	        	        }
    	                }else{
    	        	        $tableFieldList[$k][$sqlRs['Field']] = $mulu;
    	                }
    	            }
    	        }
    	    }
    	    Db::name('ad')->insertAll($tableFieldList);
            /*创建新语言模块 结束*/
		}

        /*修改前端配置文件：PC和移动端是否共用模板 开始*/
        $moduleAppFile = $appPath.$mulu.'/config/'.'template.php';
        if($oldSetTheme != $settheme and file_exists($moduleAppFile)){
            $oldSetThemeStr = '\'settheme\' => \''.$oldSetTheme.'\',';
            $newSetThemeStr = '\'settheme\' => \''.$settheme.'\',';
            $dofile->editFile($moduleAppFile,$oldSetThemeStr,$newSetThemeStr);
        }
        /*修改前端配置文件：PC和移动端是否共用模板 结束*/

        /*修改配置文件的默认模块 开始*/
        $newLangRs = Db::name('language')->where('isdefault',1)->find();
        $newModule = $newLangRs['mulu'];
        if($newModule != $oldModule){
            $appFile = Env::get('config_path').'app.php';
            $old = '\'default_module\'         => \''.$oldModule.'\',';
            $new = '\'default_module\'         => \''.$newModule.'\',';
            $dofile->editFile($appFile,$old,$new);
        }
        /*修改配置文件的默认模块 结束*/

        //编辑状态下，如果改变了语言目录，则重命名语言目录名称等
        if(!empty($id) and $oldMulu != $mulu){
            rename($appPath.$oldMulu,$appPath.$mulu);//重命名模块目录
            rename($rootPath.'template/'.config('app.home_use_template').'/'.$oldMulu,$rootPath.'template/'.config('app.home_use_template').'/'.$mulu);//重命名模板目录
            rename($routePath.$oldMulu.'.php',$routePath.$mulu.'.php');//重命名路由文件
            rename($appPath.'admin/lang/'.$oldMulu.'.php',$appPath.'admin/lang/'.$mulu.'.php');//重命名后台语言包
            //更新siteinfo表里的lang字段
            Db::name('siteinfo')->where('lang',$oldMulu)->setField('lang',$mulu);
            //批量更新module表里的lang字段
            Db::name('module')->where('lang',$oldMulu)->setField('lang',$mulu);
            //更新area表里的lang字段
            Db::name('area')->where('lang',$oldMulu)->setField('lang',$mulu);
            //更新field表里的lang字段
            Db::name('field')->where('lang',$oldMulu)->setField('lang',$mulu);
            //更新navigation表里的lang字段
            Db::name('navigation')->where('lang',$oldMulu)->setField('lang',$mulu);
            //更新navigation表里的linkurl字段
            $navigationArr = Db::name('navigation')->where('lang',$oldMulu)->select();
            foreach ($navigationArr as $navRs) {
                if(strpos($navRs['linkurl'],"/$oldMulu/") !== false){
                    $linkurl = str_replace("/$oldMulu/","/$mulu/",$navRs['linkurl']);
                    Db::name('navigation')->where('linkurl',$navRs['linkurl'])->setField('linkurl',$linkurl);
                }
            }
            //更新ad表里的lang字段
            Db::name('ad')->where('lang',$oldMulu)->setField('lang',$mulu);
        }

        //如果修改了原模块目录或者是新增语言模块，则修改相关文件的语言标识，重命名语言文件 开始*/
        if(empty($id) or $oldMulu != $mulu){
            $editMulu = $appPath.$mulu.'/';
            $newFile = $dofile->getFiles($editMulu,true);//取得语言模块下的所有文件
            if(!empty($id)) $oldDefaultMulu = $oldMulu;
            foreach ($newFile as $catalog=>$fileValue){
                if(is_array($fileValue)){
                    foreach($fileValue as $subFileValue){
                        if(!is_array($subFileValue) and $catalog != 'lang'){
                            $dofile->editFile($editMulu.$catalog.'/'.$subFileValue,'\\'.$oldDefaultMulu.'\\','\\'.$mulu.'\\');
                        }else{//如果是语言包，则重命名
                            if(is_file($appPath.$mulu.'/lang/'.$oldDefaultMulu.'.php')){
                                rename($appPath.$mulu.'/lang/'.$oldDefaultMulu.'.php',$appPath.$mulu.'/lang/'.$mulu.'.php');
                            }
                        }
                    }
                }else{
                    $dofile->editFile($editMulu.$fileValue,'\\'.$oldDefaultMulu.'\\','\\'.$mulu.'\\');
                }
            }
            //修改路由文件
            $dofile->editFile($routePath.$mulu.'.php',$oldDefaultMulu.'/',$mulu.'/');
        }
        //如果修改了原模块目录或者是新增语言模块，则修改相关文件的语言标识，重命名语言文件 结束*/

		return $rs->id;
	}
}