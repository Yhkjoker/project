<?php
header("Content-type: text/html; charset=utf-8");
class SiteAction extends CommonAction {
	private $site_db;
	function __construct(){
		$this->site_db=D("Site");
		parent::__construct();
	}
    public function site(){
		$list=$this->site_db->select();
		$this->assign("list",$list);
		$this->display();
    }
	public function doSite(){
		$this->site_db->create();
		if(!$this->site_db->create()){
			$this->error($this->site_db->getError());
		}
		$list=$this->site_db->select();
		if(!$list){
			$data=$this->site_db->add();
		}else{
			$data=$this->site_db->where("siteid=1")->save();
		}
		if($data){
			$this->success("修改成功",U("Site/site"));
		}else{
			$this->error("修改失败");
		}
	 
	}
}