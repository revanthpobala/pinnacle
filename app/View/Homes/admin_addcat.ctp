				<?php
echo $this->Form->create('Category');
echo $this->Form->input('product',array('type'=>'text','id'=>'name','name'=>'name','label'=>'Category Name'));	
echo $this->Form->end('Add');
?>
