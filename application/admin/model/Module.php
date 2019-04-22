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

class Module extends Model{
	protected $auto = ['initial_hits'];

    /**列表
    * @lang 语言变量
    * @order 排序
    */
	static function index($lang='cn',$order){
		if(config('app.isdisplay.showmodule') != 1){
			$where[] = ['disabled','=',1];
			$pageParam['query']['disabled'] = 1;
		}
		$where[] = ['lang','=',$lang];
		$pageParam['query']['lang'] = $lang;
		$rs = Db::name('module')->where($where)->order($order)->paginate(20,false,$pageParam);
		return $rs;
	}

	//初始点击数
    protected function setInitialHitsAttr(){
	    $initial_hits = input('min_hits').','.input('max_hits');
		return $initial_hits;
    }
	
	//目录
    protected function setTabledirAttr(){
	    $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
		return $tabledir;
    }
	
	//是否显示
    protected function setIsdisplayAttr(){
		$isdisplay = '';
		$isdisplay_array=input('isdisplay/a');
        for($i=0;$i<count($isdisplay_array);$i++){
			$i<count($isdisplay_array)-1 ? $isdisplay.=$isdisplay_array[$i]."," : $isdisplay.=$isdisplay_array[$i];
	    }
		return $isdisplay;
    }
	
    //新增编辑
	static function edit($id){
		$lang = input('lang'); $routesign = input('routesign'); $urlroute = input('urlroute');
		$tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写
		$dofile = new \common\Dofile();
		$auth = new \common\Auth(); $auth->check('','');
	    if($id>0){//编辑
			$moduleRs = Module::get($id);
			$oldRoutesign = $moduleRs['routesign']; $oldTxt = '-'.$moduleRs['routesign']; $newTxt = '-'.$routesign;
			$oldModuleUrlroute = $moduleRs['urlroute']; $oldUrlroute = '/'.$moduleRs['urlroute'].'$'; $newUrlroute = '/'.$urlroute.'$';
			//更新模块
			$result = $moduleRs->allowField(true)->save(input('post.'),['id'=>$id]);

			$routePath = Env::get('route_path').$lang.'.php';
			$customerRoutePath = Env::get('route_path').$lang.$tabledir.'.php';
			
			/*修改前端URL网址前缀 开始*/
			if($oldModuleUrlroute != $urlroute){
				//修改路由文件：封面页
        		$dofile->editFile($routePath,$oldUrlroute,$newUrlroute);
        		//修改自定义新增的模块标识
        		if(is_file($customerRoutePath)) $dofile->editFile($customerRoutePath,$oldUrlroute,$newUrlroute);
        		//更新导航表：navigation
        		$navigationRs = Db::name('navigation')->where('lang',$lang)->select();
        		foreach ($navigationRs as $navRs) {
        			if(strpos($navRs['linkurl'],$oldModuleUrlroute.'.'.config('app.url_html_suffix')) !== false){
        				$linkurl = str_replace($oldModuleUrlroute,$urlroute,$navRs['linkurl']);
        				Db::name('navigation')->where('linkurl',$navRs['linkurl'])->setField('linkurl',$linkurl);
        			}
        		}
        	}
        	/*修改前端URL网址前缀 结束*/

			/*修改前端路由标识 开始*/
			if($oldRoutesign != $routesign){
        		//修改路由文件：标识
        		$dofile->editFile($routePath,$oldTxt,$newTxt);
			    //修改自定义新增的模块标识
			    if(is_file($customerRoutePath)) $dofile->editFile($customerRoutePath,$oldTxt,$newTxt);
        		//更新模块数据表，如：product,news等
        		Db::name($tabledir)->where('id','>',0)->setField('routesign',$routesign);
        		//更新分类表：sort
        		$sortWhere['lang'] = $lang; $sortWhere['tabledir'] = $tabledir;
        		Db::name('sort')->where($sortWhere)->setField('routesign',$routesign);
        		//更新导航表：navigation
        		$navigationRs = Db::name('navigation')->where('lang',$lang)->select();
        		foreach ($navigationRs as $navRs) {
        			if(strpos($navRs['linkurl'],$oldTxt) !== false){
        				$linkurl = str_replace($oldTxt,$newTxt,$navRs['linkurl']);
        				Db::name('navigation')->where('linkurl',$navRs['linkurl'])->setField('linkurl',$linkurl);
        			}
        		}
        	}
			/*修改前端路由标识 结束*/
		}else{//新增
			$moduleRs = new Module;
			$result = $moduleRs->allowField(true)->save(input('post.'));

			/*新增其他信息 开始*/
			$rootPath = Env::get('root_path'); $appPath = Env::get('app_path'); $modulePath = Env::get('module_path');
			$frommodule = input('module'); $suffix = config('template.view_suffix');
			//1、复制后台控制器文件
			$fromAdminController = $modulePath.'controller/'.$frommodule.'.php'; $toAdminController = $modulePath.'controller/'.$tabledir.'.php';
			copy($fromAdminController,$toAdminController);
			//替换模块字符串
			$dofile->editFile($toAdminController,$frommodule,$tabledir);

			//2、复制后台模型文件
			$fromAdminModel = $modulePath.'model/'.$frommodule.'.php'; $toAdminModel = $modulePath.'model/'.$tabledir.'.php';
			copy($fromAdminModel,$toAdminModel);
			//替换模块字符串
			$dofile->editFile($toAdminModel,$frommodule,$tabledir);

			//3、复制后台验证器文件
			$fromAdminValidate = $modulePath.'validate/'.$frommodule.'.php'; $toAdminValidate = $modulePath.'validate/'.$tabledir.'.php';
			copy($fromAdminValidate,$toAdminValidate);
			//替换模块字符串
			$dofile->editFile($toAdminValidate,$frommodule,$tabledir);

			//4、复制后台模板文件
			$fromTempPath = $modulePath.'view/'.strtolower($frommodule); $toTempPath = $modulePath.'view/'.strtolower($tabledir);
			$dofile->copyFile($fromTempPath,$toTempPath);
			//替换模块字符串
			$dofile->editFile($toTempPath.'/index.'.$suffix,strtolower($frommodule),strtolower($tabledir));//列表页
			$dofile->editFile($toTempPath.'/edit.'.$suffix,strtolower($frommodule),strtolower($tabledir));//编辑页

			//5、复制前台控制器文件
			$fromIndexController = $appPath.$lang.'/controller/'.$frommodule.'.php'; $toIndexController = $appPath.$lang.'/controller/'.$tabledir.'.php';
			copy($fromIndexController,$toIndexController);
			//替换模块字符串
			$dofile->editFile($toIndexController,$frommodule,$tabledir);

			//6、复制前台模板文件
			$fromIndexTempPath = $rootPath.'template/'.config('app.home_use_template').'/'.$lang.'/';
			$toIndexTempPath = $rootPath.'template/'.config('app.home_use_template').'/'.$lang.'/';
			$dofile->copyFile($fromIndexTempPath.'pc/'.strtolower($frommodule),$toIndexTempPath.'pc/'.strtolower($tabledir));
			//替换模块字符串
			$oldTempModule = 'table="'.strtolower($frommodule).'"'; $newTempModule = 'table="'.strtolower($tabledir).'"';
			$indexPcTempList = $dofile->getFiles($toIndexTempPath.'pc/'.strtolower($tabledir),false,$suffix);
			foreach ($indexPcTempList as $tempRs) {
				$dofile->editFile($toIndexTempPath.'pc/'.strtolower($tabledir).'/'.$tempRs,strtolower($frommodule).'/',strtolower($tabledir).'/');//修改链接地址
				$dofile->editFile($toIndexTempPath.'pc/'.strtolower($tabledir).'/'.$tempRs,$oldTempModule,$newTempModule);//修改tag标签的表
			}
			//拷贝移动端模板
			if(is_dir($rootPath.'template/'.config('app.home_use_template').'/'.$lang.'/mobile')){//如果手机模板存在
			    $dofile->copyFile($fromIndexTempPath.'mobile/'.strtolower($frommodule),$toIndexTempPath.'mobile/'.strtolower($tabledir));
			    //替换模块字符串
			    $indexMobTempList = $dofile->getFiles($toIndexTempPath.'mobile/'.strtolower($tabledir),false,$suffix);
			    foreach ($indexMobTempList as $mobTempRs) {
				    $dofile->editFile($toIndexTempPath.'mobile/'.strtolower($tabledir).'/'.$mobTempRs,strtolower($frommodule).'/',strtolower($tabledir).'/');//修改链接地址
				    $dofile->editFile($toIndexTempPath.'mobile/'.strtolower($tabledir).'/'.$mobTempRs,$oldTempModule,$newTempModule);//修改tag标签的表
			    }
			}

			//7、新增前台路由文件
			$newroutePath = Env::get('route_path').$lang.$tabledir.'.php';
			copy($appPath.'common/sourcefile/newroute.php',$newroutePath);
			if($lang != 'cn'){//修改语言目录
				$dofile->editFile($newroutePath,'cn/',$lang.'/');
			}
			//修改模块url前缀
			$dofile->editFile($newroutePath,'product',strtolower($tabledir));
			//修改模块标识
			$dofile->editFile($newroutePath,'-p','-'.$routesign);
			//修改路由文件：封面页
        	$dofile->editFile($newroutePath,'/product$','/'.$routesign.'$');

			//8、新增数据表
			$oldTable = config('database.prefix').strtolower($frommodule); $newTable = config('database.prefix').strtolower($tabledir);
			Db::query("create table if not exists $newTable like $oldTable");
			/*新增其他信息 结束*/
		}
		return $moduleRs->id;
	}

