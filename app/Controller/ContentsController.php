<?php
class ContentsController extends AppController
{
	var $name="Contents";
	var $uses="Content";
	
	
	public function admin_cms()
	{
		$this->layout="dashboard";
		if(!empty($this->data))
		{
		//pr($this->data);die;
			$this->Content->save($this->data);
			echo "Successfully Inserted";die;
		}
		
	}
	public function about_us() {
	$this->layout="user";
	$post=$this->Content->find('all',array('conditions'=>array('search_name'=>'about_us')));
	$this->set('posts',$post);

	}
	public function contact_us() {
	$this->layout="user";
	$post=$this->Content->find('all',array('conditions'=>array('search_name'=>'contact_us')));
		$this->set('posts',$post);

	}
	public function faq() {
	$this->layout="user";
	$post=$this->Content->find('all',array('conditions'=>array('search_name'=>'FAQ')));
		$this->set('posts',$post);

	}
	public function admin_pagelist()
		{
			$this->layout="dashboard";
			$content=$this->Content->find('all');
			$this->set('posts',$content);
		}
	public function admin_delete()
	  	{
	  		$this->autoRender=false;
	   		$val=$_POST;
	   		
	   		if(!empty($val['id']))
			{
				if($this->Content->updateAll(array('Content.status'=>1),
				array('Content.id'=>$val['id'])))
				{
					echo $val['delid'];
				}
				else
				{
					echo '0';
				}
	    		}
	 	}
	 	public function admin_edit($id)
		{
			$v=$this->Content->find('first', array('conditions' => array('id' => $id)));
			if(!empty($this->data))
			{
				$this->Content->id=$id;
				if($this->Content->save($this->data))
				{
					return $this->redirect(array('action'=>'pagelist'));
				}
			}
			else
			{
				$this->request->data=$v;
			}	
		}
} 
?>

