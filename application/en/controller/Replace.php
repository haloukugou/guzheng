<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\en\controller;
use think\Controller;
use think\Db;

class Replace extends Controller {

//站内链接
    private $text;
    public function __toString() {return $this->replace();}//返回替换结果
    public function content($text){$this->text=$text;}//获取内容给$text
    private function replace(){ //替换函数
        $this->keywords();
		if (empty($this->matches)){
			return $this->text;
		}
		foreach ($this->matches as $k=>$v){
			$this->keywords[$k] = $v['keyword'];
		}
        $pattern = join('|', $this->keywords);
        $pattern ="/((?<!<))($pattern)(?![^<>]*(?:>|<\/a>))/";
        return preg_replace_callback($pattern,array($this, 'callback'),$this->text,5);//替换前5个
    }

    private function callback($matches) { //正则替换回调函数
        global $log; //替换记录，替换过则不在进行相同替换
        if(is_array($matches[2])){
        	return $matches[0];
		}
        $log[] = $matches[2];
		$linkurl = $this->matches[array_search($matches[2], $this->keywords)]['linkurl'];
       	return "<a href=$linkurl>$matches[2]</a>";
    }

    private function keywords(){ //查找关键词
        $Keywords = Db::name("keywordlink");
        $Keywords = $Keywords->where("linkurl<>''")->order('sequence desc')->limit(2000)->select();
		$m = [];
        foreach ($Keywords as $key => $value) {
            if (strpos($this->text,$value['keyword'])){ //内容中包含关键词存入数组
                $m[$value['id']]['linkurl'] = $value['linkurl'];
				$m[$value['id']]['keyword'] = $value['keyword'];
            }
		}
		krsort($m);//对数组进行逆向排序，最长关键词优先替
        $this->matches = $m;
    }
}