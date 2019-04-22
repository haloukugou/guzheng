<?php
// +----------------------------------------------------------------------
// | 有理想的地方，地狱都是天堂。
// +----------------------------------------------------------------------
// | Copyright @   版权所有
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\common\behavior;
use Config;

class SetTheme{
    public function moduleInit() {
        $module = request()->module();
        /*自动切换主题、皮肤、电脑端和移动端 开始*/
        if($module != 'admin'){//如果不是后台模块
            $default_view_path = config('template.view_path').config('app.home_use_template').'/'.$module.'/';
            $equipment = 'pc';
            //来访设备是移动端
            if (request()->isMobile() and config('template.settheme') == 0) $equipment = 'mobile';
            //重置模板路径
            Config::set('template.view_path', $default_view_path . $equipment . '/');
            //重置皮肤路径
            //tp5.1.14起动态配置模板路径改变了
            //Config::set('template.tpl_replace_string.__PUBLIC__', config('template.tpl_replace_string.__PUBLIC__').'/'.config('app.home_use_template'));
        }
        /*自动切换主题、皮肤、电脑端和移动端 结束*/
    }
}