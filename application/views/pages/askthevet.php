<div class = "page_content">
<p><a href="<?php echo base_url(); ?>Contact/contact_view">Contact </a>us if you have a question that you would like answered here.<br>

<?php

foreach ($questions as $object){
	echo "<dl><dt>".$object->question."</dt>" ;
	echo "<dd>".$object->answer."</dd></dl>" ;
	
	
}
?>

<br>
</p>



</body>
