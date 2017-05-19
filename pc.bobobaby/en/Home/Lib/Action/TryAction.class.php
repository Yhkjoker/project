<?php
// 本类由系统自动生成，仅供测试用途
class TryAction extends CommonAction {
	private $try_out_db,$problem_data_db,$para_db,$collect_db,$pro_db;
	function __construct(){
		$this->try_out_db=M("Try_out");
		$this->problem_data_db=M("Problem_data");
		$this->pro_db=M("Product");
		$this->para_db=M("Parameter");
		$this->collect_db=M("Collect");
		parent::__construct();
	}
	
	
    public function index(){
		$sess_id=$_SESSION['bobo_pc_user_id'];
		if(empty($sess_id)){
			$sess_id=0;
		}else{
			$try_list=$this->try_out_db->field("en_try_out.id,c.title,b.capacity,en_try_out.status,c.picurlpc")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where("en_try_out.vid=$sess_id and en_try_out.status in (1,2,3,4,5)")->select();
			$this->assign("try_list",$try_list);
		}
		$this->display();
    }
	
	
	 public function product_list(){
		$pro_list=$this->pro_db->field("a.xqstatus,a.title,a.picurlpc,a.catid,a.id,b.capacity,b.price,b.id as ppid,a.colorlist,b.fmpicurl,a.id as pid")->table("en_product_price b,en_product a")->where("a.status=1 and  a.id=b.pid and a.actstatus=1")->order("a.listorder desc,id desc")->select();
		$this->assign("pro_list",$pro_list); 
		$this->display();
    }
	
	
	public function product_details(){
	    $catid=intval($_GET['catid']);
		$ppid=intval($_GET['ppid']);
		$pid=intval($_GET['pid']);
		$pro_arr=$this->pro_db->field("en_product.actstatus,en_product.activity,en_product.xqstatus,en_product.content,en_product.picurlpcall,en_product.title,en_product.colorlist,a.price,c.id as colid,a.id as ppid")->join("left join en_product_price a on en_product.id=a.pid left join en_collect c on a.id=c.ppid")->where("en_product.catid=$catid and en_product.id=$pid and en_product.status=1 and a.id=$ppid and en_product.actstatus=1")->find();
		$pro_arr['picurlpcall']=explode(",",$pro_arr['picurlpcall']);
		$where['id']=array('in',$pro_arr['colorlist']);
			$where['status']=1;
			
			$para_list=$this->para_db->field("colorname,name")->where($where)->order("field (id,".$pro_arr['colorlist'].")")->select();

			$pro_arr['colorlist']=$para_list;
		if($pro_arr['xqstatus']==1 && $pro_arr['actstatus']==1){
			$this->assign("pro_arr",$pro_arr);
			$this->display();
		}else{
			$this->error('此产品已下架');
		}
		
	}
	
	
	
	
		//试用中心详细页
	   public function schedule(){
		   
		$sess_id=$_SESSION['bobo_pc_user_id'];
			if(empty($sess_id)){
					$this->error("请先登录");
			}else{
				$id=intval($_GET['id']);
				$try_arr=$this->try_out_db->field("en_try_out.id,c.title,b.capacity,en_try_out.status,c.picurlpc,c.id as pid")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where("en_try_out.vid=$sess_id  and en_try_out.id=$id")->find();
				$try_list=$this->try_out_db->field("en_try_out.id,c.title,b.capacity,en_try_out.status,c.picurlpc")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where("en_try_out.vid=$sess_id and en_try_out.status in (1,2,3,4,5) and en_try_out.id !=$id")->select();
				$this->assign("try_arr",$try_arr);
				$this->assign("try_list",$try_list);
				$this->display();
			}
		
		}
		
		
		 //添加地址
		public function address(){
			$sess_id=$_SESSION['bobo_pc_user_id'];
			if(empty($sess_id)){
				$this->error("请先登录");
			}else{
				$id=intval($_GET['id']);
				$try_count=$this->try_out_db->where("vid=$sess_id and id=$id and status=2")->count();
				if($try_count==1){
					$this->assign("id",$id);
					$try_arr=$this->try_out_db->field("en_try_out.id,c.title,b.capacity,en_try_out.status,c.picurlpc,c.id as pid")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where("en_try_out.vid=$sess_id  and en_try_out.id=$id")->find();
					$try_list=$this->try_out_db->field("en_try_out.id,c.title,b.capacity,en_try_out.status,c.picurlpc")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where("en_try_out.vid=$sess_id and en_try_out.status in (1,2,3,4,5) and en_try_out.id !=$id")->select();
					$this->assign("try_list",$try_list);
					$this->assign("try_arr",$try_arr);
					$this->display();
				}else{
					$this->error("非法操作");
					
				}

			}
		}
		
		
		public function doAddress(){
			$sess_id=$_SESSION['bobo_pc_user_id'];
			$name=trim($_POST['name']);
			$address=trim($_POST['address']);
			$phone=trim($_POST['phone']);
			$id=intval($_POST['id']);
			if(empty($name)){ echo json_encode(array('status'=>'n','info'=>'请输入姓名'));exit; }
			if(empty($address)){ echo json_encode(array('status'=>'n','info'=>'请输入地址'));exit; }
			if(empty($phone)){ echo json_encode(array('status'=>'n','info'=>'请输入手机号码'));exit; }
			if(preg_match("/^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/",$phone)){
				
				$this->try_out_db->where("vid=$sess_id and id=$id")->save(array('name'=>$name,'address'=>$address,'phone'=>$phone,'status'=>3));
				echo json_encode(array('status'=>'y'));
			}else{
				echo json_encode(array('status'=>'n','info'=>'请输入正确的手机号码'));

			}	
			
		}
		
		
		public function questionnaire(){
			$sess_id=$_SESSION['bobo_pc_user_id'];
			if(empty($sess_id)){
				$this->error("请先登录");
			}else{
				$id=intval($_GET['id']);
				$pid=intval($_GET['pid']);
				$try_arr=$this->try_out_db->field("en_try_out.id,c.title,b.capacity,en_try_out.status,c.picurlpc")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where("en_try_out.vid=$sess_id  and en_try_out.id=$id")->find();
				if($try_arr['status']!=4){
					$this->error("非法操作");
				}
				$prom_list=$this->try_out_db->field("c.quesname,c.fieldname,c.content,c.typeid")->join("inner join `en_product_price` a  on en_try_out.ppid=a.id inner join `en_product` b on a.pid=b.id inner join `en_problem_data`c on b.pmid=c.pmid")->where("en_try_out.id=$id and en_try_out.vid=$sess_id")->select();

				import('ORG.Util.Form');
				$form=new form();   //提交到本页
				$form_item=array();
				$form->layout="cssli";
				foreach($prom_list as $k=>$v){
					$v['content']=explode("-",$v['content']);
					if($v['typeid']==1){
						$form_item[]=$form->form_radio("info[".$v['fieldname']."]",$v['content'],$v['quesname'],"");
					}elseif($v['typeid']==2){
						$form_item[]=$form->form_checkbox("msg[".$v['fieldname']."]",$v['content'],$v['quesname'],"");
					}
				}
				$form_list=$form->CreateForm($form_item);	
				$this->assign("try_arr",$try_arr);
				$this->assign("form_list",$form_list);
				$this->display();
			}	
			
			
		}
		
		
		public function doQuestionnaire(){
			$sess_id=$_SESSION['bobo_pc_user_id'];
			if(empty($sess_id)){
				$this->error("请先登录");
			}else{
					$info=$_POST['info'];
					$msg=$_POST['msg'];
					$id=intval($_GET['id']);
					$try_arr=$this->try_out_db->field("c.pmid")->join("left join `en_vipuser` a on en_try_out.vid=a.vid left join `en_product_price` b on en_try_out.ppid=b.id left join `en_product` c on b.pid=c.id")->where("en_try_out.vid=$sess_id  and en_try_out.id=$id")->find();
					$problem_data_list=$this->problem_data_db->field("quesname,fieldname,typeid")->where("pmid=".$try_arr['pmid'])->select();
					$string="";
					foreach($problem_data_list  as $key=>$val){
						if($val['typeid']==1){
							foreach($info as $k=>$v){
								if($k==$val['fieldname']){
								$string.=$val['quesname'].":".$v."<br/>";
								}
							}
						}elseif($val['typeid']==2){
							$string.=$val['quesname'].":";
							foreach($msg[$val['fieldname']] as $k=>$v){
								$string.=$v.",";
							}
							$string=rtrim($string,",");
							$string.="<br/>";
						
						}
					}
				$this->try_out_db->where("vid=$sess_id and id=$id")->save(array('evaluate'=>$string,'status'=>5));
				echo '{"status":"1","info":"感谢您的参与！"}'	;
					
			}
		}
		
		
		public function cancelRequest(){
			$sess_id=$_SESSION['bobo_pc_user_id'];
			if(empty($sess_id)){
				$this->error("请先登录");
			}else{
				$id=intval($_POST['id']);
				$try_count=$this->try_out_db->where("vid=$sess_id and id=$id and status=2")->count();
				if($try_count==1){
					$data=$this->try_out_db->where("vid=$sess_id and id=$id")->save(array('status'=>0));
					echo $data;
				}else{
					$this->error("非法操作");
					
				}
			}	
			
		}

}