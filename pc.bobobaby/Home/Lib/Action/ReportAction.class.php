<?php
// 本类由系统自动生成，仅供测试用途
class ReportAction extends CommonAction {
	private $cate_db,$video_db;
	function __construct(){
		parent::__construct();
		$this->cate_db=M("Category");
		$this->video_db=M("Video");

		
	}
	
	//检测报告
	public function report(){
			
				$this->display();	
	
	}
	
	public function getAuto(){
			$catid=intval($_POST['catid']);
			$page = intval($_POST['page']); //获取请求的页数 
			$offset=9;
			$start = $page*$offset; 
			$video_list=$this->video_db->field("picurlpc,vtitle,vurl,ftitle")->where("(status=2 or status=3) and catid=$catid")->limit($start,$offset)->order("listorder desc,vid desc")->select();
			$data="";
			foreach($video_list as $k=>$v){
				$data.=' <dl><i class="testing-joinus"></i><dt><img src="'.$v['picurlpc'].'"></dt><dd><p class="report_list">'.$v['vtitle'].'</p><span>'.$v['ftitle'].'</span><a href="'.$v['vurl'].'" target="_blank"><img src="/bobo2/Public/img/dianjibg01.png" >点击下载</a></dd></dl>';
				
			}
			echo $data;
		
	}


	
}