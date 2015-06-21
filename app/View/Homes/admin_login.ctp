<div id="rock">
<div id="flash"><?php echo $this->Session->Flash();?></div>
<div id="adm"> <span style="font-size:20px;">Administration Login</span>
<?php
echo $this->Form->create('Admin');
echo $this->Form->input('email',array('id'=>'email','label'=>"Your Email"));
echo $this->Form->input('password',array('id'=>'password','type'=>'password','label'=>'password'));
echo $this->Form->end('Login');
echo $this->Form->end();
?>
</div>
</div>

