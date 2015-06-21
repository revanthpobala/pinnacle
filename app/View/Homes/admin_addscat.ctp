				<?php
echo $this->Form->create('Category');
echo $this->Form->input('Category name',array('type'=>'text','id'=>'name','name'=>'name'));	
echo $this->Form->select('Sub',$ca,array('empty'=>'-select-'));
echo $this->Form->end('Add');
?>
	
