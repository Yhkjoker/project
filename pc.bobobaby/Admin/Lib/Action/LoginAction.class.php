<?php 
header("Content-Type:text/html; charset=utf-8");
class LoginAction extends Action{
	public function login(){
		$this->display();
	}
	public function doLogin(){
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$u=M("User");
		$where['username']=$username;
		$where['password']=$password;
		$arr=$u->where($where)->find();
		if($arr){
			$_SESSION['username']=$username;
			$_SESSION['id']=$arr['id'];
			echo '{"info":"登录成功！","status":"1"}';	
		}else{
			echo '{"info":"登录失败,用户名或密码错误！","status":"n"}';
		}
	}
	public function doLogout(){			
			$_SESSION=array();
				if(isset($_COOKIE[session_name()])){
					setcookie(session_name(),'',time()-1,'/');
				}
			session_destroy();
			$this->redirect('Login/login');
		}	
}

?>