<?php
// +----------------------------------------------------------------------
// | 不要怀念哥，哥只是个修理工
// +----------------------------------------------------------------------
// | ThinkPHP5.1+整合百度编辑器控制器Ueditor1.4.3.3+已经修复百度安全漏洞2018-01-09
// +----------------------------------------------------------------------
// | 开发：dj
// +----------------------------------------------------------------------

namespace app\en\controller;
use think\Controller;
use think\Image;
use think\Request;
use think\facade\Lang;
use think\facade\Env;
use think\facade\Config;

class Ueditor extends Controller{
	public function initialize(){
		//加载配置文件以获取后台配置
		Config::load(Env::get('app_path').'admin'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR."app.php");
		$this->userid = request()->module().'/'.input('userid');
		if(empty($this->userid)) $this->userid= 'anonymity';

		$this->jsonPath = './skin/admin/ueditor/php/config.json';//Ueditor的json文件
		$this->filePath = './uploads/'.$this->userid.'/';//文件保存路径
		$this->fileMaxSize = config('ueditor.fileMaxSize')*1024*1024;//上传文件大小限制，MB
		$this->imageMaxSize = config('ueditor.imageMaxSize')*1024;//上传图片大小限制，KB
		$this->thumbnail = config('ueditor.thumbnail');//是否启用缩略图，1启用，0禁用
		$this->thumb = config('ueditor.thumb');//缩略图方式，1等比例缩放，2缩放后填充，3居中裁剪，4左上角裁剪，5右下角裁剪，6固定尺寸缩放
		$this->thumbwidth = config('ueditor.thumbwidth');//缩略图宽度
		$this->thumbheight = config('ueditor.thumbheight');//缩略图高度
		$this->water = config('ueditor.water');//是否开启水印，1启用，0禁用
 		$this->waterPosition = config('ueditor.waterPosition');//水印位置，1左上角，2上居中，3右上角，4左居中，5正中间，6右居中，7左下角，8下居中，9右下角
		$this->waterText = config('ueditor.waterText');//水印文字
		//水印字体，4.ttf
		$this->waterfont = Env::get('root_path') . 'vendor/'.'topthink/think-captcha/assets/ttfs/'.config('ueditor.waterfont');
		$this->watersize = config('ueditor.watersize');//水印文字大小，阿拉伯数字，默认90
		$this->watercolor = config('ueditor.watercolor');//水印文字颜色，#ff0000
		$this->waterImage = '.'.config('ueditor.waterImage');//水印图片
		$this->transparency = config('ueditor.transparency');//水印图片透明度，阿拉伯数字，默认90
	}

