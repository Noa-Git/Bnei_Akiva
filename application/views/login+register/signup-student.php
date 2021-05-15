
<body>

<div class="container">

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/logo/blue_logo.png'); ?>" id="login-logo">
	</div>

	<div>
		<h2>פרטי החניך</h2>
	</div>

	<div class="form-div">
		<?php  echo form_open('Login/regitserStudent'); ?>
		<div class="login-nocorrect">
			<?php if ($mailExists=='yes')
				echo "כתובת האימייל קיימת במערכת"
				;?>
			<?php // if  (form_error('studEmail')!=NULL)
			//              echo "כתובת המייל של החניך כבר קיימת במערכת" ; ?>
		</div>


		<input  type="hidden" name="parentEmail" readonly value="<?php echo set_value('parentEmail'); ?>">
		<input  type="hidden" name="password" value="<?php echo set_value('password'); ?>">

		<form id="formStudent" method="POST" action="/application/views/login+register/registartionCompelete.php" ;>

			<div class="student-sex-radio">
				<input type="radio" id="male" name="studentSex" value="male" class="radio-input">
				<label for="male" class="radio-label" id="male-label">זכר</label>
				<input type="radio" id="female" name="studentSex" value="female" class="radio-input">
				<label for="female" class="radio-label" id="female-label">נקבה</label>
				<input type="radio" id="studSex" name="female" value="female" class="radio-input">
			</div>

			<div class="row">
				<div class="col-6">
					<input type="text" id="sfName" name="sfName" placeholder="שם פרטי"
						   value="<?php if (form_error('studEmail')!=NULL): echo set_value('sfName'); endif;?>">

				</div>
				<div class="col-6">
					<input type="text" id="slName" name="slName" placeholder="שם משפחה"
						   value="<?php if (form_error('studEmail')!=NULL): echo set_value('slName'); endif;?>">

				</div>
			</div>

			<input type="email" name="studEmail" placeholder="אימייל"
				   value="<?php if (form_error('studEmail')!=NULL): echo set_value('studEmail'); endif;?>">


			<input type="text" id="studID" name="studID" placeholder="מספר זהות"
				   value="<?php if (form_error('studEmail')!=NULL): echo set_value('studID'); endif;?>">

			<input type="text" id="bday" name="bday" placeholder="תאריך לידה" class="textbox-n"
				   onfocus="(this.type='date')" id="date"
				   value="<?php if (form_error('studEmail')!=NULL): echo set_value('bday'); endif;?>">

			<input type="tel" id="studentPhone" name="studentPhone" placeholder="טלפון נייד"
				   value="<?php if (form_error('studEmail')!=NULL): echo set_value('studentPhone'); endif;?>">


			<div class="row">
				<select id="select" name="shevet">
					<option>שבט</option>
					<option value="הכנה" selected>הכנה (כיתה ג') </option>
					<option value="נבטים"> נבטים (כיתה ד') </option>
					<option value="ניצנים">ניצנים (כיתה ה') </option>
					<option value="מעלות">מעלות (כיתה ו') </option>
					<option value="מעפילים">מעפילים (כיתה ז') </option>
					<option value="הראה">הראה (כיתה ח') </option>
					<option value="השבט העולה">השבט העולה (כיתה ט') </option>
				</select>
			</div>



			<div class="buttons">
				<input name='finish' type="submit" class="btn" id="endSubmitBtn" value="בצע רישום">
			</div>

		</form>
	</div>

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/bnei-akiva/3.jpg'); ?>" id="login-img">
	</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="<?php echo base_url('/assets/js/signnup-student.js'); ?>"></script>

</body>

