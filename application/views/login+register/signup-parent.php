<body>

<div class="container">

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/logo/blue_logo.png'); ?>" id="login-logo">
	</div>

	<div>

		<h1>:חדשים כאן? הירשמו</h1>


		<h2>פרטי ההורה</h2>
	</div>

	<div class="form-div">
		<?php echo form_open('User/regitserParent'); ?>
		<div class="login-nocorrect">

              <?php echo validation_errors(); ?>
			<?php // if (form_error('parentEmail') != NULL)
//                        echo  "כתובת האימייל כבר קיימת במערכת " ; echo " "; ?>


		</div>
		<!--<form id="formParent" method="POST" action="/application/views/login+register/signup-student.php" ;>-->
		<div class="parent-panel">
			<div class="row">
				<div class="col-6">
					<input type="text" id="pfName" name="pfName" placeholder="שם פרטי" 
						   value="<?php echo set_value('pfName'); ?>">
				</div>
				<div class="col-6">
					<input type="text" id="plName" name="plName" placeholder="שם משפחה" 
						   value="<?php echo set_value('plName'); ?>">
				</div>
				<div class="login-error hidden" id="name-error"> יש להזין שם פרטי ושם משפחה</div>
			</div>

			<input type="tel" id="parentPhone" name="parentPhone" placeholder="טלפון נייד" 
				   value="<?php echo set_value('parentPhone'); ?>">
			<div class="login-error hidden" id="parentPhone-error">יש להזין מספר טלפון נייד</div>

			<input type="email" id="email" name="parentEmail" placeholder="מייל" 
				   value="<?php echo set_value('parentEmail'); ?>">
			<div class="login-error hidden" id="email-error">יש להזין כתובת דואר אלקטרוני</div>

			<div class="row">
				<div class="col-6">
					<input type="text" id="city" name="city" placeholder="ישוב" 
						   value="<?php echo set_value('city'); ?>">
				</div>
				<div class="col-6">
					<input type="text" id="street" name="street" placeholder="רחוב" 
						   value="<?php echo set_value('street'); ?>">
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<input type="number" id="house" name="house" placeholder="בית"
						   value="<?php echo set_value('house'); ?>">
				</div>
				<div class="col-6">
					<input type="number" id="apartment" name="apartment" placeholder="דירה"
						   value="<?php echo set_value('apartment'); ?>">
				</div>
			</div>
			<div class="login-error" id="address-error"></div>

			<div style="margin-top:5px; text-align:center; font-weight:bold;">נא לבחור סיסמת כניסה למערכת:</div>
			<input type="password" id="password" name="password" placeholder="סיסמה לכניסה למערכת"
				   value="<?php echo set_value('password'); ?>">
			<input type="password" id="confirmPassword" name="confirmPassword" placeholder="אימות סיסמה"
				   value="<?php echo set_value('confirmPassword'); ?>">
			<div class="login-error hidden" id="password-error">יש לבחור סיסמת כניסה</div>
		</div>

		<input type="submit" class="btn" id="submitParentBtn" value="המשך">
		</form>
	</div>


	<div id="gotoSignIn">
		<?php echo anchor('User/login', 'החשבון כבר קיים? לחצו כדי להתחבר'); ?>
		<!--//            <a href="/application/views/login+register/login.php">החשבון כבר קיים? לחצו כדי להתחבר</a>-->
	</div>

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/bnei-akiva/1.png'); ?>" id="login-img">
	</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="<?php echo base_url('/assets/js/signnup-parent.js'); ?>"></script>

</body>