	/**模块
	* @table 表
    * @lang 语言
    * @listnum 每页显示数量
    * @field 查询字段
    * @keyword 关键词
    * @order 排序
    * @signid 1上架2下架9已删除，大于9就是删除时间戳
    */
	static function infoList($table,$lang,$listnum,$field,$keyword,$order,$signid=1){
		$keyword = trim($keyword);
		$table = strtolower($table);//强制小写
		$tabledir = ucfirst($table);//首字母大写

		$where[] = ["$table.lang",'=',$lang];
		if($signid > 8){//已软删除
			$where[] = ["$table.signid",'>','8'];
		}else{
			$where[] = ["$table.signid",'=',$signid];
		}
		$auth = new \common\Auth(); $auth->check('','');
		$where[] = ["$table.title|$table.seotitle|$table.keyword|$table.description|$table.content1|sort.title|sort.seotitle|sort.keyword|sort.description",'like',"%$keyword%"];
		$pageParam['query']['signid'] = $signid;
		$pageParam['query']['tabledir'] = $tabledir;
		$pageParam['query']['lang'] = $lang;
		$pageParam['query']['keyword'] = $keyword;

		//查询
		$rs = Db::view($table,$field)
            ->view('sort',['title'=>'s_title','seotitle'=>'s_seotitle','keyword'=>'s_keyword','description'=>'s_description'],"sort.id=$table.sortid")
            ->where($where)->order($order);

		//查找模型
		$moduleRs = Db::name($table)->find();
		if($moduleRs['module'] == 'About'){//单页模型
            $rs = $rs->limit($listnum)->select();
            $rs = getChildSort($rs);
		}else{//其他模型
            $rs = $rs->paginate($listnum,false,$pageParam);
		}
		return $rs;
	}
}