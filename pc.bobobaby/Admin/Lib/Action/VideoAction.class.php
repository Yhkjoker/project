<?php
// 本类由系统自动生成，仅供测试用途
class VideoAction extends CommonAction {
	private $cate_db,$video_db;
	function __construct(){
		parent::__construct();
		$this->cate_db=M("Category");
		$this->video_db=M("Video");

		
	}
	
	//视频管理
	public function video(){				
				$catid=intval($_GET['catid']);
				import('ORG.Util.Page');
				$count=$this->video_db->where("catid=$catid  and siteid=1")->count();
				$page  = new Page($count,12);
				$show=$page->show();
				$list=$this->video_db->limit($page->firstRow.','.$page->listRows)->order("listorder asc,vid desc")->where("catid=$catid  and siteid=1")->select();
				$this->assign("show",$show);
				$this->assign("cate_arr",$cate_arr);
				$this->assign("list",$list);
				$this->display();	
	
	}
	
	public function addVideo(){
			$catid=intval($_GET['catid']);

		$cate_arr=$this->cate_db->field("catname,catid")->where("catid=$catid")->find();
				$this->assign('cate_arr',$cate_arr);

				$this->display();
		
	}
	
	
		//修改视频
	public function upVideo(){
		$vid=intval($_GET['vid']);

		$catid=intval($_GET['catid']);

		$cate_arr=$this->cate_db->field("catname,catid")->where("catid=$catid")->find();

		$arr=$this->video_db->where("vid=$vid  and siteid=1")->find();

		$this->assign('arr',$arr);

		$this->assign('cate_arr',$cate_arr);

		$this->display();

	}
	
	public function doVideo(){
		
		$action=$_GET['action'];

		$info=$_POST['info'];
		$info['inputtime']=strtotime($info['inputtime']);

		if($action=="add"){//视频添加

			$this->video_db->add($info);

			echo '{"info":"提交成功","status":"y"}';

		}elseif($action=="edit"){//视频编辑

			$vid=intval($_GET['vid']);

	  		$catid=intval($info['catid']);

			$this->video_db->where("catid=$catid and vid=$vid  and siteid=1")->save($info);

			echo '{"info":"编辑成功","status":"y"}';

			

		}
		
		
	}
	
	
	//视频是否显示
	public function show(){
		$vid=intval($_POST['vid']);
		$status=intval($_POST['status']);
		$data['status']=$status;

		$da=$this->video_db->where("vid=$vid  and siteid=1")->save($data);

		echo $da;;
	}
	
	
public function posid(){

		$vid=intval($_POST['vid']);

		$posid=intval($_POST['posid']);

		$data['posid']=$posid;

		$da=$this->video_db->where("vid=$vid  and siteid=1")->save($data);

		echo $da;

	}

	
	
	//修改排序
	public function listorder(){
		$listorder=$_POST['listorder'];
		foreach($listorder as $k=>$v){
			$this->video_db->where("vid=$k  and siteid=1")->order("listorder")->save(array("listorder"=>$v));	
		}
			$this->redirect("Video/video",array("catid"=>$catid,"cls"=>2));
	}
	
	//删除视频
	public function delVideo(){
		$vid=intval($_POST['vid']);
		$data=$this->video_db->where("vid=$vid and siteid=1")->delete();
		echo $data;
	}
	
	

	
}