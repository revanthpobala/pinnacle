<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
echo $this->Form->create('Content');
echo $this->Form->input('search_name');
echo $this->Form->textarea('content', array('class'=>'ckeditor'));
echo $this->Form->end('save');
?>
