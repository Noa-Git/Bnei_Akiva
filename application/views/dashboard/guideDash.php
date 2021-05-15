<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


	<link rel="stylesheet" href="/assets/css/instructor-homepage.css">

	<title>Instructor Homepage</title>
</head>

<body>
<header>

	<!-----------------------------Navbar -------------------------------------->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom">
		<div class="container-fluid">

			<a class="navbar-brand" href="/application/views/Instructor/homepage.php">
				<img style="max-width:40%" src="/assets/pics/logo/white_logo.png" class="img-responsive"/></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item">
						<a class="nav-link active" href="#">
                                <span class="material-icons">
                                    manage_accounts
                                </span>
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link active" href="#">
                                <span class="material-icons">
                                    notifications
                                </span>
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">פעילות</a>
					</li>

					<li class="nav-item">
						<a class="nav-link active" href="#">חניכים</a>
					</li>

					<li class="nav-item">
						<a class="nav-link active" href="#">משמרות</a>
					</li>

					<li class="nav-item">
						<a class="nav-link active" href="#">פגישות</a>
					</li>


					<li class="nav-item">
						<a class="nav-link active" href="#">
							<i class="fas fa-bell"></i>
						</a>
					</li>

				</ul>

			</div>
		</div>
	</nav>
	<!-----------------------------End Navbar-------------------------------------->

</header>

