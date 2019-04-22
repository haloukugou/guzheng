<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\cn\controller;
use app\cn\model\Module as ModuleModel;
use app\common\model\Comment as commonModelComment;
use app\common\model\Module as commonModelModule;
use think\Db;

class Product extends Base{
	//封面页
    public function sort(){
    	$lang = request()->module(); $controller = strtolower(request()->controller());
    	//内页banner
        $pageBanner = ''; $pageWhere[] = ['position','=',$controller]; $pageWhere[] = ['att_type','=','banner']; $pageWhere[] = ['lang','=',$lang];
		$adRs = Db::name('ad')->where($pageWhere)->find();
		if(!empty($adRs)) $pageBanner = $adRs['thumb'];
		$this->assign('page_banner',$pageBanner);//内页banner

    	//模块信息
		$moduleWhere[] = ['tabledir','=',$controller]; $moduleWhere[] = ['lang','=',$lang];
		$moduleRs = Db::name('module')->where($moduleWhere)->find();
		//模块未启用则重定向到首页
		if($moduleRs['disabled'] == 0) $this->redirect(request()->root(true));
		$urlroute = $moduleRs['urlroute'];
		$routesign = '-'.$moduleRs['routesign'];
		
		$this->assign('title',$moduleRs['seotitle']);
		$this->assign('keyword',$moduleRs['keyword']);
		$this->assign('description',$moduleRs['description']);

        //模块是否启用相关属性：是否启用价格等
		$isdisplay_array = explode(',',$moduleRs['isdisplay']);
        $this->assign('isdisplay_array',$isdisplay_array);

		//三级分类嵌套循环
		$subWhere[] = ['lang','=',$lang]; $subWhere[] = ['parentid','=',0]; $subWhere[] = ['tabledir','=',ucfirst($controller)];
		$sortlist = sublist('sort',$subWhere,1000,'sequence desc');
		$this->assign('sortlist',$sortlist);

		//模块首页路径
		$module_path = url('/'.$lang.'/'.$urlroute.$routesign.'-1');
		$this->assign('module_path',$module_path);

		//面包屑导航
		$listNav = ModuleModel::listNav('sort',$controller,'',$lang);
		$this->assign('list_nav',$listNav);

		/*右侧内容 开始*/
		$commonModelModule = new commonModelModule;
		$order = ["$controller.sequence"=>'desc',"$controller.addtime"=>'desc'];

		$moduleWhere[] = ['parentid','=',0];
        $list = Db::name('sort')->where($moduleWhere)->select();
        foreach ($list as $key => $sortRs) {
        	$list[$key]['sub'] = commonModelModule::moduleSort($controller,$sortRs['id'],$lang,$order);
        }
        $this->assign('list',$list);
        /*右侧内容 结束*/

        return $this->fetch();
    }

    //列表页
    public function index(){
    	$lang = request()->module(); $controller = strtolower(request()->controller());
		//三级分类嵌套循环
		$subWhere[] = ['lang','=',$lang]; $subWhere[] = ['parentid','=',0]; $subWhere[] = ['tabledir','=',ucfirst($controller)];
		$sortlist = sublist('sort',$subWhere,1000,'sequence desc');
		$this->assign('sortlist',$sortlist);

        //内页banner
        $pageBanner = ''; $pageWhere[] = ['position','=',$controller]; $pageWhere[] = ['att_type','=','banner']; $pageWhere[] = ['lang','=',$lang];
		$adRs = Db::name('ad')->where($pageWhere)->find();
		if(!empty($adRs)) $pageBanner = $adRs['thumb'];
 		
		//模块信息
		$moduleWhere[] = ['tabledir','=',$controller]; $moduleWhere[] = ['lang','=',$lang];
		$moduleRs = Db::name('module')->where($moduleWhere)->find();
		//模块未启用则重定向到首页
		if($moduleRs['disabled'] == 0) $this->redirect(request()->root(true));
        //模块变量
		$title = $moduleRs['seotitle'];
		$keyword = $moduleRs['keyword'];
		$description = $moduleRs['description'];
		$urlroute = $moduleRs['urlroute'];
		$routesign = '-'.$moduleRs['routesign'];
		//模块是否启用相关属性：是否启用价格等
        $isdisplay_array = explode(',',$moduleRs['isdisplay']);
        $this->assign('isdisplay_array',$isdisplay_array);

        //模块首页路径
		$module_path = url('/'.$lang.'/'.$urlroute.$routesign.'-1');
		$this->assign('module_path',$module_path);

        //SEO标题，关键词，描述
		$sortid = input('sortid'); $template = 'index';//列表页模板
		if(!empty($sortid)){
            $seoRs =  Db::name('sort')->where('id',$sortid)->find();
            $title = empty($seoRs['seotitle']) ? $seoRs['title'] : $seoRs['seotitle'];
			$keyword = $seoRs['keyword'];
			$description = $seoRs['description'];
			//内页banner
		    if(!empty($seoRs['thumb'])) $pageBanner = $seoRs['thumb'];
		    //列表页模板
		    $template = $seoRs['listtemp'];
		    //分类URL前缀
		    $urlroute = $seoRs['urlroute'];
		}
		$this->assign('page_banner',$pageBanner);//内页banner
		
		$this->assign('title',$title);
		$this->assign('keyword',$keyword);
		$this->assign('description',$description);
		
		//面包屑导航
		$listNav = ModuleModel::listNav('sort',$controller,$sortid,$lang);
		$this->assign('list_nav',$listNav);
		
		//列表
		$order = ["$controller.sequence"=>'desc',"$controller.addtime"=>'desc'];
		$rs = ModuleModel::index($controller,$sortid,$urlroute,$routesign,'*',$lang,$order,trim(input('keyword')));
		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('last_page',$rs->lastPage());
		
        return $this->fetch($template);
    }

