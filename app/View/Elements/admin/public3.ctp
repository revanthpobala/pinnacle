<html>
<head>
  <title>Your Company</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
<div class="page">
<div class="header">
<span class="searchbox">                    
            <input type="text" placeholder="Search" size="15" name="search">
            <input type="hidden" value="">                  
</span> 
<div class="banner">
<?php
	if($this->Session->check('id'))
	{ 
 	?><span style="float:right;margin-right:50px;font-size:18px;"> <?php echo "Welcome &nbsp; &nbsp;".$this->Session->read('name'); ?></span> <?php
 		echo $this->Html->Link('Logout',array('controller'=>'Homes','action'=>'logout'),array	('class'=>'logoutcls'));
  	}
?>
<h1>Pinnacle</h1>
</div>

<div class="topmenu">
<ul>
  <li style="border-left: medium none;"><a href="index.html">Home</a></li>
  <li><a href="#">About Us</a></li>
  <li><a href="#">Recent articles</a></li>
  <li><a href="#">Email</a></li>
  <li><a href="#">Resources</a></li>
  <li><a href="#">Links</a></li>
  <li><a href="#">Contact</a></li>
</ul>
</div>
</div>
