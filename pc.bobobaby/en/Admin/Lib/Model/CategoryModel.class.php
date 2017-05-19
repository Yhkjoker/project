<?php
class CategoryModel extends Model{
	 protected $_auto=array(
		array('catname','getCatname',3,'callback'),
		array('parentid','getParentid',3,'callback'),
		array('arrparentid','getArrparentid',3,'callback'),
		array('model','getModel',3,'callback'),
		array('type','getType',3,'callback'),
		array('caturl','getCaturl',3,'callback'),
		array('burl','getBurl',3,'callback'),
		array('listorder','getListorder',3,'callback'),
		array('nav','getNav',3,'callback')
	 );
	 protected function getCatname(){
		 return $_POST['info']['catname'];
		 
	 }
	  protected function getParentid(){

		 return $_POST['info']['parentid'];
		 
	 }
	  protected function getArrparentid(){
		$parentid=isset($_POST['info']['parentid'])?(int)$_POST['info']['parentid']:0;
		if($parentid==0){
		$data=0;
		}else{
		$list=$this->where("catid=$parentid")->find();
		$data=$list['arrparentid'].'-'.$list['catid'];//子类的path为父类的path加上父类的id
		}
		return $data;  
  }

		 
	  protected function getModel(){
		 return $_POST['info']['model'];
		 
	 }
	  protected function getType(){
		 return $_POST['info']['type'];
		 
	 }
	   protected function getCaturl(){
		 return $_POST['info']['caturl'];
		 
	 }
	 
	 protected function getBurl(){
		 return $_POST['info']['burl'];
		 
	 }
	 
	  protected function getListorder(){
		 return $_POST['info']['listorder'];
		 
	 }
	 protected function getNav(){
		 return $_POST['info']['nav'];
	 }
}
