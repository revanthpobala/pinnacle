<html>
    <head>
        <title>Home</title>
        <?php echo $this->Html->css('user'); 
       ?>    </head>
	<body>
		
            <div class="main-out">
				<div class="main">
					<div class="page">
						<div class="top">
							<div class="header">
								<div class="header-top">
									<h1> <span>Pinnacle.com</span></h1>
									<p>Call Us: 000 0000 000</p>
								</div>
								<div class="topmenu">
								<?php echo $this->Element('umenu'); ?>
								</div>
								<div class="header-img">
								<?php echo $this->Element('uheader'); ?>
								</div>
							</div>		
								
							<div class="content">
								<div class="content-left">
									
											<?php echo $this->fetch('content');?>
										
								</div>
								<div class="content-right">
									<h2>Main Menu</h2>
										<?php echo $this->Element('rightmenu');?>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								</div>
							</div>
					</div>			
						
								
							
					<div class="bottom">
						<?php echo $this->Element('ufooter');?>
					</div>

				</div>
			</div>
		</div>

    	</body>
</html>
