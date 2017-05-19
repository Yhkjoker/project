<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
	private $page_db;
	function __construct(){
		$this->page_db=M("Page");
		$this->index_picture_db=M("Index_picture");
		parent::__construct();
	}
	
	
    public function index(){
		$index_pic_banner=$this->index_picture_db->field("picurl,vidurl")->where("siteid=2 and status=1")->select();
		$where['id']=array('in','11,12,13,14,15,16,17,18');
		$where['siteid']=2;
		$where['status']=2;
		$index_pic_list=$this->index_picture_db->field('id,picurl,vidurl,picwzurl')->where($where)->select();
		$this->assign("index_pic_banner",$index_pic_banner);
		$this->assign("index_pic_list",$index_pic_list);
		$this->display();
    }
	
	
	
	   public function about(){
		$page_arr=$this->page_db->field('content')->where("catid=29")->find();
		$this->assign('page_arr',$page_arr);
		$this->display();
    }

}