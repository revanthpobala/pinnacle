<?php 
echo $this->Html->script('jQuery');
 echo $this->Html->css('validationEngine.jquery');
 echo $this->Html->script('jqueryValidationEngine/jquery.validationEngine-en.js');
 echo $this->Html->script('jqueryValidationEngine/jquery.validationEngine.js');
?>
<script type="text/javascript">
jQuery(document).ready(function(){    
alert("xcd");  
     jQuery("#Order").validationEngine();
});
</script>

<?php
	
echo $this->Form->create('Order',array('id'=>'Order'));

echo $this->form->input('email', array('class' =>'validate[required]','name'=>'email'));
echo $this->form->input('password', array('class' =>'validate[required]','name'=>'password'));
echo $this->form->end('Send');

?>
