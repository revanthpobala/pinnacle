<?php
class Message extends AppModel
{
	var $name="Message";
	public $belongsTo=array('Sender'=>array('className'=>'User','foreignKey'=>'sender'));
}
?>