    //详情页
    public function view(){
		$id = input('id'); $lang = request()->module(); $controller = strtolower(request()->controller());
        $rs = ModuleModel::view($controller,$id);
        //信息不存在或已删除
        if(empty($rs) or $rs['signid'] != 1){
			header('HTTP/1.1 301 Moved Permanently');//发出301头部
            header('Location: '.request()->root(true));
		}
        $this->assign('rs',$rs); $this->assign('id',$id);
		$sortid = $rs['sortid'];
		
		//SEO标题
		empty($rs['seotitle']) ? $this->assign('title',$rs['title']) : $this->assign('title',$rs['seotitle']);

		//更新浏览次数
		Db::name($controller)->where('id',$id)->setInc('hits',1);

        //面包屑导航
		$listNav = ModuleModel::listNav('sort',$controller,$sortid,$lang);
		$this->assign('list_nav',$listNav);

		//三级分类嵌套循环
		$subWhere[] = ['lang','=',$lang]; $subWhere[] = ['parentid','=',0]; $subWhere[] = ['tabledir','=',ucfirst($controller)];
		$sortlist = sublist('sort',$subWhere,1000,'sequence desc');
		$this->assign('sortlist',$sortlist);

		//属性
		$this->assign('attribute',json_decode($rs['attvalue'],true));

		//内页banner
        $pageBanner = ''; $pageWhere[] = ['position','=',$controller]; $pageWhere[] = ['att_type','=','banner']; $pageWhere[] = ['lang','=',$lang];
		$adRs = Db::name('ad')->where($pageWhere)->find();
		if(!empty($adRs)) $pageBanner = $adRs['thumb'];
		$sortRs =  Db::name('sort')->where('id',$sortid)->find();
		if(!empty($sortRs['thumb'])) $pageBanner = $sortRs['thumb'];
		$this->assign('page_banner',$pageBanner);
        
        //子类找父类，相关产品的查询条件
        $sortidArr = ""; $sortWhere[] = ['tabledir','=',$controller]; $sortWhere[] = ['lang','=',$lang];
		$sortData = getParentSort(Db::name('sort')->where($sortWhere)->select(),$sortid);
        foreach($sortData as $k => $w){
			$k<count($sortData)-1 ? $sortidArr.=$w['id'].',' : $sortidArr.=$w['id'];
        }
		if(empty($sortidArr)) $sortidArr = '1,1';
		$this->assign('sortidArr',$sortidArr);

		//模块是否启用相关属性：是否启用价格、内链等
		$moduleRs = Db::name('module')->where($sortWhere)->find();
        $isdisplay_array = explode(',',$moduleRs['isdisplay']);
        $this->assign('isdisplay_array',$isdisplay_array);
        //路由标识
        $routesign = '-'.$moduleRs['routesign'];

		//上一篇
	    $preWhere['lang'] = $lang;
	    $previousRs = Db::name($controller)->where($preWhere)->where('id','<',$id)->where('sortid','in',$sortidArr)->where('signid',1)->order('sequence desc,id desc')->limit(1)->find();
	    $pre = empty($previousRs) ? lang('c_nodata') : "<a href=\"".url('/'.$lang.'/'.$previousRs['urlroute'].$routesign.$previousRs['id'])."\">".$previousRs['title']."</a>";
	    $this->assign('pre',$pre);
	    
	    //下一篇
	    $nextWhere['lang'] = $lang;
        $nextRs = Db::name($controller)->where($nextWhere)->where('id','>',$id)->where('sortid','in',$sortidArr)->where('signid',1)->order('sequence desc,id desc')->limit(1)->find();
	    $next = empty($nextRs) ? lang('c_nodata') : "<a href=\"".url('/'.$lang.'/'.$nextRs['urlroute'].$routesign.$nextRs['id'])."\">".$nextRs['title']."</a>";
	    $this->assign('next',$next);

        //详细内容站内链接，SEO
		if(!empty($rs)){
            $Replace = controller("Replace");
            $Replace ->content($rs['content1']);
		    $content1 = in_array('keywordlink',$isdisplay_array) ? $Replace : $rs['content1'];
		}else{
		    $content1 = '';
	    }
		//详细内容
		$this->assign('content1',$content1);
		
		//更多图片
		$this->assign('morepics',explode('|',$rs['morepics']));
		
		//模块首页路径
		$module_path = url('/'.$lang.'/'.$moduleRs['urlroute'].$routesign.'-1');
		$this->assign('module_path',$module_path);

		//评论
		$this->assign('tabledir',$controller);
		$commonModelComment = new commonModelComment;
        $commentlist = commonModelComment::index(1,$controller,0,$id);
		$this->assign('commentlist',$commentlist);

		//规格
		$specWhere[] = ['lang','=',$lang]; $specWhere[] = ['tabledir','=',$controller]; $specWhere[] = ['parentid','=',0]; $specWhere[] = ['attid','=',$rs['attid']];
		$speclist = sublist('spec',$specWhere,20,'sequence desc');
		$this->assign('speclist',$speclist);
		//默认规格
		$this->assign('default_attid_arr',explode('_',$rs['sku_default']));

        return $this->fetch($rs['viewtemp']);
	}
}