<body>

<div class="container">

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/logo/blue_logo.png'); ?>" id="login-logo">
	</div>

	<div>
		<h1>ברוכים השבים</h1>
	</div>

	<div class="form-div">
		<?php echo form_open('User/do_login'); ?>
		<div class="login-nocorrect">
			<?php if ($error): echo $error; ?>
			<?php endif ?>
		</div>

		<form id="logInForm" method="POST" action="" ;>
			<input type="email" id="login-phone" name="email" placeholder="אימייל" required
				   value="<?php echo set_value('email'); ?>">
			<div class="login-error hidden" id="phone-error">יש להזין את האימייל שלכם</div>

			<input type="password" id="login-password" name="password" placeholder="סיסמה" required>
			<div class="login-error hidden" id="password-error">יש להזין את ססמת הכניסה שלכם</div>

			<input type="submit" class="btn" id="loginBtn" value="כניסה">
		</form>
	</div>

	<span id="forgotPassword">
             <a href='user/forgot_password/'>שכחת את הסיסמה?</a>
        </span>

	<div id="gotoSignIn">
		<?php echo anchor('User/loadRegisterParent', ' חדשים כאן? לחצו כדי להירשם', 'class="link-class"') ?>


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

<!--<script src="<?php // echo base_url('/assets/js/login.js'); ?>"></script>-->

</body>
