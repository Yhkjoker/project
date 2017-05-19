<?php
// 本类由系统自动生成，仅供测试用途
class CommonAction extends Action {
    public function __construct(){
		$cate=M("Category");
		$con=M("Content");
		$page=M("Page");
		$page_header_arr=$page->where(array('catid'=>29))->find();
		$con_list_one=$con->field("id,catid,title,headerpic")->where("catid=23 and (status=2 or status=3)")->order("conorder desc,id desc")->limit(8)->select();
		$con_list_two=$con->field("id,catid,title,headerpic")->where("catid=24 and (status=2 or status=3)")->order("conorder desc,id desc")->limit(8)->select();
		$con_list_three=$con->field("id,catid,title,headerpic")->where("catid=25 and (status=2 or status=3)")->order("conorder desc,id desc")->limit(8)->select();
		$site_db=M("Site");
		$site_arr=$site_db->where("siteid=1")->find();
		$pro_db=M("Product");
		$pro_header=$pro_db->field("a.xqstatus,a.title,a.picurlpc,a.catid,a.id,b.id as ppid")->table("en_product_price b,en_product a")->where("a.posid=1 and a.status=1 and  a.id=b.pid")->order("a.listorder desc,id desc")->limit(8)->select();
		$video_db=M("Video");
		$video_header=$video_db->field('vtitle,headerpic,catid')->where('catid=26 and (status=2 or status=3)')->limit(8)->order("listorder desc,vid desc")->select();
		$jcbg_header=$video_db->field('vtitle,headerpic,catid')->where('catid=27 and (status=2 or status=3)')->limit(8)->order("listorder desc,vid desc")->select();
		$this->left();
		$this->assign("page_header_arr",$page_header_arr);
		$this->assign("jcbg_header",$jcbg_header);
		$this->assign('video_header',$video_header);
		$this->assign('pro_header',$pro_header);
		$this->assign("site_arr",$site_arr);
		$this->assign("con_list_one",$con_list_one);
		$this->assign("con_list_two",$con_list_two);
		$this->assign("con_list_three",$con_list_three);
		$this->assign("category_list",$category_list);		
    }
	
	
	public function left(){
		$cate=M("Category");
		$where['catid']=array("in","14,15,16,17,18,19,20,21");
		$catname_list=$cate->field('catid,catname,caturl')->where($where)->order('listorder desc,catid desc')->select();
		
		$this->assign('catname_list',$catname_list);
		
	}
}