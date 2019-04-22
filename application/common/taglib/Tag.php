<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\common\taglib;
use think\template\TagLib;
use think\Db;

class Tag extends TagLib{
    //自定义定义标签列表
    protected $tags = [
        // 标签定义： attr 属性列表 close 是否闭合（0开放标签 或者1闭合标签 默认1） alias 标签别名 level 嵌套层次
        //通用循环标签
        'list'     => ['attr' => 'name,table,parentid,union,field,where,limit,order','close' => 1],
        //计算总数标签
        'count'     => ['attr' => 'table,where','close' => 0],
    ];

    /**计算总数标签
    * 模板用法：
      {tag:count table="comment" where="parentid=$id" /}
    * @table 数据表
    * @where 查询条件
    */
    public function tagCount($attr,$content){
        $table = empty($attr['table']) ? 'product' : $attr['table'];
        $where = empty($attr['where']) ? 'id>0' : $attr['where'];
        $parse = '<?php ';
        $parse .= '$result = db("'.$table.'")->where("' . $where . '")->count();';
        $parse .= 'echo $result;';
        $parse .= ' ?>';
        return $parse;
    }

    /**通用循环标签
    * 模板用法：
    * 单张表的情况：
      {tag:list name="newsRs" table="news" where="lang='$lang' and id<>$id and signid=1" limit="4" order="addtime desc"}
          {$newsRs.title}
      {/tag:list}
      两张表的情况：
      {tag:list name="subCommentRs" table="comment|user" field="'*'|['avatar'=>'avatar','nickname']" union="comment.userid=user.id" where="comment.parentid='$commentid'" limit="10" order="comment.addtime desc"}
          {$newsRs.title}
      {/tag:list}
	* @name name
	* @table 数据表
	* @where 查询条件
	* @limit limit查询
	* @order 排序
	*/
    public function tagList($attr,$content){
        $name = empty($attr['name']) ? 'rs' : $attr['name'];
        $table = empty($attr['table']) ? 'product' : $attr['table'];
        $where = empty($attr['where']) ? 'id>0' : $attr['where'];
        $parentid = empty($attr['parentid']) ? 0 : $attr['parentid'];
        $limit = empty($attr['limit']) ? '10' : $attr['limit'];
        $order = empty($attr['order']) ? 'id desc' : $attr['order'];
        $union = empty($attr['union']) ? '' : $attr['union'];
        $field = empty($attr['field']) ? '' : $attr['field'];
        $parse = '<?php ';
        $parse .= '$parentid = '.$parentid.';';
        $tableArr = explode('|',$table);
        $tableNum = count($tableArr);
        //判断有几个表联合查询
        switch ($tableNum) {
            case 1:
                if(!empty($attr['parentid'])){//子级查询
                    $parse .= '$result = Db::name("'.$table.'")->where("' . $where . '")->where(\'parentid\',$parentid)->limit("'.$limit.'")->order("'.$order.'")->select();';
                }else{
                    $parse .= '$result = Db::name("'.$table.'")->where("' . $where . '")->limit("'.$limit.'")->order("'.$order.'")->select();';
                }
                break;
            case 2:
                $fieldArr = explode('|',$field);
                $parse .= '$result = Db::view("'.$tableArr[0].'",'.$fieldArr[0].')->view("'.$tableArr[1].'",'.$fieldArr[1].',"'.$union.'")->where("' . $where . '")->limit("'.$limit.'")->order("'.$order.'")->select();';
                break;
        }
        $parse .= '$__LIST__ = $result;';
        $parse .= ' ?>';
        $parse .= '{volist name="__LIST__" id="' . $name . '"}';
        $parse .= $content;
        $parse .= '{/volist}';
        return $parse;
    }
}