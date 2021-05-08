<title>Log-in</title>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">

		<form id="formParent" onsubmit="passFormData('formParent');return false;">

			<h1>חדשים כאן? הירשמו:</h1>
			<?php echo form_open('Main/parent_register'); ?>
			<div class="parent-panel">
				<h2>פרטי ההורה</h2>
				<div class="row">
					<div class="col-6">
						<input type="text" id="pfName" name="pfName" placeholder="שם פרטי" required>
					</div>
					<div class="col-6">
						<input type="text" id="plName" name="plName" placeholder="שם משפחה" required>
					</div>
					<div class="login-error hidden" id="name-error"> יש להזין שם פרטי ושם משפחה</div>
				</div>

				<input type="tel" id="parentPhone" name="parentPhone" placeholder="טלפון נייד" required>
				<div class="login-error hidden" id="parentPhone-error">יש להזין מספר טלפון נייד</div>

				<input type="email" id="email" name="email" placeholder="מייל" required>
				<div class="login-error hidden" id="email-error">יש להזין כתובת דואר אלקטרוני</div>

				<div class="row">
					<div class="col-6">
						<input type="text" id="city" name="city" placeholder="ישוב" required>
					</div>
					<div class="col-6">
						<input type="text" id="street" name="street" placeholder="רחוב" required>
					</div>
				</div>

				<div class="row">
					<div class="col-6">
						<input type="number" id="house" name="house" placeholder="בית" required>
					</div>
					<div class="col-6">
						<input type="number" id="apartment" name="apartment" placeholder="דירה">
					</div>
				</div>
				<div class="login-error hidden" id="address-error"> יש להזין כתובת מגורים מלאה</div>

				<div style="margin-top:5px">נא לבחור סיסמת כניסה למערכת:</div>
				<input type="password" id="password" name="password" placeholder="סיסמה לכניסה למערכת">
				<div class="login-error hidden" id="password-error">יש לבחור סיסמת כניסה</div>
			</div>

			<input type="submit" id="submitParentBtn" value="המשך">
		</form>
		<?php echo form_close(); ?>

		<form id="formStudent" onsubmit="return false">
			<div class="student-panel">
				<?php echo form_open('Main/member_register', array('id' => 'add_member_form')); ?>
				<h2>פרטי החניך</h2>

				<div class="student-sex-radio">
					<input type="radio" id="male" name="memberSex" value="male" class="radio-input">
					<label for="male" class="radio-label" id="male-label">זכר</label>
					<input type="radio" id="female" name="memberSex" value="female" class="radio-input">
					<label for="female" class="radio-label" id="female-label">נקבה</label>
					<input type="radio" id="studSex" name="female" value="female" class="radio-input">
				</div>


				<div class="row">
					<div class="col-6">
						<input type="text" id="sfName" name="mfName" placeholder="שם פרטי" required>
					</div>

					<div class="col-6">
						<input type="text" id="slName" name="mlName" placeholder="שם משפחה" required>
					</div>
				</div>
				<input type="text" id="memID" name="memID" placeholder="מספר זהות" required>
				<input type="text" id="bday" name="bday" placeholder="תאריך לידה" class="textbox-n"
					   onfocus="(this.type='date')" id="date" required>
				<input type="tel" id="memberPhone" name="memberPhone" placeholder="טלפון נייד" required>
			</div>

			<div class="buttons">
				<div class="row">
					<div class="col-6">
						<button class="next-btn" id="endSubmitBtn" type="submit">סיים
							רישום
						</button>
					</div>
					<div class="col-3">
						<button class="icon-btn" onclick="addStudent()" id="addStudentbutton">
							<i class="material-icons" id="addStudentIcon" title="רשום חניך נוסף">person_add_alt</i>
						</button>
					</div>
					<div class="col-3">
						<button class="icon-btn" onclick="removeStudent()" id="cancelStudentbutton"
								title="בטל רישום חניך זה">
							<i class="material-icons" id="removeStudentIcon">clear</i>
						</button>
					</div>
				</div>
			</div>

			<div class="studentsCountPanel">
				<p id="studentFeedback"></p>
				<p>מספר החניכים שרשמת: <a id="studentCounter">0</a></p>

			</div>

		</form>
		<?php echo form_close(); ?>


	</div>


	<div class="form-container sign-in-container">
		<form id="signInForm" method="POST" action="" ;>
			<div class="login-logo">
				<img src="<?php echo base_url('assets/pics/logo/blue_logo.png'); ?>">
			</div>
			<h1>ברוכים השבים</h1>
			<?php echo form_open('Main/login'); ?>
			<input type="tel" id="login-phone" name="phone" placeholder="טלפון">
			<div class="login-error hidden" id="phone-error">יש להזין את מספר טלפון שלכם</div>
			<input type="password" id="login-password" name="password" placeholder="סיסמה">
			<div class="login-error hidden" id="password-error">יש להזין את ססמת הכניסה שלכם</div>
			<a href="#">שכחת את הסיסמה?</a>
			<input type="submit" id="EnterSystem" value="כניסה">

		</form>
		<?php echo form_close(); ?>
	</div>


	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<button class="ghost" id="goTo-logIn">?כבר יש לכם חשבון</button>
			</div>

			<div class="overlay-panel overlay-right">
				<button class="ghost" id="goTo-signUp">?חדשים כאן</button>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="<?php echo base_url('assets/js/log.js') ?>"></script>

</body>
