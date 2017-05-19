<?php 
class PageAction extends CommonAction{
	//单页面
	private $page_db,$cate_db;
	function __construct(){
		$this->page_db=M("Page");
		$this->cate_db=M("Category");
		parent::__construct();
	}

	public function upPage(){
		$catid=intval($_GET['catid']);
		$arr=$this->cate_db->join("left join `en_page` b on en_category.catid=b.catid")->field("en_category.catid,en_category.catname,b.title,b.content,b.picurl")->where("en_category.catid=$catid")->find();
		$this->assign("arr",$arr);
		$this->display();
		
	}
	
	
	
	public function doUpPage(){
		$catid=intval($_GET['catid']);
		$info=$_POST['info'];
		$info['content']=stripslashes($info['content']);
		$arr=$this->page_db->where("catid=$catid")->find();
			if(!$arr){
				$this->page_db->add($info);
			}else{
				$this->page_db->where("catid=$catid")->save($info);
			}
		echo '{"info":"编辑成功","status":"1"}';

	}
	
}
?>