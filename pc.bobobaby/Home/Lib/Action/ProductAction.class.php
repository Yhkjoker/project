<?php
// 本类由系统自动生成，仅供测试用途
class ProductAction extends CommonAction {
	private $pro_db,$cate_db,$link_db,$para_db,$collect_db;
	function __construct(){
		$this->pro_db=M("Product");
		$this->cate_db=M("Category");
		$this->link_db=M("Linkage");
		$this->para_db=M("Parameter");
		$this->collect_db=M("Collect");
		parent::__construct();
	}
	
	
	//产品列表
    public function product(){
		$catid=intval($_GET['catid']);
		$linkageid=intval($_GET['linkageid']);
		$price_search=trim($_GET['price_search']);
		$texturelist_search=trim($_GET['texturelist_search']);
		$capacity_search=trim($_GET['capacity_search']);
		$this->left();
		$cookie_arr=cookie('bobo_pc');
		$sess_id=$_SESSION['bobo_pc_user_id'];
		
		if(!empty($cookie_arr)){ 
		$cookie_arr=unserialize($cookie_arr); 
		$cookie_str=implode(",",$cookie_arr);
		$where['a.id']=array('in',$cookie_str);
		$pro_list_fw=$this->pro_db->field("tp_product.xqstatus,tp_product.status,tp_product.picurlpc,tp_product.title,tp_product.colorlist,a.price,a.capacity,tp_product.id as pid,tp_product.catid,a.id")->join("left join tp_product_price a on tp_product.id=a.pid")->where($where)->limit(5)->order('tp_product.listorder desc,tp_product.id desc')->select();
			foreach ($pro_list_fw as $k=>$v){
					$where_two['id']=array('in',$v['colorlist']);
					$where_two['status']=1;
					$para_list_one=$this->para_db->field("colorname,name")->where($where_two)->select();
					$pro_list_fw[$k]['colorlist']=$para_list_one;
					$cate_array=$this->cate_db->field("catname")->where("catid=".$v['catid'])->find();
					if($sess_id){
							$collect_arr=$this->collect_db->field("id as colid")->where(array('vid'=>$sess_id,'ppid'=>$v['id']))->find();
							$pro_list_fw[$k]['colid']=$collect_arr['colid'];
					}
					$pro_list_fw[$k]['catname']=$cate_array['catname'];
			}
		}

		$this->assign('pro_list_fw',$pro_list_fw);
		
		$para_search_list=$this->para_db->field("colorname,id")->where("typeid=1 and status=1")->order("listorder desc,id desc")->select();
		$this->assign('para_search_list',$para_search_list);
		if($catid){	

			$link_count=$this->link_db->where("catid=$catid and status=1")->count();
			if($link_count>0){
				$cate_arr=$this->cate_db->field('catname')->where("catid=$catid")->find();
				$this->assign('cate_arr',$cate_arr);
				$link_list=$this->link_db->field('name,linkageid')->where("catid=$catid and status=1")->order('listorder desc,linkageid desc')->select();

				$where="";
				if($price_search=='0-50'){
					$where.=" and (b.price between 0 and 50) ";
				}elseif($price_search=='50-100'){
					$where.=" and (b.price between 50 and 100) ";
				}elseif($price_search=='100-300'){
					$where.=" and (b.price between 100 and 300) ";
				}elseif($price_search=='300-1000'){
					$where.=" and (b.price between 300 and 1000) ";
				}
				if($texturelist_search=='玻璃'){
					$where.=" and b.texturelist=3 ";
				}elseif($texturelist_search=='塑胶'){
					$where.=" and b.texturelist=5 ";
				}elseif($texturelist_search=='PPSU'){
					$where.=" and b.texturelist=11 ";
				}
				if($capacity_search=='50ml-100ml'){
					$where.=" and (b.capacity between '50ml' and '100ml') ";
				}elseif($capacity_search=='100ml-200ml'){
					$where.=" and (b.capacity between '100ml' and '200ml') ";
				}elseif($capacity_search=='200ml以上'){
					$where.=" and b.capacity >='200ml' ";
				}
				
				$num="";
				foreach($link_list as $k=>$v){
					$pro_list=$this->pro_db->field("a.xqstatus,a.title,a.picurlpc,a.catid,a.id,b.capacity,b.price,b.id as ppid,a.colorlist,b.fmpicurl")->table("tp_product_price b,tp_product a")->where("a.catid=$catid and a.linkageid=".$v['linkageid']." and a.status=1 and  a.id=b.pid".$where)->order("listorder desc")->select();

					foreach($pro_list as $key=>$val){
						if($sess_id){
							$collect_arr=$this->collect_db->field("id as colid")->where(array('vid'=>$sess_id,'ppid'=>$val['ppid']))->find();
							$pro_list[$key]['colid']=$collect_arr['colid'];
						}
						if(!empty($val['colorlist'])){
						 $where_one['id']=array("in",$val['colorlist']);
						 $para_list=$this->para_db->field("colorname")->where($where_one)->select();
						 $pro_list[$key]['colorlist']=$para_list;
						 }
				
					}
					$link_list[$k]['pro_list']=$pro_list;
					  $num+=count($pro_list);
				}

				if($num==0){
					$this->assign('link_list',null);
				
				}else{
					$this->assign('link_list',$link_list);
				}
				$this->display();
			}else{
				$where="";
				$where.="a.catid=$catid  and a.status=1 and  a.id=b.pid";
					if($price_search=='0-50'){
						$where.=" and (b.price between 0 and 50) ";
					}elseif($price_search=='50-100'){
						$where.=" and (b.price between 50 and 100) ";
					}elseif($price_search=='100-300'){
						$where.=" and (b.price between 100 and 300) ";
					}elseif($price_search=='300-1000'){
						$where.=" and (b.price between 300 and 1000) ";
					}
					if($texturelist_search=='玻璃'){
						$where.=" and b.texturelist=3 ";
					}elseif($texturelist_search=='塑胶'){
						$where.=" and b.texturelist=5 ";
					}elseif($texturelist_search=='PPSU'){
						$where.=" and b.texturelist=11 ";
					}
					if($capacity_search=='50ml-100ml'){
						$where.=" and (b.capacity between '50ml' and '100ml') ";
					}elseif($capacity_search=='100ml-200ml'){
						$where.=" and (b.capacity between '100ml' and '200ml') ";
					}elseif($capacity_search=='200ml以上'){
						$where.=" and b.capacity >='200ml' ";
					}
				
						
					$pro_list=$this->pro_db->field("a.xqstatus,a.title,a.picurlpc,a.catid,a.id,b.capacity,b.price,b.id as ppid,a.colorlist,b.fmpicurl")->table("tp_product_price b,tp_product a")->where($where)->order("a.listorder desc,id desc")->select();
						foreach($pro_list as $k=>$v){
							$cate_arr=$this->cate_db->field('catname')->where("catid=".$v['catid'])->find();
							$pro_list[$k]['catname']=$cate_arr['catname'];
							if($sess_id){
								$collect_arr=$this->collect_db->field("id as colid")->where(array('vid'=>$sess_id,'ppid'=>$v['ppid']))->find();
								$pro_list[$k]['colid']=$collect_arr['colid'];
							}
							if(!empty($v['colorlist'])){
								$where_one['id']=array("in",$v['colorlist']);
								$para_list=$this->para_db->field("colorname")->where($where_one)->select();
								$pro_list[$k]['para_list']=$para_list;
							}	
						}
					$this->assign("pro_list",$pro_list); 
					$this->display("whole");
				
			}
		}else{

			$where="";
			$where.="a.posid=1 and a.status=1 and  a.id=b.pid";
			if($price_search=='0-50'){
				$where.=" and (b.price between 0 and 50) ";
			}elseif($price_search=='50-100'){
				$where.=" and (b.price between 50 and 100) ";
			}elseif($price_search=='100-300'){
				$where.=" and (b.price between 100 and 300) ";
			}elseif($price_search=='300-1000'){
				$where.=" and (b.price between 300 and 1000) ";
			}
			if($texturelist_search=='玻璃'){
				$where.=" and b.texturelist=3 ";
			}elseif($texturelist_search=='塑胶'){
				$where.=" and b.texturelist=5 ";
			}elseif($texturelist_search=='PPSU'){
				$where.=" and b.texturelist=11 ";
			}
			if($capacity_search=='50ml-100ml'){
				$where.=" and (b.capacity between '50ml' and '100ml') ";
			}elseif($capacity_search=='100ml-200ml'){
				$where.=" and (b.capacity between '100ml' and '200ml') ";
			}elseif($capacity_search=='200ml以上'){
				$where.=" and b.capacity >='200ml' ";
			}
				
			$pro_list=$this->pro_db->field("a.xqstatus,a.title,a.picurlpc,a.catid,a.id,b.capacity,b.price,b.id as ppid,a.colorlist,b.fmpicurl")->table("tp_product_price b,tp_product a")->where($where)->order("a.listorder desc,id desc")->select();
				foreach($pro_list as $k=>$v){
					$cate_arr=$this->cate_db->field('catname')->where("catid=".$v['catid'])->find();
					$pro_list[$k]['catname']=$cate_arr['catname'];
					if($sess_id){
							$collect_arr=$this->collect_db->field("id as colid")->where(array('vid'=>$sess_id,'ppid'=>$v['ppid']))->find();
							$pro_list[$k]['colid']=$collect_arr['colid'];
					}
					if(!empty($v['colorlist'])){
						$where_one['id']=array("in",$v['colorlist']);
						$para_list=$this->para_db->field("colorname")->where($where_one)->select();
						$pro_list[$k]['para_list']=$para_list;
					}	
				}
			$this->assign("pro_list",$pro_list); 
			$this->display("newswhole");		

		}
		


    }
	