	public function index(){
        //header('Access-Control-Allow-Origin: http://www.baidu.com'); //设置http://www.baidu.com允许跨域访问
        //header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With'); //设置允许的跨域header
        date_default_timezone_set("Asia/chongqing");
        error_reporting(E_ERROR);
        header("Content-Type: text/html; charset=utf-8");

        $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents($this->jsonPath)), true);
        $action = $_GET['action'];

        switch ($action) {
            case 'config':
                $result =  json_encode($CONFIG);
                break;
            /* 上传图片 */
            case 'uploadimage':
		        $config = array(
		            "pathFormat" => $CONFIG['imagePathFormat'],
		            "maxSize" => $this->imageMaxSize,
		            "allowFiles" => $CONFIG['imageAllowFiles']
		        );
		        $fieldName = $CONFIG['imageFieldName'];
		        $result = $this->upFile($fieldName);
		        break;
            /* 上传涂鸦 */
            case 'uploadscrawl':
		        $config = array(
		            "pathFormat" => $CONFIG['scrawlPathFormat'],
		            "maxSize" => $CONFIG['scrawlMaxSize'],
		            "allowFiles" => $CONFIG['scrawlAllowFiles'],
		            "oriName" => "scrawl.png"
		        );
		        $fieldName = $CONFIG['scrawlFieldName'];
		        $base64 = "base64";
		        $result = $this->upBase64($config,$fieldName);
		        break;
            /* 上传视频 */
            case 'uploadvideo':
		        $fieldName = $CONFIG['videoFieldName'];
		        $result = $this->upFile($fieldName);
		        break;
            /* 上传文件 */
            case 'uploadfile':
		        $config = array(
		            "pathFormat" => $CONFIG['filePathFormat'],
		            "maxSize" => $this->fileMaxSize,
		            "allowFiles" => $CONFIG['fileAllowFiles']
		        );
		        $fieldName = $CONFIG['fileFieldName'];
		        $result = $this->upFile($fieldName);
                break;
            /* 列出图片 */
            case 'listimage':
			    $allowFiles = $CONFIG['imageManagerAllowFiles'];
			    $listSize = $CONFIG['imageManagerListSize'];
			    $path = $CONFIG['imageManagerListPath'];
			    $get =$_GET;
			    $result =$this->fileList($allowFiles,$listSize,$get);
                break;
            /* 列出文件 */
            case 'listfile':
			    $allowFiles = $CONFIG['fileManagerAllowFiles'];
			    $listSize = $CONFIG['fileManagerListSize'];
			    $path = $CONFIG['fileManagerListPath'];
			    $get = $_GET;
			    $result = $this->fileList($allowFiles,$listSize,$get);
                break;
            /* 抓取远程文件 */
            case 'catchimage':
		    	$config = array(
			        "pathFormat" => $CONFIG['catcherPathFormat'],
			        "maxSize" => $CONFIG['catcherMaxSize'],
			        "allowFiles" => $CONFIG['catcherAllowFiles'],
			        "oriName" => "remote.png"
			    );
			    $fieldName = $CONFIG['catcherFieldName'];
			    /* 抓取远程图片 */
			    $list = array();
			    isset($_POST[$fieldName]) ? $source = $_POST[$fieldName] : $source = $_GET[$fieldName];
				
			    foreach($source as $imgUrl){
			        $info = json_decode($this->saveRemote($config,$imgUrl),true);
			        array_push($list, array(
			            "state" => $info["state"],
			            "url" => $info["url"],
			            "size" => $info["size"],
			            "title" => htmlspecialchars($info["title"]),
			            "original" => htmlspecialchars($info["original"]),
			            "source" => htmlspecialchars($imgUrl)
			        ));
			    }

			    $result = json_encode(array(
			        'state' => count($list) ? 'SUCCESS':'ERROR',
			        'list' => $list
			    ));
                break;
            default:
                $result = json_encode(array(
                    'state' => '请求地址出错'
                ));
                break;
        }

        /* 输出结果 */
        if(isset($_GET["callback"])){
            if(preg_match("/^[\w_]+$/", $_GET["callback"])){
                echo htmlspecialchars($_GET["callback"]).'('.$result.')';
            }else{
                echo json_encode(array(
                    'state' => 'callback参数不合法'
                ));
            }
        }else{
            echo $result;
        }
	}
	
	//上传文件
	private function upFile($fieldName){
		$file = request()->file($fieldName);
		$info = $file->rule('uniqid')->move($this->filePath);
		if($info){//上传成功
			$fname = $this->filePath.str_replace('\\','/',$info->getSaveName());
			
			$imgArr = explode(',', 'jpg,gif,png,jpeg,bmp,ttf,tif');
			$imgExt = strtolower($info->getExtension());
			$isImg = in_array($imgExt,$imgArr);
			
			if($isImg){//如果是图片，开始处理
				$image = Image::open($info);
				$water = $this->water;
				if($this->thumbnail == 1){//生成缩略图
					$image->thumb($this->thumbwidth,$this->thumbheight,$this->thumb)->save($fname);
				}
				if($water == 1){//文字水印
				    $image->text($this->waterText,$this->waterfont,$this->watersize,$this->watercolor,$this->waterPosition)->save($fname);
				}
				if($water ==2 ){//图片水印
				    $image->water($this->waterImage,$this->waterPosition,$this->transparency)->save($fname);
				}	
			}
			
			$data = array(
				'state' => 'SUCCESS',
				'url' => str_replace('./','/',$fname),//采用绝对路径，把前面的点.去掉
				'title' => '',
				'original' => '',
				'type' => '.' . $info->getExtension(),
				'size' => $info->getSize(),
			);
		}else{
			$data = array(
			    'state' => $info->getError(),
			);
		}
		return json_encode($data);
	}

    //列出图片
	private function fileList($allowFiles,$listSize,$get){
		$dirname = $this->filePath;
		$allowFiles = substr(str_replace(".","|",join("",$allowFiles)),1);

		/* 获取参数 */
		$size = isset($get['size']) ? htmlspecialchars($get['size']) : $listSize;
		$start = isset($get['start']) ? htmlspecialchars($get['start']) : 0;
		$end = $start + $size;

		/* 获取文件列表 */
		$path = $dirname;
		$files = $this->getFiles($path,$allowFiles);
		if(!count($files)){
		    return json_encode(array(
		        "state" => "no match file",
		        "list" => array(),
		        "start" => $start,
		        "total" => count($files)
		    ));
		}

		/* 获取指定范围的列表 */
		$len = count($files);
		for($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
		    $list[] = $files[$i];
		}

		/* 返回数据 */
		$result = json_encode(array(
		    "state" => "SUCCESS",
		    "list" => $list,
		    "start" => $start,
		    "total" => count($files)
		));

		return $result;
	}

   	/*
	 * 遍历获取目录下的指定类型的文件
	 * @param $path
	 * @param array $files
	 * @return array
	*/
    private function getFiles($path,$allowFiles,&$files = array()){
	    if(!is_dir($path)) return null;
	    if(substr($path,strlen($path)-1) != '/') $path .= '/';
	    $handle = opendir($path);
			
	    while(false !== ($file = readdir($handle))){
	        if($file != '.' && $file != '..'){
	            $path2 = $path.$file;
	            if(is_dir($path2)){
	                $this->getFiles($path2,$allowFiles,$files);
	            }else{
		            if(preg_match("/\.(".$allowFiles.")$/i",$file)){
		                $files[] = array(
		                    'url' => substr($path2,1),
		                    'mtime' => filemtime($path2)
		                );
		            }
	            }
	        }
	    }
		
	    return $files;
    }

    //抓取远程图片和文件
	private function saveRemote($config,$fieldName){
	    $imgUrl = htmlspecialchars($fieldName);
	    $imgUrl = str_replace("&amp;","&",$imgUrl);

	    //http开头验证
	    if(strpos($imgUrl,"http") !== 0){
	        $data = array(
		        'state' => '链接不是http链接',
		    );
	        return json_encode($data);
	    }
	    //获取请求头并检测死链
	    $heads = get_headers($imgUrl);
	    if(!(stristr($heads[0],"200") && stristr($heads[0],"OK"))){
	        $data = array(
		        'state' => '链接不可用',
		    );
	        return json_encode($data);
	    }
	    //格式验证(扩展名验证和Content-Type验证)
	    $fileType = strtolower(strrchr($imgUrl,'.'));
	    if(!in_array($fileType,$config['allowFiles']) || stristr($heads['Content-Type'],"image")){
	        $data = array(
		        'state' => '链接contentType不正确',
		    );
	        return json_encode($data);
	    }

	    //打开输出缓冲区并获取远程图片
	    ob_start();
	    $context = stream_context_create(
	        array('http' => array(
	            'follow_location' => false // don't follow redirects
	        ))
	    );
	    readfile($imgUrl,false,$context);
	    $img = ob_get_contents();
	    ob_end_clean();
	    preg_match("/[\/]([^\/]*)[\.]?[^\.\/]*$/",$imgUrl,$m);

	    $dirname = $this->filePath.'remote/';
	    $file['oriName'] = $m ? $m[1] : "";
	    $file['filesize'] = strlen($img);
	    $file['ext'] = strtolower(strrchr($config['oriName'],'.'));
	    $file['name'] = uniqid().$file['ext'];
	    $file['fullName'] = $dirname.$file['name'];
	    $fullName = $file['fullName'];

	    //检查文件大小是否超出限制
	    if($file['filesize'] >= ($this->fileMaxSize)){
  		    $data = array(
			    'state' => '文件大小超出网站限制',
		    );
		    return json_encode($data);
	    }

	    //创建目录失败
	    if(!file_exists($dirname) && !mkdir($dirname,0777,true)){
  		    $data = array(
			    'state' => '目录创建失败',
		    );
		    return json_encode($data);
	    }else if(!is_writeable($dirname)){
  		    $data = array(
			    'state' => '目录没有写权限',
		    );
		    return json_encode($data);
	    }

	    //移动文件
	    if(!(file_put_contents($fullName, $img) && file_exists($fullName))){ //移动失败
  		    $data = array(
			    'state' => '写入文件内容错误',
		    );
		    return json_encode($data);
	    }else{ //移动成功
	        $data = array(
			    'state' => 'SUCCESS',
			    'url' => substr($file['fullName'],1),
			    'title' => $file['name'],
			    'original' => $file['oriName'],
			    'type' => $file['ext'],
			    'size' => $file['filesize'],
		    );
	    }
		
	    return json_encode($data);
	}

    /*
	 * 处理base64编码的图片上传
	 * 例如：涂鸦图片上传
	*/
	private function upBase64($config,$fieldName){
	    $base64Data = $_POST[$fieldName];
	    $img = base64_decode($base64Data);

	    $dirname = $this->filePath.'scrawl/';
	    $file['filesize'] = strlen($img);
	    $file['oriName'] = $config['oriName'];
	    $file['ext'] = strtolower(strrchr($config['oriName'],'.'));
	    $file['name'] = uniqid().$file['ext'];
	    $file['fullName'] = $dirname.$file['name'];
	    $fullName = $file['fullName'];

 	    //检查文件大小是否超出限制
	    if($file['filesize'] >= ($this->imageMaxSize)){
  		    $data = array(
			    'state' => '文件大小超出网站限制',
		    );
		    return json_encode($data);
	    }

	    //创建目录失败
	    if(!file_exists($dirname) && !mkdir($dirname,0777,true)){
	        $data = array(
			    'state' => '目录创建失败',
		    );
		    return json_encode($data);
	    }else if(!is_writeable($dirname)){
	        $data = array(
			    'state' => '目录没有写权限',
		    );
		    return json_encode($data);
	    }

	    //移动文件
	    if(!(file_put_contents($fullName, $img) && file_exists($fullName))){ //移动失败
            $data = array(
		        'state' => '写入文件内容错误',
		    );
	    }else{ //移动成功	       
	        $data = array(
			    'state' => 'SUCCESS',
			    'url' => substr($file['fullName'],1),
			    'title' => $file['name'],
			    'original' => $file['oriName'],
			    'type' => $file['ext'],
			    'size' => $file['filesize'],
		    );
	    }
	    return json_encode($data);
	}
}