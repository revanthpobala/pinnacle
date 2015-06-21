<html>
    <head>
        <title>Home</title>
        <?php echo $this->Html->css('newcs'); ?>
    </head>
	<body>
		<div class="outer">
            		<div class="main">
			
			<?php echo $this->Element('pheader'); ?>
			
			<?php echo $this->fetch('content');?>
			
			<?php echo $this->Element('pfooter');?>
			
			
			</div>
		</div>


    	</body>
</html>
