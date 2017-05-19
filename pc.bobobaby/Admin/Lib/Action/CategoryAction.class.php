<?php
header("Content-Type: text/html; charset=utf-8");
// 本类由系统自动生成，仅供测试用途
class CategoryAction extends CommonAction {
	static protected $treeList = array();
	private $cate_db;
	function __construct(){
		$this->cate_db=D("Category");
		parent::__construct();
	}
	static protected function tree(&$data,$pid=0,$count=1){
		foreach($data as $key=>$val){
			if($val['parentid']==$pid){
				$val['count']=$count;
				self::$treeList[]=$val;
				unset($data[$key]);
				self::tree($data,$val['catid'],$count+1);
			}
		}
		return self::$treeList;
	}
	
	
	//栏目管理
    public function category(){
		$list=$this->cate_db->field("catid,catname,type,parentid,concat(arrparentid,'-',catid) as bpath,model,listorder")->where('siteid=1')->order("parentid,listorder")->select();
		 foreach($list as $key=>$value){
		 $list[$key]['count']=count(explode('-',$value['bpath']))-1;
		}

		$list=self::tree($list);

		$this->assign('list',$list);
		$this->display();
	}
	//添加栏目
	public function addCategory(){
		$list=$this->cate_db->field("catid,catname,type,parentid,concat(arrparentid,'-',catid) as bpath")->order('bpath')->select();
		foreach($list as $key=>$value){
			$list[$key]['count']=count(explode('-',$value['bpath']))-1;
		}

		$this->assign('list',$list);
		$this->display();
	}
	
	
	//修改栏目
	public function upCategory(){
		$catid=intval($_GET['catid']);
		$arr=$this->cate_db->where("catid=$catid")->find();
		$list=$this->cate_db->field("catid,catname,type,parentid,concat(arrparentid,'-',catid) as bpath,model")->order('bpath')->select();
		foreach($list as $key=>$value){
			$list[$key]['count']=count(explode('-',$value['bpath']))-1;
		}
		$this->assign('arr',$arr);
		$this->assign('list',$list);
		$this->display();
		
	}
	
	
	public function doCategory(){
		$action=$_GET['action'];
		if($action=="add"){//添加栏目
				if(!$this->cate_db->create()){
					$this->error($this->cate_db->getError());
				}else{
						$info=$this->cate_db->data();
						$child=array('child'=>0);
						$info=array_merge($child,$info);
						$catid=$this->cate_db->add();
						$this->cate_db->where("catid=$catid")->save(array("arrchildid"=>$catid));
					if($_POST['info']['parentid']!=0){
						$arrparentid_arr=explode("-",$info['arrparentid']);
						$arrparentid_arr=array_splice($arrparentid_arr,1);
						$count=count($arrparentid_arr);
						for($i=0;$i<$count;$i++){
								$arr=$this->cate_db->field("arrchildid")->where(array("catid"=>$arrparentid_arr[$i]))->find();
								$data['child']=1;
								$data['arrchildid']=$arr['arrchildid']."-".$catid;
								$this->cate_db->where(array("catid"=>$arrparentid_arr[$i]))->save($data);	
							
						}
					}
				echo '{"info":"添加成功","status":"y"}';
			}
		}elseif($action=="edit"){//修改栏目
				$catid=intval($_GET['catid']);
				if($catid==$_POST['info']['parentid']){
					echo '{"info":"父级栏目不允许为当前栏目","status":"n"}';
				}else{
					if(!$this->cate_db->create()){
						$this->error($this->cate_db->getError());
					}else{
						
						$info=$this->cate_db->data();
						$cate_arr=$this->cate_db->where("catid=$catid")->find();
						 $this->cate_db->where("catid=$catid")->save($info);
					
							if($info['arrparentid']!==$cate_arr['arrparentid']){
									//查询父id数组
									$arrparentid_arr=explode("-",$cate_arr['arrparentid']);
									//接收父id数组
									$info_arr=explode("-",$info['arrparentid']);
									//查询父id>接收到的父id （减）
									$ch_arr=explode("-",$cate_arr['arrchildid']);
									if(count($arrparentid_arr)>count($info_arr)){
							
										$list_arr=array_diff($arrparentid_arr,$info_arr);
						
										$list_arr=array_merge($list_arr);
										$list_count=count($list_arr);
									
										for($i=0;$i<$list_count;$i++){
											$arr=$this->cate_db->field("arrchildid")->where(array("catid"=>$list_arr[$i]))->find();
												
											$arrchildid_arr=explode("-",$arr['arrchildid']);
											$child_arr=array_diff($arrchildid_arr,$ch_arr);
											$count_a=count($child_arr);
			
											if($count_a==1){
												$data['child']=0;
											}else{
												$data['child']=1;		
											}
											$data['arrchildid']=implode("-",$child_arr);	
											$this->cate_db->where(array("catid"=>$list_arr[$i]))->save($data);			
										}
										
									}else{
										$list_arr=array_diff($info_arr,$arrparentid_arr);
										$list_arr=array_merge($list_arr);
										$list_count=count($list_arr);
										
										for($i=0;$i<$list_count;$i++){
											$arr=$this->cate_db->field("arrchildid")->where(array("catid"=>$list_arr[$i]))->find();								
											$arrchildid_arr=explode("-",$arr['arrchildid']);
											$child_arr=array_diff($arrchildid_arr,$arrparentid_arr);
											$child_arr=array_merge($child_arr,$ch_arr);
											$count_a=count($child_arr);
											if($count_a==1){
												$data['child']=0;
											}else{
												$data['child']=1;		
											}
											$data['arrchildid']=implode("-",$child_arr);	
											$this->cate_db->where(array("catid"=>$list_arr[$i]))->save($data);			
										}
										
									}

							}
							echo '{"info":"编辑成功","status":"y"}';
					}
				}
			}
		}			

	
	//栏目排序
	public function listorder()
	{
		$listorder=$_POST['listorder'];
		foreach($listorder as $k=>$v){
		$this->cate_db->where("catid=$k")->order('listorder')->save(array("listorder"=>$v));
		}
		$this->redirect('Category/category',array("cls"=>2));
	}
	//删除栏目
	public function catDelete(){
		$catid=intval($_POST['catid']);
		$cat_arr=$this->cate_db->where("catid=$catid")->find();
		$ch_arr=explode("-",$cat_arr['arrchildid']);
		$arr=explode("-",$cat_arr['arrparentid']);
		$parentid_arr=array_splice($arr,1);	
		$parentid_count=count($parentid_arr);
		for($i=0;$i<$parentid_count;$i++){
			$list_arr=$this->cate_db->field("arrchildid")->where(array("catid"=>$parentid_arr[$i]))->find();
			$childid_arr=explode("-",$list_arr['arrchildid']);
			$childid_array=array_diff($childid_arr,$ch_arr);

			$d_count=count($childid_array);
			 if($d_count==1){
				 $data['child']=0;
			 }else{
				$data['child']=1;
			 }
			$data['arrchildid']=implode("-",$childid_array);

			 $this->cate_db->where(array("catid"=>$parentid_arr[$i]))->save($data);
		}
		 $count=count($ch_arr);	 
		 for($j=0;$j<$count;$j++){
		$data=$this->cate_db->where(array("catid"=>$ch_arr[$j]))->delete(); 
		}
	echo $data;
	}

	
}