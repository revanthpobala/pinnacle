<?php
echo $this->Form->create('Category');
echo $this->Form->input('id',array('id'=>'id','label'=>'Category Id'));
echo $this->Form->input('name',array('id'=>'name','label'=>'Category Name'));
echo $this->Form->input('status',array('id'=>'status','label'=>'Status'));
echo $this->Form->end('save');
?>
