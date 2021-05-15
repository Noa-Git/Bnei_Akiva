<body>

<div class="container">

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/logo/blue_logo.png'); ?>" id="login-logo">
	</div>

	<div>
		<br>
		<h2>!ההרשמה בוצעה בהצלחה</h2>
	</div>

	<div class="form-div">
		<?php
		echo form_open('Login/regitserOneMoreStudent'); ?>

		<input  type="hidden" name="parentEmail" readonly value="<?php echo set_value('parentEmail'); ?>">
		<input  type="hidden" name="password" readonly value="<?php echo set_value('password'); ?>">

		<input name='finish' type="submit" class="btn" id="endSubmitBtn" value="הוספת חניך נוסף">
		<?php form_close();?>

		<a href= "<?php echo site_url('Login/loadRegistrationComplete')?>">
			<input type="button"  class="btn" id="endSubmitBtn" value="סיום הרשמה">
		</a>
		</br><br>
	</div>
</div>
</body>
