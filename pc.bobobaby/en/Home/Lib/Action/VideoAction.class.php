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
			$video_list=$this->video_db->field("picurlpc,vurl,vpurlwz,vfurl")->where("catid=$catid and (status=2 or status=3)")->order("listorder desc")->select();

			$this->assign("video_list",$video_list);
			$this->display();
	}
	

	

	
}