	public function product_all(){
		$price_search=trim($_GET['price_search']);
		$texturelist_search=trim($_GET['texturelist_search']);
		$capacity_search=trim($_GET['capacity_search']);
		$sess_id=$_SESSION['bobo_pc_user_id'];
		
		$cookie_arr=cookie('bobo_pc');
		if(!empty($cookie_arr)){ 
		$cookie_arr=unserialize($cookie_arr); 
		$cookie_str=implode(",",$cookie_arr);
		$where_zj['a.id']=array('in',$cookie_str);
		$pro_list_fw=$this->pro_db->field("tp_product.xqstatus,tp_product.status,tp_product.picurlpc,tp_product.title,tp_product.colorlist,a.price,a.capacity,tp_product.id as pid,tp_product.catid,a.id")->join("left join tp_product_price a on tp_product.id=a.pid")->where($where_zj)->limit(5)->order('tp_product.listorder desc,tp_product.id desc')->select();
			foreach ($pro_list_fw as $k=>$v){
					$where_two['id']=array('in',$v['colorlist']);
					$where_two['status']=1;
					$para_list_one=$this->para_db->field("colorname,name")->where($where_two)->select();
					$pro_list_fw[$k]['colorlist']=$para_list_one;
					$cate_array=$this->cate_db->field("catname")->where("catid=".$v['catid'])->find();
					if($sess_id){
							$collect_arr=$this->collect_db->field("id as colid")->where(array('vid'=>$sess_id,'ppid'=>$v['id']))->find();
							$pro_list_fw[$k]['colid']=$collect_arr['colid'];
					}
					$pro_list_fw[$k]['catname']=$cate_array['catname'];
			}
		}

		$this->assign('pro_list_fw',$pro_list_fw);

		
		$where="";
		$where.="a.status=1 and  a.id=b.pid";
			if($price_search=='0-50'){
				$where.=" and (b.price between 0 and 50) ";
			}elseif($price_search=='50-100'){
				$where.=" and (b.price between 50 and 100) ";
			}elseif($price_search=='100-300'){
				$where.=" and (b.price between 100 and 300) ";
			}elseif($price_search=='300-1000'){
				$where.=" and (b.price between 300 and 1000) ";
			}
			if($texturelist_search=='玻璃'){
				$where.=" and b.texturelist=3 ";
			}elseif($texturelist_search=='塑胶'){
				$where.=" and b.texturelist=5 ";
			}elseif($texturelist_search=='PPSU'){
				$where.=" and b.texturelist=11 ";
			}
			if($capacity_search=='50ml-100ml'){
				$where.=" and (b.capacity between '50ml' and '100ml') ";
			}elseif($capacity_search=='100ml-200ml'){
				$where.=" and (b.capacity between '100ml' and '200ml') ";
			}elseif($capacity_search=='200ml以上'){
				$where.=" and b.capacity >='200ml' ";
			}
		
	
		
			$pro_list=$this->pro_db->field("a.xqstatus,a.title,a.picurlpc,a.catid,a.id,b.capacity,b.price,b.id as ppid,a.colorlist,b.fmpicurl")->table("tp_product_price b,tp_product a")->where($where)->order("a.listorder desc,id desc")->select();
				foreach($pro_list as $k=>$v){
					$cate_arr=$this->cate_db->field('catname')->where("catid=".$v['catid'])->find();
					$pro_list[$k]['catname']=$cate_arr['catname'];
					if($sess_id){
							$collect_arr=$this->collect_db->field("id as colid")->where(array('vid'=>$sess_id,'ppid'=>$v['ppid']))->find();
							$pro_list[$k]['colid']=$collect_arr['colid'];
					}
					if(!empty($v['colorlist'])){
						$where_one['id']=array("in",$v['colorlist']);
						$para_list=$this->para_db->field("colorname")->where($where_one)->select();
						$pro_list[$k]['para_list']=$para_list;
					}	
				}
			$this->assign("pro_list",$pro_list); 
			$this->display();		
		
	}	
	
	
	
		
	public function product_search(){
		$price_search=trim($_GET['price_search']);
		$texturelist_search=trim($_GET['texturelist_search']);
		$capacity_search=trim($_GET['capacity_search']);
		$sess_id=$_SESSION['bobo_pc_user_id'];
		$searchname=trim($_GET['keyword']);
		if(empty($searchname)){
			$this->redirect('Product/product_all');
		}
		
		$cookie_arr=cookie('bobo_pc');
		if(!empty($cookie_arr)){ 
		$cookie_arr=unserialize($cookie_arr); 
		$cookie_str=implode(",",$cookie_arr);
		$where_zj['a.id']=array('in',$cookie_str);
		$pro_list_fw=$this->pro_db->field("tp_product.xqstatus,tp_product.status,tp_product.picurlpc,tp_product.title,tp_product.colorlist,a.price,a.capacity,tp_product.id as pid,tp_product.catid,a.id")->join("left join tp_product_price a on tp_product.id=a.pid")->where($where_zj)->limit(5)->order('tp_product.listorder desc,tp_product.id desc')->select();
			foreach ($pro_list_fw as $k=>$v){
					$where_two['id']=array('in',$v['colorlist']);
					$where_two['status']=1;
					$para_list_one=$this->para_db->field("colorname,name")->where($where_two)->select();
					$pro_list_fw[$k]['colorlist']=$para_list_one;
					$cate_array=$this->cate_db->field("catname")->where("catid=".$v['catid'])->find();
					if($sess_id){
							$collect_arr=$this->collect_db->field("id as colid")->where(array('vid'=>$sess_id,'ppid'=>$v['id']))->find();
							$pro_list_fw[$k]['colid']=$collect_arr['colid'];
					}
					$pro_list_fw[$k]['catname']=$cate_array['catname'];
			}
		}

		$this->assign('pro_list_fw',$pro_list_fw);

		
		$where="";
		$where.="a.status=1 and  a.id=b.pid and a.title like '%$searchname%'";
			if($price_search=='0-50'){
				$where.=" and (b.price between 0 and 50) ";
			}elseif($price_search=='50-100'){
				$where.=" and (b.price between 50 and 100) ";
			}elseif($price_search=='100-300'){
				$where.=" and (b.price between 100 and 300) ";
			}elseif($price_search=='300-1000'){
				$where.=" and (b.price between 300 and 1000) ";
			}
			if($texturelist_search=='玻璃'){
				$where.=" and b.texturelist=3 ";
			}elseif($texturelist_search=='塑胶'){
				$where.=" and b.texturelist=5 ";
			}elseif($texturelist_search=='PPSU'){
				$where.=" and b.texturelist=11 ";
			}
			if($capacity_search=='50ml-100ml'){
				$where.=" and (b.capacity between '50ml' and '100ml') ";
			}elseif($capacity_search=='100ml-200ml'){
				$where.=" and (b.capacity between '100ml' and '200ml') ";
			}elseif($capacity_search=='200ml以上'){
				$where.=" and b.capacity >='200ml' ";
			}
		
	
		
			$pro_list=$this->pro_db->field("a.xqstatus,a.title,a.picurlpc,a.catid,a.id,b.capacity,b.price,b.id as ppid,a.colorlist,b.fmpicurl")->table("tp_product_price b,tp_product a")->where($where)->order("a.listorder desc,id desc")->select();
				foreach($pro_list as $k=>$v){
					$cate_arr=$this->cate_db->field('catname')->where("catid=".$v['catid'])->find();
					$pro_list[$k]['catname']=$cate_arr['catname'];
					if($sess_id){
							$collect_arr=$this->collect_db->field("id as colid")->where(array('vid'=>$sess_id,'ppid'=>$v['ppid']))->find();
							$pro_list[$k]['colid']=$collect_arr['colid'];
					}
					if(!empty($v['colorlist'])){
						$where_one['id']=array("in",$v['colorlist']);
						$para_list=$this->para_db->field("colorname")->where($where_one)->select();
						$pro_list[$k]['para_list']=$para_list;
					}	
				}
			$this->assign("pro_list",$pro_list); 
			$this->display();		
		
	}	
	
	
	
	
	
	
	
	
	
