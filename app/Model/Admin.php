<?php
	class Admin extends AppModel
	{
		public $name="Admin";
		var $validate = array(
      	 			'email' => array(
       					 'rule' => 'email',
            				 'message' => 'You have entered an invalid e-mail'  )
            				 );
	}
	
?>
