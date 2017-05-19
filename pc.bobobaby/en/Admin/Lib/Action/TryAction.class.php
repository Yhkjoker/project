<?php 
class TryAction extends CommonAction{
	//单页面
	private $try_out_db,$problem_db,$problem_data_db;
	function __construct(){
		parent::__construct();
		$this->try_out_db=M("Try_out");
		$this->problem_db=M("Problem");
		$this->problem_data_db=M("Problem_data");
	}

	public function index(){
		$status=intval($_GET['status']);
		import('ORG.Util.Page');
		$count=$this->try_out_db->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where(array('en_try_out.status'=>$status))->count();
		$page  = new Page($count,10);
		$show=$page->show();
		$try_list=$this->try_out_db->field("en_try_out.id,a.username,c.title,b.capacity,en_try_out.inputtime,en_try_out.status")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where(array('en_try_out.status'=>$status))->limit($page->firstRow.','.$page->listRows)->order("en_try_out.id desc")->select();
		$this->assign("show",$show);
		$this->assign("try_list",$try_list);
		$this->display();
		
	}
	
	//搜索
	public function conSearch(){
		$factor=$_GET['factor'];
		$search=trim($_GET['search']);
		$status=$_GET['status'];
		if(!$search){
			$this->redirect('Try/index',array('status'=>$status,'cls'=>7));
		}
		$where="";
		if($factor==1){
			$where.="a.username ='$search' and en_try_out.status=$status";
		}elseif($factor==2){
			
			$where.="c.title like '$search' and en_try_out.status=$status";
		}
		
		import('ORG.Util.Page');
		$count=$this->try_out_db->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where($where)->count();
		$page  = new Page($count,10);
		$show=$page->show();
		$try_list=$this->try_out_db->field("en_try_out.id,a.username,c.title,b.capacity,en_try_out.inputtime,en_try_out.status")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where($where)->limit($page->firstRow.','.$page->listRows)->order("en_try_out.id desc")->select();
		$this->assign("show",$show);
		$this->assign("try_list",$try_list);
		$this->display();
	}
	
	
	//查看详情
	public function selMessage(){
		$id=intval($_GET['id']);
		$try_arr=$this->try_out_db->field("en_try_out.name,en_try_out.phone,en_try_out.address,a.username,c.title,b.capacity,en_try_out.inputtime,en_try_out.status,en_try_out.evaluate")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where(array('en_try_out.id'=>$id))->find();

		$this->assign("try_arr",$try_arr);
		$this->display();
	}
	
	//取消试用
	public function cancel(){
		$id=intval($_POST['id']);
		$data=$this->try_out_db->where("id=$id")->save(array('status'=>0));
		echo $data;
	}
	
	//审核通过
	public function passTry(){
		$id=intval($_POST['id']);
		$data=$this->try_out_db->where("id=$id")->save(array('status'=>2));
		echo $data;	
	}
	
	//产品已经发货
	public function fhchange(){
		$id=intval($_POST['id']);
		$data=$this->try_out_db->where("id=$id")->save(array('status'=>4));
		echo $data;	
		
	}
	
	//删除使用产品
	public function delsyPro(){
		$id=intval($_POST['id']);
		$data=$this->try_out_db->where("id=$id")->delete();
		echo $data;	
	}
	
	public function questionnaire(){
		import('ORG.Util.Page');
		$count=$this->problem_db->count();
		$page  = new Page($count,10);
		$show=$page->show();
		$problem_list=$this->problem_db->limit($page->firstRow.','.$page->listRows)->order("listorder desc,id desc")->select();
		$this->assign("show",$show);
		$this->assign("problem_list",$problem_list);
		$this->display();
	}
	
	
	
	public function addQues(){
		$this->display();
		
	}
	
	
	public function upQues(){
		$id=intval($_GET['id']);
		$prom_arr=$this->problem_db->where(array("id"=>$id))->find();
		$prom_list=$this->problem_data_db->where(array("pmid"=>$id))->select();
		$this->assign("prom_arr",$prom_arr);
		$this->assign("prom_list",$prom_list);
		$this->display();
		
	}
	
	//问卷排序
	public function conOrder(){
		$listorder=$_POST['listorder'];
		foreach($listorder as $k=>$v){
			$this->problem_db->where("id=$k")->order("listorder")->save(array("listorder"=>$v));	
		}
		$this->redirect("Try/questionnaire",array("cls"=>8));
	}
	
	//删除问题详细
	public function delQues_data(){
		$id=intval($_POST['id']);
		$data=$this->problem_data_db->where(array("id"=>$id))->delete();
		echo $data;
		
	}
	
	
	//删除问卷
	public function delQues(){
		$id=intval($_POST['id']);
		$this->problem_data_db->where(array("pmid"=>$id))->delete();
		$data=$this->problem_db->where(array("id"=>$id))->delete();
		echo $data;
		
	}
	
	//问卷是否显示
	public function show(){
		$id=intval($_POST['id']);
		$status=intval($_POST['status']);
		$data['status']=$status;
		$da=$this->problem_db->where("id=$id")->save($data);
		echo $da;
	}
	
	public function doQuestionnaire(){
		$info=$_POST['info'];
		$action=$_GET['action'];
		if($action=="add"){
			$data['title']=trim($info['title']);
			$msg['pmid']=$this->problem_db->add($data);
			foreach($info['quesname'] as $k=>$v){
				$msg['quesname']=$v;
				$msg['fieldname']=$info['fieldname'][$k];
				$msg['typeid']=$info['typeid'][$k];
				$msg['content']=$info['content'][$k];
				$this->problem_data_db->add($msg);
	
			}
			echo '{"info":"添加成功","status":"1"}';
		}elseif($action=="edit"){
			$info_up=$_POST['info_up'];
			$id=intval($_GET['id']);
			$data['title']=trim($info['title']);
			$this->problem_db->where("id=$id")->save($data);
			foreach($info_up as $k=>$v){
				$this->problem_data_db->where("id=".$k)->save($v);
			}
			$msg['pmid']=$id;
			foreach($info['quesname'] as $k=>$v){
				$msg['quesname']=$v;
				$msg['fieldname']=$info['fieldname'][$k];
				$msg['typeid']=$info['typeid'][$k];
				$msg['content']=$info['content'][$k];
				$this->problem_data_db->add($msg);
	
			}
			echo '{"info":"编辑成功","status":"1"}';
	}
	
}	
	
	
	

	
	
	
}
?>