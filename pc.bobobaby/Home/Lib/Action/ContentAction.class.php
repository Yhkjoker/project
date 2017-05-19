<?php
// 本类由系统自动生成，仅供测试用途
class ContentAction extends CommonAction {
	private $cate_db,$con_db,$pro_db,$para_db;
	function __construct(){
		parent::__construct();
		$this->cate_db=M("Category");
		$this->con_db=M("Content");
		$this->pro_db=M("Product");
		$this->para_db=M("Parameter");

		
	}
	
	
	
	//文章列表
	public function content(){
		$catid=intval($_GET['catid']);
		$cate_arr=$this->cate_db->field("catname")->where("catid=$catid")->find();

		$this->assign("cate_arr",$cate_arr);

		if($catid=="25"){
			$pagesize=10;
			$count=$this->con_db->where("(status=2 or status=3) and catid=$catid")->count();
			$total_pages=ceil($count/$pagesize);
			$this->assign("total_pages",$total_pages);
			$this->display("news");
		}elseif($catid=="23"){//活动资讯
			$this->display("information");
		}elseif($catid=="24"){//活动宝典
			$this->display("canon");
			
			
		}else{
			$this->display();
			

		}
		
	}
	

	//bobo新闻
	public function news_xq(){
		$id=intval($_GET['id']);
		$catid=intval($_GET['catid']);
		$con_arr=$this->con_db->where("id=$id and catid=$catid and (status=2 or status=3)")->find();
		$this->assign("con_arr",$con_arr);
		//上一篇
		$front=$this->con_db->where("id<'".$id."'and catid=$catid and (status=2 or status=3)")->order('id desc')->limit('0,1')->find();
        $this->assign('front',$front);
		//下一篇
		$after=$this->con_db->where("id>'".$id."'and catid=$catid and (status=2 or status=3)")->order('id asc')->limit('0,1')->find();
        $this->assign('after',$after);
		if($catid==23 && !empty($con_arr['productlist'])){
						$pro_list=$this->pro_db->field("tp_product.picurlpc,tp_product.title,tp_product.catid,a.id,a.pid,a.capacity,a.price,b.catname,a.colorlist")->join("left join tp_product_price a on tp_product.id=a.pid left join tp_category b on tp_product.catid=b.catid")->where("tp_product.status=1 and a.id in (".$con_arr['productlist'].")")->limit(6)->select();
						foreach($pro_list as $k=>$v){
								$where['id']=array("in",$v['colorlist']);
								$where['status']=1;
								$pro_list[$k]['colorlist']=$this->para_db->where($where)->select();
						}
						
						
			$this->assign("pro_list",$pro_list);
		}
		
		if($catid==24){
			$pro_list=$this->pro_db->field("tp_product.picurlpc,tp_product.title,tp_product.catid,a.id,a.pid,a.capacity,a.price,b.catname")->join("left join tp_product_price a on tp_product.id=a.pid left join tp_category b on tp_product.catid=b.catid")->where("tp_product.status=1 and a.id in (".$con_arr['productlist'].")")->limit(6)->select();
			$this->assign("pro_list",$pro_list);
			$this->display("canon_xq");
		}else{
			$this->display();
		}
	}
	
	//活动咨询
	public function content_xq(){
		$id=intval($_GET['id']);
		$catid=intval($_GET['catid']);
		$con_arr=$this->con_db->where("id=$id and catid=$catid and (status=2 or status=3)")->find();
		$this->assign("con_arr",$con_arr);
		$this->display();
		
	}
	
	
	//新闻加载列表
	public function getAuto(){
		$catid=intval($_POST['catid']);
		$amount =10; 
		$page_number=intval($_POST['page']);
		$last = ($page_number * $amount);  
		$con_list=$this->con_db->field("title,description,picurlpc,catid,id,inputtime")->where("(status=2 or status=3) and catid=$catid")->limit($last,$amount)->order("conorder desc,inputtime desc")->select();
		
		foreach($con_list as $k=>$v){
					$msg['one'].='<li><span>•</span><a href="'.U("Content/news_xq",array("catid"=>$v["catid"],"id"=>$v["id"])).'">'. date('Y年m月d日',$v['inputtime']).'&nbsp;-&nbsp;'.$v['title'].'</a></li>';
					$msg['two'].='<dl><dt><img src="'.$v['picurlpc'].'"></dt><dd><span>•</span>'.$v['description'].'</dd></dl>';
			
		}
		$arr['lists']=$msg;
		echo json_encode($arr);
		
	}
	
	
	//宝典加载更多
	public function getAutobd(){
		$catid=intval($_POST['catid']);
		$page = intval($_POST['page']); //获取请求的页数 
		$offset=6;
		$start = $page*$offset; 
		$con_list=$this->con_db->field("picurlpc,catid,id")->where("(status=2 or status=3) and catid=$catid")->limit($start,$offset)->order("conorder desc,id desc")->select();
		$data="";
		foreach($con_list as $k=>$v){
			$data.='<li><img src="'.$v['picurlpc'].'" width="100%"><div class="Canon-substance_bg"><a href="'.U("Content/news_xq",array("catid"=>$v["catid"],"id"=>$v["id"])).'"><img class="Canon_center_bg" src="/bobo2/Public/img/baodianbgbg.png" width="54%"></a></div></li>';
			
		}
		echo $data;
	}
	
	//活动加载更多
	public function getAutohd(){
		$catid=intval($_POST['catid']);
		$page = intval($_POST['page']); //获取请求的页数 
		$offset=6;
		$start = $page*$offset; 
		$con_list=$this->con_db->field("title,description,picurlpc,catid,id")->where("(status=2 or status=3) and catid=$catid")->limit($start,$offset)->order("conorder desc,id desc")->select();
		$data="";
		foreach($con_list as $k=>$v){
			$data.='<li><a href="'.U("Content/news_xq",array("catid"=>$v["catid"],"id"=>$v["id"])).'"><img src="'.$v["picurlpc"].'" width="450" height="455"></a><div class="mimi-substance-txt">'.$v["description"].'</div></li>';
			
		}
		echo $data;
	}
	
}