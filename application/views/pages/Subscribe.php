<div class = "page_content">

<h2>Subscribe Fish Creek</h2>
<p>
Required fields are maked with an asterisk (*).</p>

<?php
$this->load->library('form_validation');
        echo validation_errors(); ?>
<?php echo form_open('Subscribe/subscribe_validation'); ?>


<table>
<tr>
<td><label for="client_full_name">* Client Full Name:</label></td>
<td> <input type="text" name="client_full_name" value="<?php echo set_value('client_full_name'); ?>"> </td>
</tr>
<tr>
<td><label for="address">* Address:</label></td>
<td> <input type="text" name="client_address" value="<?php echo set_value('client_address'); ?>" ></td>
</tr>
<tr>
<td><label for="client_email">* E-mail:</label></td>
<td> <input type="email" name="client_email" value="<?php echo set_value('client_email'); ?>"></td>
</tr>
<tr>
<td><label for="client_phone">* Phone:</label></td>
<td> <input type="text" name="client_phone" value="<?php echo set_value('client_phone'); ?>"></td>
</tr>
<tr>
<td><label for="client_password">* Password:</label></td>
<td> <input type="password" name="client_password" value="<?php echo set_value('client_password'); ?>"></td>
</tr>
<tr>
<td><label for="type_of_service">* Type of Service:</label></td>
<td>  
<?php

echo '<select name = "service_name">' ;

foreach ($services as $object){
	echo "<option>".$object->servicename."</option>";
}
 
echo "</select>"
?>


</td>
</tr>
<tr>
<td><label for="pet">* Pet:</label></td>
<td> 
<?php

echo '<select name = "pet_name">' ;
foreach ($pet as $object){
	echo "<option>".$object->petname."</option>";
}
 
echo "</select>"

?>
</td>
</tr>
<tr>
<td></td>
<td>
 <input type="submit" value="Send Now" name="send_now_subscribe"></td></tr>
</table>
<?php echo form_close(); ?>


</span>
</body>

