<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\common\model;
use think\Model;
use think\Db;

class Guestbook extends Model{
    protected $insert = ['userid','attvalue','addtime','lang','parentid'];

    //语言
    protected function setLangAttr(){
        return request()->module();
    }

    //父级ID
    protected function setParentidAttr(){
        $parentid = input('id');
        if(empty(input('id'))) $parentid = 0;
        return $parentid;
    }

    //日期
    protected function setAddtimeAttr(){
        return time();
    }

    //用户ID
    protected function setUseridAttr(){
        $userid = '';
        if(session('?userid')) $userid = session('userid');
        return $userid;
    }

    //留言属性
    protected function setAttvalueAttr(){
        $data['attvalue'] = '';
        $attWhere[] = ['tabledir','=','guestbook']; $attWhere[] = ['lang','=',request()->module()];
        $attributeData = Db::name('attribute')->where($attWhere)->order('sequence desc')->select();
        foreach ($attributeData as $key => $attRs) {
            $title = str_replace('*', '', $attRs['title']);
            $postAttValue = input("attvalue".$key."/a");
            $attvalueNum = count($postAttValue);
            if(!empty($postAttValue)){
                for($j=0;$j<$attvalueNum;$j++){
                    if($j < $attvalueNum-1){
                        if(strpos($data['attvalue'],$title.'：') !== false){
                            $data['attvalue'] .= $postAttValue[$j];
                        }else{
                            $data['attvalue'] .= $title.'：'.$postAttValue[$j].'、';
                        }
                    }else{
                        if(strpos($data['attvalue'],$title.'：') !== false){
                            $data['attvalue'] .= $postAttValue[$j].'<br>';
                        }else{
                            $data['attvalue'] .= $title.'：'.$postAttValue[$j].'<br>';
                        }
                    }
                }
            }
        }
        if(!empty($data['attvalue'])){
            $data['attvalue'] = mb_substr($data['attvalue'], 0, mb_strlen($data['attvalue']) - 4);
        }
        return $data['attvalue'];
    }

    /**我的留言
    * @userid 用户ID
    * @parentid 父级ID
    * @signid 1已回复2处理中3待回复4已查看5已评价9已删除，大于9就是删除时间戳
    * @keyword 查询关键词
    */
    static function myguestbook($userid,$parentid=0,$signid=9,$keyword=''){
        $keyword = trim($keyword);
        $where[] = ['userid','=',$userid];
        $where[] = ['parentid','=',$parentid];
        if($signid > 8){//已软删除
            $where[] = ['signid','<','9'];
        }else{
            $where[] = ['signid','=',$signid];
        }
        $pageParam['query']['userid'] = $userid;
        $pageParam['query']['parentid'] = $parentid;
        $pageParam['query']['signid'] = $signid;
        $pageParam['query']['keyword'] = $keyword;
        $rs = Db::name('guestbook')->where($where)->where('title|content','like',"%$keyword%")->order('addtime desc')->paginate(15,false,$pageParam);
        return $rs;
    }

    //新增编辑
    static function edit($id){
        if($id>0){//编辑
            $guestbook = Guestbook::get($id);
            $result = $guestbook->allowField(true)->save(input('post.'),['id'=>$id]);
        }else{//新增
            $guestbook = new Guestbook;
            $result = $guestbook->allowField(true)->save(input('post.'));
            //如果是回复，则更新原留言状态为3待回复
            if(!empty(input('id'))){
                Db::name('guestbook')->where('id',input('id'))->setField('signid',3);
            }
        }
        return $guestbook->id;
    }
}