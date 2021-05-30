<html>
<head>
	<title>My Form</title>
</head>
<body>

<?php
echo form_open('Member/approve_members'); ?>
<input type="email" name="users_email">
<input name='finish' type="submit" class="btn" id="endSubmitBtn" value="אשר חניך זה">

<?php form_close(); ?>


</body>
</html>
