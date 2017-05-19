<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
	private $user_db,$index_pic_db;
	function __construct(){
		parent::__construct();
				$this->user_db=D('User');
				$this->index_pic_db=M('Index_picture');
	}
	
    public function index(){
		$info = array(
			'操作系统' => PHP_OS,
			'服务器IP' => $_SERVER['SERVER_NAME'] . ' (' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . ')',
			'环境' => $_SERVER["SERVER_SOFTWARE"],
			'PHP运行模式' => php_sapi_name(),
			'根目录' => $_SERVER['DOCUMENT_ROOT'],
			'MYSQL版本' => function_exists("mysql_close") ? mysql_get_client_info() : 'No support',
			'GD库版本' => $gd,
			//            'MYSQL版本' => mysql_get_server_info(),
			'上传附件大小' => ini_get('upload_max_filesize'),
			'运行时间' => ini_get('max_execution_time') . "s",
			'剩余磁盘空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
			'服务器时间' => date("Y-n-j H:i:s"),
			'北京时间' => gmdate("Y-n-j H:i:s", time() + 8 * 3600),
		);
		$this->assign('info',$info);
		$this->assign('name',$_SESSION['username']);
		$this->display();
    }
	

	//显示用户
	public function admin(){

		$list=$this->user_db->select();
		$this->assign('list',$list);
		$this->display();
	}
	
	//确认用户注册信息
	public function checkAdmin(){
			$username=$_POST['param'];
			$where['username']=$username;
			$count=$this->user_db->where($where)->count();
			if($count){
				echo '用户名已经存在';		
			}else{
				echo '{"info":"通过信息验证！","status":"y"}';
			}
	}	
	
	public function doAdmin(){
		$this->user_db->create();
		if(!$this->user_db->create()){
			$this->error($this->user_db->getError());
		}
		$lastId=$this->user_db->add();
		if($lastId){
			$this->redirect('Index/admin');
		}else{
			$this->error('用户注册失败');
		}		
	}
	
	//删除用户
	public function delAdmin(){
		$id=$_POST['id'];
		$data=$this->user_db->where("id=$id")->delete();
		echo $data;
	}
	
	//用户密码修改
	public function upAdmin(){
		$id=$_GET['id'];
		$arr=$this->user_db->where("id=$id")->find();
		$this->assign('arr',$arr);
		$this->display();
	}
	
	
	public function doUpAdmin(){
		$id=$_GET['id'];
		$passwordold=md5($_POST['passwordold']);
		$password=md5($_POST['password']);
		$arr=$this->user_db->where("id=$id")->find();
		if(md5($arr['password'])==$passwordold){
			$this->user_db->where("id=$id")->save(array("password"=>$password));
			echo '{"info":"修改成功","status":"1"}';
		}else{
			echo '{"info":"旧密码填写错误","status":"n"}';	
		}
	}
	
	
	//首页图片列表
	public function picture(){
		import('ORG.Util.Page');
		$count=$this->index_pic_db->where(array('siteid'=>2))->count();
		$page  = new Page($count,10);
		$show=$page->show();
		$index_pic_list=$this->index_pic_db->field("inputtime,title,picurl,id,listorder,status")->order("listorder desc,id desc")->where(array('siteid'=>2))->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("show",$show);
		$this->assign("index_pic_list",$index_pic_list);
		$this->display();
		
	}
	
	
	//添加首页图片
	public function addPic(){
		$this->display();
	}
	
	
	//编辑首页图片
	public function upPic(){
		$id=intval($_GET['id']);
		$index_pic_arr=$this->index_pic_db->where("id=$id and siteid=2")->find();
		$this->assign("index_pic_arr",$index_pic_arr);
		$this->display();
	}

	public function doPicture(){
		$info=$_POST['info'];
		$action=$_GET['action'];
		if($action=="add"){
			$info['inputtime']=strtotime($info['inputtime']);
			$info['siteid']=2;
			$this->index_pic_db->add($info);
			echo '{"info":"添加成功","status":"y"}';
		}elseif($action=="edit"){
			$id=intval($_GET['id']);
			$info['updatetime']=strtotime($info['updatetime']);
			$this->index_pic_db->where("id=$id  and siteid=2")->save($info);
			echo '{"info":"编辑成功","status":"y"}';
			
		}
	}
	
	
	
	//首页图片排序
	public function pOrder(){
		$listorder=$_POST['listorder'];
		foreach($listorder as $k=>$v){
			$this->index_pic_db->where("id=$k  and siteid=2")->order("listorder")->save(array("listorder"=>$v));	
		}
		$this->redirect("Index/picture",array("cls"=>3));
	}
	
	
	//首页图片是否显示
	public function show(){
		$id=intval($_POST['id']);
		$status=intval($_POST['status']);
		$data['status']=$status;
		$da=$this->index_pic_db->where("id=$id  and siteid=2")->save($data);
		echo $da;
	}
	
	
	//删除首页图片
	public function delPicture(){
		$id=intval($_POST['id']);
		$data=$this->index_pic_db->where("id=$id  and siteid=2")->delete();
		echo $data;
		
	}
	
	
}