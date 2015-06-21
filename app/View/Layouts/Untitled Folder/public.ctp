<html>
    <head>
        <title>Home</title>
        <?php echo $this->Html->css('home'); ?>
    </head>
	<body>
		<div id="outer">
            		<div id="main">
			
			<?php echo $this->Element('public3'); ?>
			
			<?php echo $this->fetch('content');?>
			
			
			
			
			</div>
		
		</div>
    	</body>
</html>
