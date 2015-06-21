<?php
class Chat extends AppModel
{
	var $name="Chat";
	 var $validate=array( 
    	'textarea'=>array(
    		'rule'=>'notempty',
    		'message'=>'Enter Text'),
    		    		);
}
?>
