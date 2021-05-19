
<body>

<div class="container">

	<div class="img-div">
		<img src="<?php echo base_url('/assets/pics/logo/blue_logo.png'); ?>" id="login-logo">
	</div>

	<div>
		<h2>פרטי החניך</h2>
	</div>

	<div class="form-div">
		<?php  echo form_open('User/regitserStudent'); ?>
		<div class="login-nocorrect">
              <?php // echo validation_errors(); ?>

                </div>

<!--		<form id="formStudent" method="POST" action="/application/views/login+register/registartionCompelete.php" ;>-->
		<input  type="hidden" name="parentEmail" readonly value="<?php echo ($parentEmail) ;?>">
		<input  type="hidden" name="house_number" readonly value="<?php echo ($house_number) ;?>">
		<input  type="hidden" name="city" readonly value="<?php echo ($city) ;?>">
		<input  type="hidden" name="street" readonly value="<?php echo ($street) ;?>">
		<input  type="hidden" name="zip_code" readonly value="<?php echo ($zip_code) ;?>">

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
						   value="<?php echo set_value('sfName')?>">
                                             <?php echo form_error('sfName', '<div class="login-nocorrect">', '</div>'); ?>


				</div>
				<div class="col-6">
					<input type="text" id="slName" name="slName" placeholder="שם משפחה"
						   value="<?php echo set_value('slName');?>">
                                             <?php echo form_error('slName', '<div class="login-nocorrect">', '</div>'); ?>

				</div>
			</div>

			<input type="email" name="studEmail" placeholder="אימייל"
				   value="<?php echo set_value('studEmail');?>">
                                             <?php echo form_error('studEmail', '<div class="login-nocorrect">', '</div>'); ?>


			<input type="tel" id="studentPhone" name="studentPhone" placeholder="טלפון נייד"
				   value="<?php echo set_value('studentPhone'); ?>">
                                             <?php echo form_error('studentPhone', '<div class="login-nocorrect">', '</div>'); ?>


			<div class="row">
				<select id="select" name="shevet" >
                                    	<option value="" <?php echo  set_select('shevet', '', TRUE); ?>>בחר שם שבט </option>
					<option value="הכנה" <?php echo  set_select('shevet', 'הכנה'); ?> >הכנה (כיתה ג') </option>
					<option value="נבטים"  <?php echo  set_select('shevet', 'נבטים'); ?>> נבטים (כיתה ד') </option>
					<option value="ניצנים"  <?php echo  set_select('shevet', 'ניצנים'); ?>>ניצנים (כיתה ה') </option>
					<option value="מעלות"  <?php echo  set_select('shevet', 'מעלות'); ?>>מעלות (כיתה ו') </option>
					<option value="מעפילים"  <?php echo  set_select('shevet', 'מעפילים'); ?>>מעפילים (כיתה ז') </option>
					<option value="הראה"  <?php echo  set_select('shevet', 'הראה'); ?>>הראה (כיתה ח') </option>
					<option value="השבט העולה"  <?php echo  set_select('shevet', 'השבט העולה'); ?>>השבט העולה (כיתה ט') </option>
				</select>
                                          <?php echo form_error('shevet', '<div class="login-nocorrect">', '</div>'); ?>

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

