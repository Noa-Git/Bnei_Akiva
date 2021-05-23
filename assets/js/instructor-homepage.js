/* This function is activated with the start activity button */
function startActivity(id) {
	alert("starting activity id: " + id);
}

/* This function is activated with the edit activity button */
function editActivity(id) {
	alert("editing id: " + id);
}

function compareDates(actDate) {
	var realDate = new date();
	var actDate = actDate();

	if (realDate.getTime() <= actDate.getTime()) {
		$("#start_" + activity.id).hide();
	}
}


$(document).ready(function () {
	/* the time interval in which the activity dashboard is refreshed */
	setInterval(() => {
		refreshActivity();
		refreshMeeting();
	}, 60000);

	var i = 0;
	/******************************************** Activities ***********************************************/
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
							`${time.getHours()}:${time.getMinutes()}` +
							"</td>" +
							'<td class="align-middle">' +
							activity.name +
							"</td>" +
							'<td class="align-middle"><button class="icon-start"  type="button" data-toggle="modal"' +
							'data-target="#editActivityModal" title="התחל פעילות" id="start_' +
							activity.id +
							'" onclick="startActivity(' +
							activity.id +
							')">' +
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
			},
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
					//$('#newActivityModal #new-activity').reset();
					$('#newActivityModal').modal('hide');
				}
			}
		});
	});
	/******************************************** Meetings ***********************************************/
	var j = 0;

	function refreshMeeting() {
		var data2 = [{
				id: j + 1,
				date: "2021-05-22",
				time: "10-50",
				parent: "רבקה קליין"
			},
			{
				id: j + 2,
				date: "2021-05-25",
				time: "11-50",
				parent: "אריה אברמוב"
			},
			{
				id: j + 3,
				date: "2021-05-28",
				time: "12-50",
				parent: "הלל סבג"
			},
		];
		j += 3;

		$("#meetingsTable tbody").empty(); /* empties the table before each refresh */

		data2.forEach(function (meeting) {
			/* complete structure of the table */
			$("#meetingsTable tbody").append(
				'<tr><th scope="row" class="align-middle">' +
				meeting.id +
				'</th><td class="align-middle">' +
				meeting.date +
				"</td>" +
				'<td class="align-middle">' +
				meeting.time +
				"</td>" +
				'<td class="align-middle">' +
				meeting.parent +
				"</td>" +
				'<td class="align-middle"><button class="icon-edit"  type="button" data-toggle="modal"' +
				'data-target="#editActivityModal" title="אשר פגישה" id="start_' +
				activity.id +
				'" onclick="startActivity(' +
				activity.id +
				')">' +
				'<i class="material-icons" id="editActivityIcon"' +
				'title="אשר פגישה">check</i></button></td>' +
				'<td class="align-middle"><button class="icon-start" type="button" data-toggle="modal"' +
				'data-target="#editActivityModal" title="דחה פגישה" id="edit_' +
				activity.id +
				'" onclick="editActivity(' +
				activity.id +
				')">' +
				'<i class="material-icons" id="editActivityIcon" title="דחה פגישה">clear</i></button></td></tr>'
			);

			/*compareDates(activity.date);*/
		});
	}

	refreshActivity();
	refreshMeeting();
});
