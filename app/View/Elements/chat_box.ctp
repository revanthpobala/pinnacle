<div>
<?php
	if(isset($set)){
foreach($set as $dat){
	echo $dat['Message']['sender']."=>".$dat['Message']['message'];
	echo $dat['Message']['receiver']."=>".$dat['Message']['message'];
	echo "<br>";

}}

?>
</div>
