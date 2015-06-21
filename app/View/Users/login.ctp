<div id="rock">
<div id="flash"><?php echo $this->Session->Flash();?></div>
<div id="adm"><?php echo $this->Html->link('Sign Up',array('controller'=>'Users','action'=>'register')); ?>
<?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('User');
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
?>
</div>
</div>
