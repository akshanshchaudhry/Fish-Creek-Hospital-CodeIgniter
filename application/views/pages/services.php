<div class = "page_content">
<p>
<ul>

<?php
foreach ($services as $object){
	echo "<li><strong><span>".$object->servicename."</span></strong><br></li>".$object->description ;	
}
?>


</ul>

</p>


<br>
<br>
