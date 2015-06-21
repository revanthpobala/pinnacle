<?php
	class ChatsController extends AppController
{
	var $arr=array();
 	var $name = 'Chats';
 	var $uses=array("Chat","User");
 	var $helpers=array('Html','Form');
   	public $paginate = array(
       		 'limit' => 5,
        'order' => array(
            'Chat.name' => 'asc'
        )
    );
    
   	 public $components = array(
        'Session');
   	 
   	 public function chatuser()
   	 {
   	 	$this->layout="user";
   	 	$result=$this->Chat->find('all');
   	 	$this->set('posts',$result);
   	 }
   	 public function convo($name)
   	 {
   	 	$this->layout="user";
   	 	$this->Session->write('name',$name);
   	 	
   	 	
   	 }
   	 public function conversation()
   	 {
   	 	$this->autoRender=false;
   	 	pr($_POST);die;
   	 	
   	 
   	 }
    	
    
   	}
?>
