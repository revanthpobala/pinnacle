<!DOCTYPE html>
<html>
<head>
<?php 
 echo $this->Html->charset(); ?>
<title>::Form::</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->script('jquery'); 

		echo $this->Html->css('style');
		echo $this->Html->css('jqtransform');
		echo $this->Html->script('lib');
		echo $this->Html->script('custom');
		echo $this->Html->script('jquery.jqtransform');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	


<script language="javascript">
		$(function(){

			//$('.select_new, .radio_new, .check_new').jqTransform({imgPath:'images/'});
		});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.jqTransformSelectWrapper').css('z-index','auto');
		$('.jqTransformSelectWrapper ul').css('z-index','1').css('border-radius','4px');
	});
</script>
</head>
<body>
	
		<!--Main Wrapper Starts-->
    <section id="main_wrapper">
    	<!--Header Wrapper Starts-->
        <section id="header_wrapper">
        	<!--Header Starts-->
             <?php echo $this->Element('header'); ?>
                <!--Search Section Ends-->
            </header>
            <!--Header Ends-->
        </section>
        <!--Header Wrapper Ends-->
        <!--Navigation Starts-->
              <?php echo $this->Element('menu'); ?>
            <!--Navigation Ends-->
            
            <!--Content Wrapper Starts-->
            <section id="cont_wrapper">
            	<!--Content Starts-->
                <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
                <!--Content Ends-->
            </section>
            <!--Content Wrapper Ends-->
            <section class="push"></section>
    </section>
    <!--Main Wrapper Ends-->
    <!--Footer Wrapper Starts-->
      <?php echo $this->Element('footer'); ?>
    <!--Footer Wrapper Ends-->
		
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
