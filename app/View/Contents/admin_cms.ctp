<?php 
echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
echo $this->Form->create('Content');
echo $this->Form->input('about',array('id'=>'about','type'=>'text','label'=>'About'));
echo $this->Form->input('search_name',array('id'=>'srch_name','type'=>'text','label'=>'Page Name'));
echo $this->Form->textarea('content',array('id'=>'content','class'=>'ckeditor'));
echo $this->Form->end('Save');



?>
