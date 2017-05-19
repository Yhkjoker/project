<?php
header( 'Content-Type:text/html;charset=utf-8 ');
// 本类由系统自动生成，仅供测试用途
class ContentAction extends CommonAction {
	private $con_db,$cate_db,$pro_db;
	function __construct() {
		$this->con_db=M("Content");
		$this->cate_db=M("Category");
		$this->pro_db=M("Product");
		parent::__construct();
	}
	//文章列表
	public function content(){
		$catid=intval($_GET['catid']);
		import('ORG.Util.Page');
		$count=$this->con_db->where("catid=$catid")->count();
		$page  = new Page($count,10);
		$show=$page->show();
		$list=$this->con_db->field("id,status,conorder,title,posid,inputtime")->order("conorder desc,id desc")->where("catid=$catid")->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign('list',$list);
		$this->assign('catid',$catid);
		$this->assign('show',$show);
		$this->display();
	}
	//添加文章页面
	public function addContent(){
		$catid=intval($_GET['catid']);
		$siteid=2;
		if(($catid==23 || $catid==24) && $siteid==2){
			$pro_list=$this->pro_db->field('a.id,tp_product.title,a.capacity,a.price')->join("left join `tp_product_price` a on tp_product.id=a.pid")->where('tp_product.status=1')->select();
			$this->assign("pro_list",$pro_list);
		}
		$arr=$this->cate_db->field("catname,catid")->where("catid=$catid  and siteid=1")->find();
		$this->assign('arr',$arr);
		$this->assign('siteid',$siteid);
		$this->display();
	}
	//修改文章页面
	public function upContent(){
		$id=intval($_GET['id']);
		$catid=intval($_GET['catid']);
		$siteid=2;
		$arr=$this->cate_db->field("catname,catid")->where("catid=$catid  and siteid=1")->find();
		$list=$this->con_db->where("id=$id  and siteid=1")->find();
		if(($catid==23 || $catid==24) && $siteid==2){
			$pro_list=$this->pro_db->field('a.id,tp_product.title,a.capacity,a.price')->join("left join `tp_product_price` a on tp_product.id=a.pid")->where('tp_product.status=1')->select();
			$this->assign("pro_list",$pro_list);
		}
		$product_list=explode(",",$list['productlist']);
		$this->assign('product_list',$product_list);
		$this->assign('arr',$arr);
		$this->assign('list',$list);
		$this->assign('siteid',$siteid);
		$this->display();
	}
	//文章删除
	public function delContent(){
		$id=intval($_POST['id']);
		$data=$this->con_db->where("id=$id  and siteid=1")->delete();
		echo $data;
	}


	public function doContent(){
		$action=$_GET['action'];
		$info=$_POST['info'];
		$info['productlist']=implode($info['productlist'],",");
		$info['content']=stripslashes($info['content']);
		if($action=="add"){//添加文章
			$info['inputtime']=strtotime($info['inputtime']);	
			$this->con_db->add($info);
			echo '{"info":"发布成功！","status":"1"}';	
		
		}elseif($action=="edit"){//编辑文章
			$id=intval($_GET["id"]);
			$info['updatetime']=strtotime($info['updatetime']);	
			$this->con_db->where("id=$id  and catid=".$info['catid'])->save($info);
			echo '{"info":"修改成功！","status":"1"}';	
		}else{	
			$this->error("非法操作");
		}
	}
	
	
	//文章排序
	public function conOrder(){
		$conorder=$_POST['conorder'];
		$catid=intval($_POST['catid']);
		foreach($conorder as $k=>$v){
			$this->con_db->where("id=$k  and siteid=1")->order("conorder")->save(array("conorder"=>$v));	
		}
		$this->redirect("Content/content",array("catid"=>$catid,"cls"=>2));
	}
	
	
	//文章是否显示
	public function show(){
		$id=intval($_POST['id']);
		$status=intval($_POST['status']);
		$data['status']=$status;
		$da=$this->con_db->where("id=$id")->save($data);
		echo $da;
	}
	
	
	//文章是否推荐
	public function posid(){
		$id=intval($_POST['id']);
		$posid=intval($_POST['posid']);
		$data['posid']=$posid;
		$da=$this->con_db->where("id=$id")->save($data);
		echo $da;
	}

	
	//搜索文章
	public function conSearch(){
		$factor=$_GET['factor'];
		$catid=intval($_GET['catid']);
		$search=$_GET['search'];
		if(!$search){
			$this->redirect('Content/content',array('catid'=>$catid,'cls'=>2));
		}
		if($factor==1){
			$where="title  like '%$search%' and catid=$catid  and siteid=1";
		}
		// 计算总数
		$count = $this->con_db->where($where)->count();
		// 导入分页类
		import("ORG.Util.Page");
		// 实例化分页类
		$p = new Page($count,10);
		// 分页显示输出
		$show = $p->show();
		// 当前页数据查询
		$list = $this->con_db->field("id,status,conorder,title,posid,inputtime")->where($where)->order("conorder desc,id desc")->limit($p->firstRow.','.$p->listRows)->select();	
		$this->assign('show', $show);
		$this->assign('list', $list);
		$this->assign('catid',$catid);
		$this->display();
	}
	
      
	
	
	
}