<body>

<div class="container">

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/logo/blue_logo.png'); ?>" id="login-logo">
	</div>

	<div>
		<h1>ברוכים השבים</h1>
	</div>

	<div class="form-div">
		<?php echo form_open('User/send_password'); ?>
		<div class="NotExist">
			<?php if ($error): echo $error; ?>
			<?php endif ?>
		</div>
		<form id="forgotPassForm" method="POST" action="" ;>
			<br>
			<h6>הזן כתובת מייל לאיפוס סיסמה</h6>
			<input type="email" id="login-phone" name="email" placeholder="אימייל" required
				   value="<?php echo set_value('email'); ?>">
			<div class="NotExist-error hidden">יש להזין את האימייל שלכם</div>
			<input type="submit" class="btn" id="loginBtn" value="שלח">
		</form>
	</div>

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/bnei-akiva/2.png'); ?>" id="login-img">
	</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="<?php echo base_url('/assets/js/login.js'); ?>"></script>

</body>
