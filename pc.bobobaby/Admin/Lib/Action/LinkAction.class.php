<?php 
header("Content-Type:text/html; charset=utf-8");
class LinkAction extends CommonAction{
	private $link_db,$cate_db,$para_db;
	function __construct(){
		parent::__construct();
		$this->link_db=M("Linkage");		$this->cate_db=M("Category");		$this->para_db=M("parameter");
	}	
	
	
	public function index(){
	   $linkageid=intval($_GET['linkageid']);
	   	import('ORG.Util.Page');
			$count=$this->link_db->where("parentid=0")->count();
			$page  = new Page($count,10);
			$show=$page->show();			
			$link_list=$this->link_db->field("a.name,a.linkageid,a.listorder,b.catname,b.catid")->table("tp_linkage a,tp_category b")->where("a.catid=b.catid")->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign("link_list",$link_list);
			$this->assign("show",$show);
			$this->display();
	}
	
	
	//添加菜单
	public function addLink(){		$cate_list=$this->cate_db->where(array("model"=>"Product","parentid"=>0))->select();
				$this->assign("cate_list",$cate_list);
		$this->display();
	}
	
	
	
	//修改菜单
  public function upLink(){
	  $linkageid=intval($_GET['linkageid']);	  	  $cate_list=$this->cate_db->where(array("model"=>"Product","parentid"=>0))->select();	  $this->assign("cate_list",$cate_list);
	  $link_arr=$this->link_db->field("name,linkageid,catid")->where("linkageid=$linkageid")->find();
	  $this->assign("link_arr",$link_arr);
	  $this->display();
  }
  
  
  //删除菜单
  public function delMessage(){
	  $linkageid=intval($_POST['mid']);	  $catid=intval($_POST['catid']);
			
		  $this->link_db->where("linkageid=$linkageid")->delete();		  		  $count=$this->link_db->where("catid=$catid")->count();		  if($count==0){			  $this->cate_db->where("catid=$catid")->save(array("child"=>0));		  }
		   echo '{"info":"删除成功","status":"y"}';
	
	  
  }
	
	public function doLink(){
		 $action=$_GET['action'];
		 $info=$_POST['info'];
		 if($action=="add"){//添加菜单
			 $linkageid=intval($_POST['linkageid']);
			if($linkageid==0){//一级菜单添加				
				$data=$this->link_db->add($info);				$this->cate_db->where("catid=".$info['catid'])->save(array("child=1"));				
			  }else{//二级以后的菜单添加
				$info['parentid']=$linkageid;
				$data=$this->link_db->add($info);
			 }
				echo '{"info":"添加成功","status":"y"}';
			 
		}elseif($action=="edit"){//编辑菜单
			$linkageid=intval($_GET['linkageid']);
			$data=$this->link_db->where("linkageid=$linkageid")->save($info);
			echo '{"info":"编辑成功","status":"y"}';
			
		}elseif($action=="addBatch"){//批量添加菜单
			$arr=trim($info['name'],"|");
			$arr=explode("|",$arr);
			 foreach($arr as $v){
				 $info['name']=$v;
				 $data=$this->link_db->add($info);
			 }
				echo '{"info":"添加成功","status":"y"}';
			 
			
		}
		
	}	//排序public function conOrder(){		$listorder=$_POST['listorder'];		foreach($listorder as $k=>$v){			$this->link_db->where("linkageid=$k")->order("listorder")->save(array("listorder"=>$v));			}		$this->success("排序成功");	}
		//排序public function listorder(){		$listorder=$_POST['listorder'];		foreach($listorder as $k=>$v){			$this->para_db->where("id=$k")->order("listorder")->save(array("listorder"=>$v));			}		$this->success("排序成功");	}						public function parameter(){	   	import('ORG.Util.Page');			$count=$this->para_db->count();			$page  = new Page($count,10);			$show=$page->show();						$para_list=$this->para_db->field("id,name,listorder,status,colorname,typeid")->limit($page->firstRow.','.$page->listRows)->select();			$this->assign("para_list",$para_list);			$this->assign("show",$show);			$this->display();	}					//添加颜色	public function addParameter(){		$this->display();	}			//修改颜色  public function upParameter(){	  $id=intval($_GET['id']);	 	  $para_arr=$this->para_db->field("id,name,colorname")->where("id=$id")->find();	  $this->assign("para_arr",$para_arr);	  $this->display();  }			public function addTexture(){		$cate_list=$this->cate_db->where(array("model"=>"Product","parentid"=>0))->select();				$this->assign("cate_list",$cate_list);		$this->display();	}					public function doParameter(){		 $action=$_GET['action'];					 $info=$_POST['info'];			 		 			 if($action=="add"){//添加菜单													$this->para_db->add($info);					echo '{"info":"添加成功","status":"y"}';				 			}elseif($action=="edit"){//编辑菜单				$id=intval($_GET['id']);				$this->para_db->where("id=$id")->save($info);				echo '{"info":"编辑成功","status":"y"}';							}		}		  //删除参数  public function delParameter(){	  $id=intval($_POST['id']);					  $this->para_db->where("id=$id")->delete();		  		   echo '{"info":"删除成功","status":"y"}';		    }	//参数是否显示	public function show(){		$id=intval($_POST['id']);		$status=intval($_POST['status']);		$data['status']=$status;		$da=$this->para_db->where("id=$id")->save($data);		echo $da;	}
	
}
?>