	//产品详情
	public function product_details(){
	    $catid=intval($_GET['catid']);
		$ppid=intval($_GET['ppid']);
		$pid=intval($_GET['pid']);
		
		$sess_id=$_SESSION['bobo_pc_user_id'];
	
		 // cookie('bobo_pc',null);
		$cookie_arr=cookie('bobo_pc');
			
		if(!empty($cookie_arr)){ $cookie_arr=unserialize($cookie_arr); }else{ $cookie_arr=array(); }

		$count=count($cookie_arr);

		if($count<5){
			if(!in_array($ppid,$cookie_arr)){
				array_unshift($cookie_arr,$ppid);
			}
		}else{
			if(!in_array($ppid,$cookie_arr)){
				array_pop($cookie_arr);
				array_unshift($cookie_arr,$ppid);
			}
		}
		$cookie_array=serialize($cookie_arr);
		cookie('bobo_pc',$cookie_array);
		$pro_list=$this->pro_db->field("tp_product.picurlpc,tp_product.title,tp_product.colorlist,a.price,a.capacity,tp_product.id as pid,tp_product.catid,a.id")->join("left join tp_product_price a on tp_product.id=a.pid")->where("tp_product.catid=$catid  and tp_product.status=1 ")->limit(6)->order('tp_product.listorder desc,tp_product.id desc')->select();

		foreach($pro_list as $k=>$v){
			$where_one['id']=array('in',$v['colorlist']);
			$where_one['status']=1;
			$para_list_one=$this->para_db->field("colorname,name")->where($where_one)->select();
			$pro_list[$k]['colorlist']=$para_list_one;
			if($sess_id){
				$collect_arr=$this->collect_db->field("id as colid")->where(array('vid'=>$sess_id,'ppid'=>$v['id']))->find();
				$pro_list[$k]['colid']=$collect_arr['colid'];
			}
		}
		
		
		
		$cate_arr=$this->cate_db->field("catname")->where("catid=$catid")->find();
		$pro_arr=$this->pro_db->field("tp_product.xqstatus,tp_product.content,tp_product.picurlpcall,tp_product.title,tp_product.colorlist,a.price,c.id as colid,a.id as ppid")->join("left join tp_product_price a on tp_product.id=a.pid left join tp_collect c on a.id=c.ppid")->where("tp_product.catid=$catid and tp_product.id=$pid and tp_product.status=1 and a.id=$ppid")->find();
		if($pro_arr['xqstatus']==1){
			$pro_arr['picurlpcall']=explode(",",$pro_arr['picurlpcall']);
			$where['id']=array('in',$pro_arr['colorlist']);
			$where['status']=1;
			
			$para_list=$this->para_db->field("colorname,name")->where($where)->order("field (id,".$pro_arr['colorlist'].")")->select();

			$pro_arr['colorlist']=$para_list;
			$this->assign("pro_list",$pro_list);
			$this->assign("pro_arr",$pro_arr);
			$this->assign("cate_arr",$cate_arr);
			$this->assign("link_list",$link_list);
			$this->display();
		}else{
			$this->error('此产品已下架');
		}
		
	}
		
	public function addCollect(){
		$sess_id=$_SESSION['bobo_pc_user_id'];
		if($sess_id){
			$data['ppid']=intval($_POST['ppid']);
			$data['vid']=$sess_id;
			$count=$this->collect_db->where(array('ppid'=>$data['ppid'],'vid'=>$sess_id))->count();
			if($count<1){
			$msg=$this->collect_db->add($data);
			}else{
				$this->error("您已收藏了该产品");
			}
			echo $msg;
		}else{
			
			$this->error("请先登录");
		}

		
		
		
	}
	
	public function delCollect(){
		$sess_id=$_SESSION['bobo_pc_user_id'];
		if($sess_id){
			$id=intval($_POST['colid']);
			$msg=$this->collect_db->where(array("id"=>$id))->delete();
			echo $msg;
		}else{
			
			$this->error("请先登录");
		}
		
		
		
	}
	

	
	
	
}