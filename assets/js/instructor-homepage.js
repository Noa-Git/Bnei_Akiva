/* This function is activated with the start activity button */


/* This function is activated with the edit activity button */
function editActivity(id) {
	alert("editing id: " + id);
}

/******************************************** Start activity *******************************************/

function showStudents(id) {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/activity/get_activity_details",
		method: "POST",
		data: {
			activity_id: id
		},
		dataType: "json",

		success: function (data) {
			$("#membersTable tbody").empty();

			console.log(data);
			$("#manage_activity_id").val(id);
			data.forEach(function (member) {
				$("#membersTable tbody").append(
					'<tr><td class="align-middle">' +
					member.member_name + '</td>' +
					'<td class="align-middle">' +
					(member.health_declare == 0 ? "אין" : "קיים") + '</td>' +
					'<td class="align-middle">' +
					'<input type="checkbox" name="members" value="' + member.email + '"></td>' +
					'</tr>'
				)
			})
		}
	})
}

/******************************************** Send activity summery ***********************************************/

// $('#startActivityModal').on("submit", '#manage-activity', function (e) {
// 	e.preventDefault();
function sendSummery(e) {
	e.preventDefault();

	const activity = {};
	activity.id = $("#manage_activity_id").val();
	const members = [];
	$("input:checkbox[name=members]").each(function () {
		const member = {};
		member.email = $(this).val();
		member.attendant = $(this).is(":checked") ? 1 : 0;
		members.push(member);
	});

	activity.members = members;
	activity.after_summary = $("#after_summary").val();
	console.log(activity);

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/activity/add_summary",
		method: "POST",
		data: activity,
		dataType: "json",
		success: function (data) {
			if (data.success) {
				$('#startActivityModal').modal('hide'); //Hides the modal
				$('#startActivityModal').on('hidden.bs.modal', function (e) {
					$(this)
						.find("textarea")
						.val('')
						.end()
				}) //Clears the input fields
			}
		}
	});
}







$(document).ready(function () {

	refreshActivity();
	refreshMeeting();

	/* the time interval in which the activity dashboard is refreshed */
	setInterval(() => {
		refreshActivity();
		refreshMeeting();
	}, 60000);

	var i = 0;
	var j = 0;

	/******************************************** Show Activities ***********************************************/

	function refreshActivity() {
		$.ajax({
			url: "http://" +
				window.location.hostname +
				":" +
				window.location.port +
				"/activity/activities",
			method: "POST",
			data: {
				all: "false"
			},
			dataType: "json",

			success: function (data) {

				$("#activityTable tbody").empty(); /* empties the table before each refresh */
				console.log(data);
				if (data.length > 0) {
					data.forEach(function (activity) {
						/* complete structure of the table */
						const time = new Date(activity.time);

						$("#activityTable tbody").append(
							'<tr><th scope="row" class="align-middle">' +
							activity.id +
							'</th><td class="align-middle">' +
							`${time.getDate()}.${
									time.getMonth() + 1
								}.${time.getFullYear()}` +
							"</td>" +
							'<td class="align-middle">' +
							`${time.getHours()}:${('0'+time.getMinutes()).slice(-2)}` +
							"</td>" +
							'<td class="align-middle">' +
							activity.name +
							"</td>" +
							'<td class="align-middle"><button class="icon-start"  type="button" data-toggle="modal"' +
							'data-target="#startActivityModal" title="התחל פעילות" id="start_' +
							activity.id + '" onclick="showStudents(' + activity.id + ')">' +
							'<i class="material-icons" id="editActivityIcon"' +
							'title="התחל פעילות">play_arrow</i></button></td>' +
							'<td class="align-middle"><button class="icon-edit" type="button" data-toggle="modal"' +
							'data-target="#editActivityModal" title="ערוך פעילות" id="edit_' +
							activity.id +
							'" onclick="editActivity(' +
							activity.id +
							')">' +
							'<i class="material-icons" id="editActivityIcon" title="ערוך' +
							'פעילות">edit</i></button></td></tr>'
						);

						/*compareDates(activity.date);*/
					});
				} else {
					$("#activityTable tbody").append(
						'<tr><th scope="row" class="align-middle">' +
						'</th><td class="align-middle">' +
						"</td>" +
						'<td class="align-middle">' +
						"</td>" +
						'<td class="align-middle">' +
						"אין פעולות מתוכננות" +
						"</td></tr>"
					);
				}
			}
		});
	}




	/******************************************** Add new activity ***********************************************/

	$('#newActivityModal').on("submit", '#new-activity', function (e) {
		e.preventDefault();

		//validations
		let error = false;
		console.log(this.elements.namedItem("date").value);
		console.log(this.elements.namedItem("time").value);

		if (error === true) {
			return;
		}

		$.ajax({
			url: "http://" +
				window.location.hostname +
				":" +
				window.location.port +
				"/activity/add_activity",
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (data) {
				if (data.success) {
					$('#new-activity').find('input[type="text"]').val('');
					$('#newActivityModal').modal('hide'); //Hides the modal
					$('#newActivityModal').on('hidden.bs.modal', function (e) {
						$(this)
							.find("input,textarea,date,time")
							.val('')
							.end()
					}) //Clears the input fields
					refreshActivity(); //Refreshes the activity dashboard to present the new modal
				}
			}
		});
	});









	/******************************************** Edit activity *******************************************/


	/******************************************** Show Meetings ***********************************************/
	function refreshMeeting() {

		$.ajax({
			url: "http://" +
				window.location.hostname +
				":" +
				window.location.port +
				"/Calendar/calendar",
			method: "POST",
			data: {
				all: "false"
			},
			dataType: "json",

			success: function (data) {

				$("#meetingsTable tbody").empty(); /* empties the table before each refresh */
				console.log(data);
				if (data.length > 0) {
					data.forEach(function (meeting) {
						/* complete structure of the table */
						const time = new Date(meeting.date);

						$("#meetingsTable tbody").append(
							'<tr><th scope="row" class="align-middle">' +
							meeting.id +
							'</th><td class="align-middle">' +
							`${time.getDate()}.${
									time.getMonth() + 1
								}.${time.getFullYear()}` +
							"</td>" +
							'<td class="align-middle">' +
							`${time.getHours()}:${('0'+time.getMinutes()).slice(-2)}` +
							"</td>" +
							'<td class="align-middle">' +
							meeting.booker_email +
							"</td>" +
							'<td class="align-middle"><button class="icon-edit" type="button" data-toggle="modal"' +
							'data-target="#editActivityModal" title="אשר פגישה" id="approve_' +
							meeting.id +
							'" onclick="startActivity(' +
							meeting.id +
							')">' +
							'<i class="material-icons" id="editActivityIcon"' +
							'title="אשר פגישה">check</i></button></td>' +
							'<td class="align-middle"><button class="icon-start" type="button" data-toggle="modal"' +
							'data-target="#editActivityModal" title="דחה פגישה" id="cancel_' +
							meeting.id +
							'" onclick="editActivity(' +
							meeting.id +
							')">' +
							'<i class="material-icons" id="editActivityIcon" title="דחה' +
							'פגישה">clear</i></button></td></tr>'
						);

					});
				} else {
					$("#meetingsTable tbody").append(
						'<tr><th scope="row" class="align-middle">' +
						'</th><td class="align-middle">' +
						"</td>" +
						'<td class="align-middle">' +
						"</td>" +
						'<td class="align-middle">' +
						"אין פגישות מתוכננות" +
						"</td></tr>"
					);
				}
			},
		});
	}
});
