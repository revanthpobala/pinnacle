
<div class="welcome">
<h1 class="title"> <span>Your Company</span></h1>
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
<?php echo $this->Html->link('Home',array('controller'=>'Users','action'=>'login','style'=>'font-size:15px;')); ?>

<div class="ss">
<span style="font-size:25px;">User Registration</span>  
<?php
	echo $this->Form->create('User',array('method'=>'post')); ?></div>
	<div class="ss"><?php echo $this->Form->input('username',array('id'=>'name','style'=>'background-color:transparent')); ?></div>
	
	<div class="ss"><?php echo $this->Form->input('email',array('id'=>'email','type'=>'email',
		'style'=>'background-color:transparent'));?></div>
	<div class="ss"><?php echo $this->Form->input('password',array('id'=>'password','type'=>'password',
		'style'=>'background-color:transparent'));?></div>
		<div class="ss"><?php echo $this->Form->input('password_confirm',array('id'=>'password_confirm','type'=>'password',
		'style'=>'background-color:transparent'));?></div>
	<div class="ss"><?php echo  $this->Form->end('Registration'); ?></div>
	 <div><?php echo $this->Form->reset('Reset');
?></div>
 </div>

</div>
