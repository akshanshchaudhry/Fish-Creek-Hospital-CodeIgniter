<div class = "page_content">
<h2>Contact Fish Creek</h2>
<p>Required fields are maked with an asterisk (*).<br></p>
<?php
$this->load->library('form_validation');
        echo validation_errors(); ?>
<?php echo form_open('contact/save_contact'); ?>
<table>
<tr>
<td><label for="name">* Name: </label></td>
<td> <input type="text" name="name" value="<?php echo set_value('name'); ?>"> </td>
</tr>
<tr>
<td><label for="email">* E-mail: </label></td>
<td> <input type="email" name="email" value="<?php echo set_value('email'); ?>"></td>
</tr>
<tr>
<td><label for="comments">* Comments: </label></td>
<td> <textarea  name="comments" value="<?php echo set_value('comments'); ?>" row="30" col="15" /> </textarea></td>
</tr>
<tr>
<td></td>
<td>
 <input type="submit" value="Send Now" name="send_contact">
 </td>
 </tr>
</table>
<?php echo form_close(); ?>


</body>
</div>
</body>
</html>
