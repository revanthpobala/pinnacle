<?php $this->Html->script('jQuery'); ?>
<script>
	$(document).ready(function(){
	$("#btn").click(function(){
	alert("xs");
	var msg=$(".message").attr('value');
    alert(msg);}); });
/*    getNewActivity();
   });
});
function getNewActivity()
{
   
    var checkNewFlag=0;
    var msg=$(".message").attr('value');
    alert(msg);
    setInterval(function(){
        if(checkNewFlag==0)
        {
            checkNewFlag=1;
            
            $.post("/Chats/conversation",{'msg':msg},function(response){
                checkNewFlag=0;
                if(response="")
                {
                  
                }
               
            });
        }
    },5000);}*/







</script>
<?php echo $this->Html->link('>>Back',array('action'=>'chatuser','controller'=>'Chats'));?>
<div style="width:20%;height:100%;border:1px solid black;margin-top:10%;">
<div id="show"style="width:100%;height:100%;border:1px solid black">



<?php
	echo $this->Form->create('Message');
	?><?php
	echo $this->Form->input('message',array('label'=>'','type'=>'textarea','class'=>"message",'placeholder'=>"Enter your message",'style'=>"margin-top:205%;width:195px"));    
	?><div style='margin-left:60%;'> 
	<?php echo $this->Form->input('Submit',array('type'=>'button','id'=>"btn"));
	?><?php echo $this->Form->end(); ?> 
</div></div>
</div>
