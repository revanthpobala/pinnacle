<style>
.ss{
padding:10px;
margin:10px;
}
input{
padding:5px;
margin:10px;
}
</style>
User Details
<?php
	echo $this->Form->create('User',array('method'=>'post')); 
	echo $this->Form->input('id',array('id'=>'id','style'=>'background-color:transparent;border:1px grey dashed;')); 
	echo $this->Form->input('username',array('id'=>'name','style'=>'background-color:transparent;border:1px grey dashed;')); 
	
	 echo $this->Form->input('email',array('id'=>'email','type'=>'email',
		'style'=>'background-color:transparent;border:1px grey dashed;'));
	 echo $this->Form->input('password',array('id'=>'password','type'=>'password',
		'style'=>'background-color:transparent;border:1px grey  dashed;'));
		 echo $this->Form->input('status',array('id'=>'status','type'=>'text',
		'style'=>'background-color:transparent;border:1px grey  dashed;'));
	echo  $this->Form->end('Registration');

?>

