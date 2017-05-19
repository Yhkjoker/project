<?php
// 本类由系统自动生成，仅供测试用途
class MemberAction extends CommonAction {
	private $vip_db,$collect_db,$cate_db,$para_db,$try_out_db,$pro_price_db;
	function __construct(){
		parent::__construct();
		$this->vip_db=M("Vipuser");
		$this->collect_db=M("Collect");
		$this->cate_db=M("Category");
		$this->para_db=M("Parameter");
		$this->try_out_db=M("Try_out");
		$this->pro_price_db=M("Product_price");

		
	}
	//会员服务
	public function member(){
		$sess_id=$_SESSION['bobo_pc_user_id'];
		if(empty($sess_id)){
		
			$sess_id=0;
		}
		$vip_arr=$this->vip_db->where('vid='.$sess_id)->find();
		$this->assign('vip_arr',$vip_arr);
		$this->display();
	}
	
	
	public function dologin(){
		$username=trim($_POST['username']);
		$password=$_POST['password'];
		if(preg_match("/^1[34578]\d{9}$/",$username)){
			if(preg_match("/^[\w\W]{6,16}$/",$password)){
				$arr=$this->vip_db->where(array("username"=>$username))->find();
					if($arr){
							if($arr['password']==md5($password)){
									session_start();
									$_SESSION['bobo_pc_user_id']=$arr['vid'];
									$_SESSION['bobo_pc_user_name']=$arr['username'];
									$_SESSION['bobo_pc_user_nickname']=$arr['nickname'];
									echo '{"info":"登录成功，请稍后...","status":"y"}';	
									
									
							}else{
									echo '{"info":"密码错误","status":"n"}';	
								
							}
							
					}else{
						echo '{"info":"用户名不存在","status":"n"}';	
					}
			}else{
				$this->error('密码格式错误');
			}		
		}else{
			$this->error('用户名格式错误');
			
		}
		
	}

		//退出
	public function outMember(){
		unset($_SESSION['bobo_pc_user_name']);
		unset($_SESSION['bobo_pc_user_nickname']);
		unset($_SESSION['bobo_pc_user_id']);
		$this->redirect("Index/index");
		
	}
	
	
	
		
	public function doregister(){
		$info=$_POST['info'];
		$username=trim($info['username']);
		if($_SESSION[$username]==$info['code']) {
				if(preg_match("/^1[34578]\d{9}$/",$username)){
					if(preg_match("/^[\w\W]{6,16}$/",$info['password'])){
						
						$data=$this->vip_db->where(array('username'=>$username))->count();
						if($data>0){
							echo '{"info":"手机号已被注册","status":"n"}';				
						}else{
							$info['password']=md5($info['password']);
							$this->vip_db->add($info);
							echo '{"info":"注册成功","status":"y"}';
		
						}
					}else{
						
						$this->error("您输入的格式有误!");
						
					}	
						
				}else{
						$this->error("您输入的手机格式有误!");
					
				}
				
		}else{
		
			echo '{"info":"验证码错误","status":"nn"}';
		
		}
				
	}
	
	
	
	
	public function member_change(){
		$sess_id=$_SESSION['bobo_pc_user_id'];
		if(!empty($sess_id)){
			$vip_arr=$this->vip_db->where("vid=".$sess_id)->find();
			$this->assign("vip_arr",$vip_arr);
			$this->display();
		}else{
			$this->error("请先登录");
		}
		
		
	}
	
	
	
	public function upMemberInfo(){
		$sess_id=$_SESSION['bobo_pc_user_id'];
		$action=$_GET['action'];
		$info=$_POST['info'];
		if($action=='uppass'){

			$passwordold=md5($info['passwordold']);
			$vip_count=$this->vip_db->where("vid=$sess_id and password='$passwordold'")->count();
			if($vip_count==1){
				if(preg_match("/^[\w\W]{6,16}$/",$info['password'])){
					$data['password']=md5($info['password']);
					$data['vid']=$sess_id;
					$this->vip_db->save($data);
					echo '{"info":"密码修改成功","status":"y"}';
				}else{
					
					$this->error("密码格式不正确");
				}
			}else{
				echo '{"info":"旧密码不正确","status":"n"}';
			}

		}elseif($action=='upinfo'){
				$this->vip_db->where("vid=".$sess_id)->save($info);
				echo '{"info":"修改信息成功","status":"y"}';
		}
		
		
		
	}
	
	
	
	
	
	
	
		    public function message() {
			$username=$_POST['phone'];
            vendor('SMS.nusoap');
            $client = new nusoap_client('http://www.jianzhou.sh.cn/JianzhouSMSWSServer/services/BusinessService?wsdl', true);
            $client->soap_defencoding = 'utf-8';
            $client->decode_utf8      = false;
            $client->xml_encoding     = 'utf-8';
            $err = $client->getError();
				if ($err) {
						echo '{"info":"系统繁忙，请30秒后重试","status":"n"}';	
				}
				$_SESSION[$username] = $code = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
				$params = array(
					'account' => 'sdk_mofang',
					'password' => 'jianzhou',
					'destmobile' =>  $username,
					'msgText' => "bobo注册验证码:$code 【建周科技】",
				);

				$result = $client->call('sendBatchMessage', $params, 'http://www.jianzhou.sh.cn/JianzhouSMSWSServer/services/BusinessService');
				if ($client->fault) {
						echo '{"info":"系统繁忙，请30秒后重试","status":"n"}';	
				} else {
					$err = $client->getError();
					if ($err) {
					echo '{"info":"系统繁忙，请30秒后重试","status":"n"}';	
					} else {
					echo '{"status":"y"}';	
					}
				}
		

    }
	
	
	//会员服务
	public function product(){
		$sess_id=$_SESSION['bobo_pc_user_id'];
		if(empty($sess_id)){
		
			$sess_id=0;
		}
		
			$where="";
			$where.="a.status=1 and c.vid=$sess_id and c.ppid=b.id and  b.pid=a.id ";
			$pro_list=$this->collect_db->field("a.xqstatus,a.title,a.picurlpc,a.catid,a.id,b.capacity,b.price,b.id as ppid,a.colorlist,b.fmpicurl")->table("tp_collect c,tp_product_price b,tp_product a")->where($where)->order("a.listorder desc,id desc")->select();


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
	
	
	public function addTryPro(){
		$sess_id=$_SESSION['bobo_pc_user_id'];
		if(!empty($sess_id)){
			$data['ppid']=intval($_POST['ppid']);
			$data['vid']=$sess_id;
			$data['inputtime']=time();
			$pro_price_count=$this->pro_price_db->join("left join tp_product a on tp_product_price.pid=a.id")->where(array('a.actstatus'=>1,'a.status'=>1,'tp_product_price.id'=>$data['ppid']))->count();

			if($pro_price_count==1){
				$try_count=$this->try_out_db->where(array('ppid'=>$data['ppid'],'vid'=>$data['vid']))->count();
				if($try_count==0){
				$data=$this->try_out_db->add($data);
				}else{
				 $data="n"	;
				}
			}else{
				$this->error("非法操作");
			}
			echo $data;
		}else{
			$this->error("请先登录");
			
		}
		
		
	}
	
	
	

	
}