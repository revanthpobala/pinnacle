<?php
class MessagesController extends AppController
{
	public $name='Messages';
	public $helper=array('Html','Form');
        public $components=array('Session');
        var $uses=array('','');
        
        
        
        
        
   	 public function msg()
   	 {
   	 	$this->layout="public5";
   	 	$result=$this->Msg->find('all');
   	 	$this->set('posts',$result);
   	 }
   	 public function msg_save($name)
   	 {
   	 	$this->layout="public5";
   	 	$this->Session->write('name',$name);
   	 	
   	 	
   	 	
   	 }
    	
    
}
