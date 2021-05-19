<body>

<div class="container">

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/logo/blue_logo.png'); ?>" id="login-logo">
	</div>

	<div>

		<h1>חדשים כאן? הרשמו:</h1>


		<h2>פרטי ההורה</h2>
	</div>

	<div class="form-div">
		<?php echo form_open('User/regitserParent'); ?>
		<div class="login-nocorrect">

              <?php // echo validation_errors(); ?>


		</div>
		<!--<form id="formParent" method="POST" action="/application/views/login+register/signup-student.php" ;>-->
		<div class="parent-panel">
			<div class="row">
				<div class="col-6">
					<input type="text" id="pfName" name="pfName" placeholder="שם פרטי" 
						   value="<?php echo set_value('pfName'); ?>">
                    <?php echo form_error('pfName', '<div class="login-nocorrect">', '</div>'); ?>

				</div>
				<div class="col-6">
					<input type="text" id="plName" name="plName" placeholder="שם משפחה" 
						   value="<?php echo set_value('plName'); ?>">
				</div>
			<?php echo form_error('plName', '<div class="login-nocorrect">', '</div>'); ?>

                        </div>

			<input type="tel" id="parentPhone" name="parentPhone" placeholder="טלפון נייד" 
				   value="<?php echo set_value('parentPhone'); ?>">
			<?php echo form_error('parentPhone', '<div class="login-nocorrect">', '</div>'); ?>

			<input type="text" id="email" name="parentEmail" placeholder="מייל" 
				   value="<?php echo set_value('parentEmail'); ?>">
			<?php echo form_error('parentEmail', '<div class="login-nocorrect">', '</div>'); ?>

			<div class="row">
				<div class="col-6">
					<input type="text" id="city" name="city" placeholder="ישוב" 
						   value="<?php echo set_value('city'); ?>">
						<?php echo form_error('city', '<div class="login-nocorrect">', '</div>'); ?>
                                </div>
				<div class="col-6">
					<input type="text" id="street" name="street" placeholder="רחוב" 
						   value="<?php echo set_value('street'); ?>">
                                       						<?php echo form_error('street', '<div class="login-nocorrect">', '</div>'); ?>
 
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<input type="number" id="house" name="house_number" placeholder="בית"
						   value="<?php echo set_value('house_number'); ?>">
                                                     <?php echo form_error('house_number', '<div class="login-nocorrect">', '</div>'); ?>

				</div>
				<div class="col-6">
					<input type="number" id="apartment" name="zip_code" placeholder="מיקוד"
						   value="<?php echo set_value('zip_code'); ?>">
                                            <?php echo form_error('zip_code', '<div class="login-nocorrect">', '</div>'); ?>

				</div>
			</div>
			<div class="login-error" id="address-error"></div>

			<div style="margin-top:5px; text-align:center; font-weight:bold;">נא לבחור סיסמת כניסה למערכת:</div>
			<input type="password" id="password" name="password" placeholder="סיסמה לכניסה למערכת"
				   value="<?php echo set_value('password'); ?>">
                                         <?php echo form_error('password', '<div class="login-nocorrect">', '</div>'); ?>

			<input type="password" id="confirmPassword" name="confirmPassword" placeholder="אימות סיסמה"
				   value="<?php echo set_value('confirmPassword'); ?>">
                                       <?php echo form_error('confirmPassword', '<div class="login-nocorrect">', '</div>'); ?>

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
