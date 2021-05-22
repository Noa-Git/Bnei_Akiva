</head>
<body>
<main class="mainWrraper" dir="rtl">
	<?php echo form_open('Activity/add_activity'); ?>
	<div class="row mb-4">
		<div class="col-md-1">
			<div class="form-outline">
				<label>שם פעולה</label>
				<input type="text" name="name" required/>
			</div>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-1">
			<div class="form-outline">
				<label>תיאור</label>
				<input type="text" name="description" required/>
			</div>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-1">
			<div class="form-outline">
				<label>time</label>
				<input type="date" name="time" required/>
			</div>
		</div>
	</div>
	<input class="createForm" type="submit" name="submit" value="אישור"/>
	<input id="Cancel" class="createForm" type="button" value="ביטול"/>
	<?php echo form_close(); ?>




	<?php echo form_open('Activity/add_summary'); ?>
	<div class="row mb-4">
		<div class="col-md-1">
			<div class="form-outline">
				<label>סיכום</label>
				<input type="text" name="after_summary" required/>
			</div>
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-1">
			<div class="form-outline">
				<label>מספר משתתפים</label>
				<input type="text" name="num_participates" required/>
			</div>
		</div>
	</div>
	<input class="createForm" type="submit" name="submit" value="אישור"/>
	<input id="Cancel" class="createForm" type="button" value="ביטול"/>
	<?php echo form_close(); ?>