<!-----------------------------Header-------------------------------------->
<div class="container">

	<div class="row justify-content-center">
		<div class="col-2">
			<h2>ברוך הבא, מור</h2>
		</div>
	</div>

	<!-----------------------------Dashboard data-------------------------------------->
	<div class="row dashboard align-items-center">
		<div class="col-12 col-md-2 text-center" id="d1">
			<div class="dashboard-bar" id="next-activity">
				<h3>סטאטוס ההוצאות שלי</h3>
				<table class="table">
					<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">תאריך</th>
						<th scope="col">סכום</th>
						<th scope="col">קבלה</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<th scope="row">1</th>
						<td>14.05.21</td>
						<td>140 ש"ח</td>
						<td>קיימת</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>28.05.21</td>
						<td>252 ש"ח</td>
						<td>קיימת</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>10.06.21</td>
						<td>78 ש"ח</td>
						<td>חסר</td>
					</tr>
					<tr>
						<th scope="row">4</th>
						<td>17.06.21</td>
						<td>100 ש"ח</td>
						<td>קיים</td>
					</tr>
					</tbody>
				</table>

			</div>
		</div>

		<div class="col-12 col-md-3 text-center" id="d2">
			<div class="dashboard-bar" id="next-meeting">
				<h3>סטאטוס החניכים שלי</h3>
				<table class="table">
					<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col">הצהרת בריאות</th>
						<th scope="col">דמי חבר</th>
						<th scope="col">רגישויות</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<th scope="row">התקבלו</th>
						<td>10</td>
						<td>6</td>
						<td>15</td>
					</tr>
					<tr>
						<th scope="row">לא התקבלו</th>
						<td>5</td>
						<td>9</td>
						<td>0</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-12 col-md-3 text-center" id="d3">
			<div class="dashboard-bar" id="class-status">
				<h3>הפגישות הקרובות שלי</h3>
				<table class="table">
					<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">תאריך</th>
						<th scope="col">שעה</th>
						<th scope="col">שם ההורה</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<th scope="row">1</th>
						<td>14.05.21</td>
						<td>16:00</td>
						<td>רבקה קליין</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>14.05.21</td>
						<td>16:30</td>
						<td>אריה אברמוב</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>14.05.21</td>
						<td>17:30</td>
						<td>הלל סבג</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-12 col-md-4 text-center" id="d4">
			<div class="dashboard-bar" id="expanses-status">
				<h3>הפעילויות הקרובות שלי</h3>
				<table class="table">
					<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">תאריך</th>
						<th scope="col">פעילות</th>
						<th scope="col">ערוך פעילות</th>
						<th scope="col">התחל פעילות</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<th scope="row">1</th>
						<td>12.05.21</td>
						<td>טריוויה</td>
						<td>
							<button class="icon" type="button" data-toggle="modal"
									data-target="#editActivityModal">
								<i class="material-icons" id="editActivityIcon" title="ערוך פעילות">edit</i>
							</button>
						</td>
						<td>
							<button class="icon" type="button" data-toggle="modal"
									data-target="#editActivityModal">
								<i class="material-icons" id="editActivityIcon"
								   title="ערוך פעילות">play_arrow</i>
							</button>
						</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>24.05.21</td>
						<td>סרט</td>
						<td>
							<button class="icon" type="button" data-toggle="modal"
									data-target="#editActivityModal">
								<i class="material-icons" id="editActivityIcon" title="ערוך פעילות">edit</i>
							</button>
						</td>
						<td></td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>32.06.21</td>
						<td>ארוחה</td>
						<td>
							<button class="icon" type="button" data-toggle="modal"
									data-target="#editActivityModal">
								<i class="material-icons" id="editActivityIcon" title="ערוך פעילות">edit</i>
							</button>
						</td>
						<td></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-----------------------------Actions-------------------------------------->
	<div class="row action align-items-center">
		<div class="col-12 col-md-2 text-center" id="d5">
			<div class="activity-bar" id="new-activity">
				<h3>ניהול הוצאות</h3>
				<p>כאן תוכלו לנהל את הוצאותיכם במסגרת הפעילות בתנועה</p>
				<button type="button" data-toggle="modal" data-target="#newExpanseModal"> הוספת הוצאה</button>
				<button class="modal-btn-expanse-report">שליפת דו"ח הוצאות</button>
			</div>
		</div>

		<div class="col-12 col-md-3 text-center" id="d6">
			<div class="activity-bar" id="new-activity">
				<h3>ניהול חניכים</h3>
				<p>כאן תוכלו לצפות במידע ולשלוח הודעות לחניכים</p>
				<button type="button" data-toggle="modal" data-target=#newMessageModal> שליחת הודעה</button>
				<button class="modal-btn-student-info">צפייה בפרטי החניכים</button>
			</div>
		</div>

		<div class="col-12 col-md-3 text-center" id="d7">
			<div class="activity-bar" id="new-activity">
				<h3>ניהול פגישות</h3>
				<p>כאן תוכלו לאשר פגישות עם הורי החניכים</p>
				<button class="modal-btn-meetings"> ניהול פגישות</button>
			</div>
		</div>

		<div class="col-12 col-md-4 text-center" id="d8">
			<div class="activity-bar" id="new-activity">
				<h3>ניהול פעילויות</h3>
				<button type="button" data-toggle="modal" data-target="#newActivityModal" class="modalOpenBtns">
					צור פעילות
					חדשה
				</button>
			</div>
		</div>
	</div>

	<!-----------------------------modal: new activity -------------------------------------->
	<div class="modal fade" id="newActivityModal">
		<div class="modal-container">
			<div class="modal-dialog vertical-align-center">
				<div class="modal-content">

					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal">X</button>
						<h3>יצירת פעילות חדשה</h3>
						<p>הזינו את פרטי הפעילות החדשה:</p>
					</div>

					<div class="modal-body">
						<form id="new-activity" action="/application/views/Instructor/homepage.php" method="post">
							<div class="input-box">
								<div class="input-group">
									<label for="activityType">סוג הפעילות:</label>
									<input type="text" name="activityType" id="activityType">
								</div>

								<div class="input-group">
									<label for="activityDate">תאריך הפעילות:</label>
									<input type="date" name="activityDate">
								</div>

								<div class="input-group">
									<label for="activityTime">שעת הפעילות:</label>
									<input type="time" name="activityTime">
								</div>
							</div>

							<button type="sumbit">בצע</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-----------------------------END modol new activity -------------------------------------->

	<!-----------------------------modal: send message -------------------------------------->
	<div class="modal fade" id="newMessageModal">
		<div class="modal-container">
			<div class="modal-dialog vertical-align-center">
				<div class="modal-content">

					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal">X</button>
						<h3>שליחת הודעה לחניכים</h3>
					</div>

					<div class="modal-body">
						<form id="new-message" action="/application/views/Instructor/homepage.php" method="post">
							<div class="input-box">
								<div class="input-group">
									<label for="MessageHeadline">נושא ההודעה:</label>
									<input type="text" name="MessageHeadline">
								</div>
								<textarea name="message" form="new-message" rows="4"
										  cols="50">הקלידו כאן את הודעתכם...</textarea>
							</div>
							<button type="sumbit">שלח</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-----------------------------END modal: send message -------------------------------------->


	<!-----------------------------modal: new expanse -------------------------------------->
	<div class="modal fade" id="newExpanseModal">
		<div class="modal-container">
			<div class="modal-dialog vertical-align-center">
				<div class="modal-content">

					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal">X</button>
						<h3>הוספת הוצאה חדשה</h3>
						<p>הזינו את פרטי ההוצאה, ולא לשכוח להעלות צילום חשבונית:</p>
					</div>

					<div class="modal-body">
						<form id="new-expanse" action="/application/views/Instructor/homepage.php" method="post">
							<div class="input-box">
								<div class="input-group">
									<label for="expanseFor">מטרת ההוצאה</label>
									<input type="text" name="expanseFor">
								</div>

								<div class="input-group">
									<label for="expanseDate">תאריך ההוצאה:</label>
									<input type="date" name="expanseDate">
								</div>

								<div class="input-group">
									<label for="expanseSum">סכום ההוצאה:</label>
									<input type="time" name="expanseSum">
								</div>

								<div class="input-group">
									<label for="reciept">צילום קבלה/חשבונית:</label>
									<input type="file" name="reciept">
								</div>
							</div>

							<button type="sumbit">בצע</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-----------------------------END modal: new expanse -------------------------------------->


</div>

<footer>

</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<script src="/assets/js/instructor-homepage.js"></script>
</body>

</html>
