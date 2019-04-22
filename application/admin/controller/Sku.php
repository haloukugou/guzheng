<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\admin\controller;
use think\Db;

class Sku extends Base{
    //ajax规格
    public function getsku(){
        $id = input('id'); $attid = input('attid');
        $tabledir = ucfirst(strtolower(input('tabledir')));//强制小写/首字母大写;
        $rs = Db::name($tabledir)->where('id',$id)->find();

        /*sku 开始*/
        //sku价格数量
        $sku_json = array();
        if(!empty($rs['sku_json'])) $sku_json = json_decode($rs['sku_json'], true);

        $sku_ids = $sku_names = "";
        if(!empty($sku_json)){
            foreach ($sku_json as $v) {
                $sku_ids .= $v['id'] . "_";
                $sku_names .= $v['title'] . "_";
            }
        }
        $sku_ids = array_filter(array_unique(explode("_", $sku_ids)));
        $sku_names = array_filter(array_unique(explode("_", $sku_names)));

        $sku_ids_names = array();
        foreach ($sku_ids as $k => $v) {
            $sku_ids_names[$k]['id'] = $v;
            $sku_ids_names[$k]['title'] = $sku_names[$k];
        }

        $skusWhere[] = ['parentid','=',0]; $skusWhere[] = ['attid','=',$attid];
        $skus = Db::name("spec")->field("id,title,spec_sign,is_required")->where($skusWhere)->order("sequence asc")->select();

        foreach ($skus as $k => $v) {
            $subs = Db::name("spec")->field("id,title,spec_value")->where('parentid',$v['id'])->order("sequence asc")->select();
            foreach ($subs as $k2 => $v2) {
                $name2 = getSkuNameInput($v2['id'], $sku_ids_names,'');
                $subs[$k2]['name2'] = $name2 ? $name2 : $v2['title'];
            }
            $skus[$k]['sub'] = $subs;
        }

        $this->assign("rs", $rs);
        $this->assign("skus", $skus);
        $this->assign("sku_ids", implode(",", $sku_ids));
        $this->assign("sku_json", $sku_json);
        /*sku 结束*/

        return view();
    }
}