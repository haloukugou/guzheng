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
use app\admin\model\Product as ProductModel;
use app\admin\model\Sort as SortModel;
use app\admin\model\Area as AreaModel;
use think\Db;
use think\facade\Env;

class Product extends Base{
    //编辑信息
    public function edit($id=0){
		$lang = input('lang'); $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写;
		
		//分类是否存在
        $haveSortWhere['tabledir'] = $tabledir; $haveSortWhere['lang'] = $lang;
        $isSort = Db::name('sort')->where($haveSortWhere)->find();
        if(empty($isSort)) $this->error(lang('c_add_first').lang('v_sort'),url('sort/index?tabledir='.$tabledir.'&lang='.$lang));
        //地区是否存在
        $isArea = Db::name('area')->where('lang',$lang)->find();
        if(empty($isArea)) $this->error(lang('c_add_first').lang('v_area'),url('area/index?lang='.$lang));
		
		$rs = Db::name($tabledir)->where('id',$id)->find();
        $this->assign('rs',$rs);
        if(!request()->isPost()){
			//更多图片更多附件
            $morefilesNum = $morepicsNum = 2;
            if(!empty($rs['morepics'])){
                $img_array=explode('|',$rs['morepics']);
                $this->assign('morepics',$img_array);
                $morepicsNum = count($img_array)-1;
            }
            $this->assign('morepicsNum',$morepicsNum);
            if(!empty($rs['morefileurl'])){
                $file_array=explode('|',$rs['morefileurl']);
                $this->assign('morefileurl',$file_array);
                $morefilesNum = count($file_array)-1;
            }
            $this->assign('morefilesNum',$morefilesNum);

            //分类赋值
			$langWhere['lang'] = $lang;
			$sortWhere['tabledir'] = $tabledir;
            $this->assign('Sort',getChildSort(Db::name('sort')->where($sortWhere)->where($langWhere)->order('sequence desc,id desc')->select()));
			
		    //地区
			$areaArr=json_encode(getAreaArr('Area',0,$lang));
            $this->assign('areaArr',$areaArr);
		
		    //编辑信息时获取地区ID
			$a = ""; $b = ""; $c = ""; $d = "";
            $areaRs =  getParentSort(Db::name('area')->select(),$rs['areaid']);
			foreach($areaRs as $k => $v){
				$abcd = $v['id'];
				switch($k){
                    case 0:
		                $a = $abcd;
                        break;
                    case 1:
		                $b = $abcd;
                        break;
                    case 2:
		                $c = $abcd;
                        break;
                    case 3:
		                $d = $abcd;
                        break;
                }
			}
			$this->assign('a',$a); $this->assign('b',$b); $this->assign('c',$c); $this->assign('d',$d);
			
            //前端详情页模板
            $suffix = config('template.view_suffix');
            $templatePath = Env::get('root_path').'template/'.config('app.home_use_template').'/'.$lang.'/pc/'.strtolower($tabledir).'/';
            $dofile = new \common\Dofile();
            $templateList = $dofile->getFiles($templatePath,false,$suffix);
            $this->assign('viewtemp',$templateList);
            $this->assign('defaulttemp',"view");

            //模块信息
            $moduleWhere['lang'] = $lang; $moduleWhere['tabledir'] = $tabledir;
            $moduleRs = Db::name('module')->where($moduleWhere)->find();
            $this->assign('mRs',$moduleRs);

            //属性列表
            $attWhere[] = ['tabledir','=',$tabledir]; $attWhere[] = ['parentid','=',0]; $attWhere[] = ['lang','=',$lang];
            $this->assign('attlist',Db::name('attribute')->where($attWhere)->order('sequence desc,id desc')->select());

            //规格属性
            $specattWhere[] = ['tabledir','=','Spec']; $specattWhere[] = ['parentid','=',0];
            $specattWhere[] = ['lang','=',$lang]; $specattWhere[] = ['attvalue','=',$tabledir];
            $this->assign('specatt',Db::name('attribute')->where($specattWhere)->order('sequence desc,id desc')->select());

            //标签
            $this->assign('module_tags',explode(PHP_EOL,$moduleRs['tags']));
            $this->assign('tags',explode(PHP_EOL,$rs['tags']));

            //随机初始点击数
            $hits = 1;
            if(strpos($this->navModuleRs['initial_hits'], ',') !== false){
                $initialhitsArr = explode(',', $this->navModuleRs['initial_hits']);
                $hits =  rand($initialhitsArr[0],$initialhitsArr[1]);
            }
            $this->assign('hits',$hits);
            //初始库存
            $stock = 1000000;
            if(!empty($this->navModuleRs['initial_stock']) and is_numeric($this->navModuleRs['initial_stock'])){
                $stock = $this->navModuleRs['initial_stock'];
            }
            $this->assign('stock',$stock);
            //库存单位
            $this->assign('stockunit_arr',explode(PHP_EOL, $this->navModuleRs['stockunit']));

            return $this->fetch();
        }else{
			//表单验证
			$checkResult = $this->validate(input('post.'),$tabledir);
			if($checkResult !== true) $this->error($checkResult);

			$result = ProductModel::edit($tabledir,$id);
			if($result < 1) return $result->getError();
			$this->success(lang('c_success'));
        }		
	}

    //用分页读取数据
    public function index(){
    	$signid = input('signid'); $lang = input('lang'); $field = '*'; $keyword = input('keyword');
        $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写;
        $order = ['id'=>'desc','addtime'=>'desc'];
        if(empty($signid)) $signid = 1;
		$rs = ModuleModel::infoList($tabledir,$lang,20,$field,$keyword,$order,$signid);

        //1上架2下架9已删除，大于9就是删除时间戳
        $this->assign('signid',$signid);

        //模块信息
        $moduleWhere['lang'] = $lang; $moduleWhere['tabledir'] = $tabledir;
        $moduleRs = Db::name('module')->where($moduleWhere)->find();
        $this->assign('mRs',$moduleRs);

		$this->assign('list',$rs);
		$this->assign('total',$rs->total());
		$this->assign('lastPage',$rs->lastPage());
		
        return $this->fetch();
    }

    //批量更新模块表
    public function update_all(){
        $id = input('id/a'); $title = input('title/a'); $sequence = input('sequence/a');
        foreach($id as $i => $rs){
            Db::name('product')->update(['id'=>$id[$i],'title'=>$title[$i],'sequence'=>$sequence[$i]]);
        }
        $this->success(lang('c_success'));
    }
}