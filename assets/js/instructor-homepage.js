/* This function is activated with the start activity button */

function showAllActivities() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/activity/activities",
		method: "POST",
		data: {
			all: "true"
		},
		dataType: "json",

		success: function (data) {

			$("#allActivitiesTable tbody").empty(); /* empties the table before each refresh */
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (activity) {
					/* complete structure of the table */
					const time = new Date(activity.time);
					const summary = activity.after_summary == null ? "ללא סיכום" : activity.after_summary;
					const rate = activity.rates_avg == null ? "ללא דירוג" : activity.rates_avg;

					$("#allActivitiesTable tbody").append(
						'<tr><th class="align-middle" hidden>' +
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
						'<td class="align-middle">' +
						summary +
						"</td>" +
						'<td class="align-middle">' +
						rate +
						"</td>"
					);

					/*compareDates(activity.date);*/
				});
			} else {
				$("#allActivitiesTable tbody").append(
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

/******************************************** show expanses ***********************************************/
function showExpanses() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Guide/expanse_report",
		method: "POST",
		dataType: "json",

		success: function (data) {

			$("#expansesTable tbody").empty(); /* empties the table before each refresh */
			console.log("the expanses are:");
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (expanse) {

					$("#expansesTable tbody").append(
						'<tr><th class="align-middle" hidden>' + expanse.id + '</th>' +
						'<tr class="align-middle">' +
						'<td class="align-middle">' + expanse.edate + '</td>' +
						'<td class="align-middle">' + expanse.ename + '</td>' +
						'<td class="align-middle">' + expanse.description + '</td>' +
						'<td class="align-middle">' + expanse.price + ' ש"ח</td>' +
						'</tr>'
					);
				});
			} else {
				$("#expansesTable tbody").append(
					'<tr><th scope="row" class="align-middle">' +
					'</th><td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"אין הוצאות מוזנות" +
					"</td></tr>"
				);
			}
		}
	});
}



/******************************************** Update member stats ***********************************************/
function updateMemberStats() {

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/member/members_list",
		method: "POST",
		dataType: "json",

		success: function (data) {
			console.log('member_stat');
			console.log(data);

			let insuranceY = 0;
			let tripY = 0;
			let memberY = 0;
			const numMembers = data.length;

			data.forEach(function (member) {
				insuranceY += member.insurance == "0" ? 0 : 1;
				tripY += member.trips == "0" ? 0 : 1;
				memberY += member.membership == "0" ? 0 : 1;
			})

			$('#insuranceY').html('' + insuranceY);
			$('#insuranceN').html('' + (numMembers - insuranceY));
			$('#memberY').html('' + memberY);
			$('#memberN').html('' + (numMembers - memberY));
			$('#tripY').html('' + tripY);
			$('#tripN').html('' + (numMembers - tripY));

			console.log(insuranceY, tripY, memberY);
		}
	});

}

/******************************************** select a substitute to request ***********************************************/
function selectSub(id) {

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/activity/substitute_request",
		method: "POST",
		data: {
			activity_id: id
		},
		dataType: "json",

		success: function (data) {
			alert("בקשת החילוף נשלחה")
			$('#askSubModal').modal('hide');
			refreshSubs();
		}
	})
}


/******************************************** ask for a new substitute ***********************************************/
function askSub() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/activity/activities",
		method: "POST",
		data: {
			all: "true"
		},
		dataType: "json",

		success: function (data) {

			$("#askSubTable tbody").empty(); /* empties the table before each refresh */
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (activity) {
					/* complete structure of the table */
					const time = new Date(activity.time);

					const showBTN = activity.sub_req == 0 ? ' ' : 'hidden';

					$("#askSubTable tbody").append(
						'<tr><th class="align-middle">' +
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
						'<td class="align-middle"><button class="icon-edit" type="button"' +
						'title="בקש חילוף" id="request_' + activity.id + '" ' +
						'onclick="selectSub(' + activity.id + ')" ' + showBTN + '>' +
						'<i class="material-icons" id="editActivityIcon"' +
						'title="בקש חילוף">check</i></button></td></tr>'
					);

				});
			} else {
				$("#askSubTable tbody").append(
					'<tr><th scope="row" class="align-middle">' +
					'</th><td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"אין פעולות להחליף" +
					"</td></tr>"
				);
			}
		}
	});
}


/******************************************** send message to all members ***********************************************/
function sendMessage() {

	$('#msgSpinner').show();
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/message/send_message_to_all",
		method: "POST",
		data: $('#new-message').serialize(),
		dataType: "json",

		success: function (data) {
			$('#msgSpinner').hide();
			$('#newMessageModal').modal('hide');

		}
	})
}


/******************************************** Approve Pending Member ***********************************************/
function approveMember(email) {

	$("#pendingMembersTable tbody").empty();
	$("#pendingMembersTable tbody").append(
		'<tr><td></td><td></td><td>' +
		'<div class="text-center"><div class = "spinner-border"role = "status" ></div><span>מאשר רישום, נא להמתין...</span></div></td>' +
		'</tr>'
	);

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/member/approve_members",
		method: "POST",
		data: {
			users_email: email
		},
		dataType: "json",
		success: function (data) {

			//Unable to call refreshMeeting()
			if (data.success) {
				alert("רישום החניך/ה אושר")
				$('#showPendingMembersModal').modal('hide');
			}
		}

	})

}


/******************************************** Show Pending Members ***********************************************/
function showPendingMembers() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/member/pending_members",
		method: "POST",
		dataType: "json",

		success: function (data) {

			$("#pendingMembersTable tbody").empty(); /* empties the table before each refresh */
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (member) {
					/* complete structure of the table */

					$("#pendingMembersTable tbody").append(
						'<tr><td class="align-middle">' +
						member.fname + '</td>' +
						'<td class="align-middle">' +
						member.lname + '</td>' +
						'<td class="align-middle">' +
						member.phone + '</td>' +
						'<td class="align-middle">' +
						member.city + ' ' + member.street + ' ' + member.house_number + '</td>' +
						'<td class="align-middle"><button class="icon-edit" type="button" ' +
						'title="אשר חניך" id="approve_' +
						member.users_email +
						'" onclick="approveMember(\'' + member.users_email + '\')">' +
						'<i class="material-icons" id="editActivityIcon"' +
						'title="אשר חניך">check</i></button></td>' +
						'</tr> '
					);

					/*compareDates(activity.date);*/
				});
			} else {
				$("#allStudentsTable tbody").append(
					'<tr><th scope="row" class="align-middle">' +
					'</th><td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"אין חניכים בקבוצה" +
					"</td></tr>"
				);
			}
		}
	});

}


/******************************************** Show All Students ***********************************************/

function showAllMembers() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/member/members_list",
		method: "POST",
		dataType: "json",

		success: function (data) {

			$("#allStudentsTable tbody").empty(); /* empties the table before each refresh */
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (member) {
					/* complete structure of the table */

					const membership = member.membership == 0 ? "X" : "V";
					const trip = member.trips == 0 ? "X" : "V";
					const insurance = member.insurance == 0 ? "X" : "V";

					$("#allStudentsTable tbody").append(
						'<tr><td class="align-middle">' +
						member.fname + '</td>' +
						'<td class="align-middle">' +
						member.lname + '</td>' +
						'<td class="align-middle">' +
						'<a href="tel:' + member.phone + '">' + member.phone + '</a></td>' +
						'<td class="align-middle">' +
						membership + '</td>' +
						'<td class="align-middle">' +
						trip + '</td>' +
						'<td class="align-middle">' +
						insurance + '</td>' +
						'<td class="align-middle">' +
						member.city + ' ' + member.street + ' ' + member.house_number + '</td>' +
						'</tr> '
					);

					/*compareDates(activity.date);*/
				});
			} else {
				$("#allStudentsTable tbody").append(
					'<tr><th scope="row" class="align-middle">' +
					'</th><td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"אין חניכים בקבוצה" +
					"</td></tr>"
				);
			}
		}
	});
}

/******************************************** Show ALL Meetings ***********************************************/
function ShowAllMeeting() {

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Calendar/calendar",
		method: "POST",
		data: {
			all: "true"
		},
		dataType: "json",

		success: function (data) {

			$("#AllMeetingsTable tbody").empty(); /* empties the table before each refresh */
			console.log("allmeetings");
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (meeting) {
					/* complete structure of the table */
					const time = new Date(meeting.date);

					let btnShow = " ";
					if (meeting.booked == 1) {
						btnShow = "hidden";
					}

					$("#AllMeetingsTable tbody").append(
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
						meeting.fname + ' ' + meeting.lname +
						"</td>" +
						'<td class="align-middle"><button class="icon-edit" type="button" ' +
						'title="אשר פגישה" id="approve_' +
						meeting.id +
						'onclick="setMeeting(' + meeting.id + ', 1)" ' + btnShow + '>' +
						'<i class="material-icons" id="editActivityIcon"' +
						'title="אשר פגישה">check</i></button></td>' +

						'<td class="align-middle"><button class="icon-start" type="button" ' +
						' title="דחה פגישה" id="cancel_' +
						meeting.id +
						'" onclick="setMeeting(' + meeting.id + ', 0)">' +
						'<i class="material-icons" id="editActivityIcon" title="דחה' +
						'פגישה">clear</i></button></td></tr>'
					);

				});
			} else {
				$("#AllMeetingsTable tbody").append(
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

					let btnShow = " ";
					if (meeting.booked == 1) {
						btnShow = "hidden";
					}

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
						meeting.fname + ' ' + meeting.lname +
						"</td>" +
						'<td class="align-middle"><button class="icon-edit" type="button"' +
						'title="אשר פגישה" id="approve_' + meeting.id + '" ' +
						'onclick="setMeeting(' + meeting.id + ', 1)" ' + btnShow + '>' +
						'<i class="material-icons" id="editActivityIcon"' +
						'title="אשר פגישה">check</i></button></td>' +
						'<td class="align-middle"><button class="icon-start" type="button"' +
						'title="דחה פגישה" id="cancel_' + meeting.id +
						'" onclick="setMeeting(' + meeting.id + ', 0)">' +
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




/******************************************** Set meeting ***********************************************/
function setMeeting(id, book) {

	console.log(book);

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Calendar/approve_meeting",
		method: "POST",
		data: {
			id: id,
			booked: book
		},
		dataType: "json",
		success: function (data) {

			//Unable to call refreshMeeting()
			if (data.success) {
				refreshMeeting();
			}
		}

	})
}


/******************************************** Check new messages *******************************************/

function checkNewMessages() { //this function must refresh all the time

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Message/check_new",
		method: "POST",
		dataType: "json",

		success: function (data) {


			console.log(data);
			if (data.num > 0) {

				$('#badge').show();
				$('#badge').text("" + data.num);

				// Icon with exclamation mark
			} else {
				$('#badge').hide();
				$('#badge').text('');
				// Icon without exclamation mark
			}

		}
	});

}

/******************************************** Submit Update activity ***********************************************/

function submitUpdateActivity(e) {
	e.preventDefault();

	//validations
	let error = false;

	if (error === true) {
		return;
	}

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/activity/update_activity",
		method: "POST",
		data: $('#edit-activity').serialize(),
		dataType: "json",
		success: function (data) {
			if (data.success) {
				$('#edit-activity').find('input[type="text"]').val('');
				$('#editActivityModal').modal('hide'); //Hides the modal
				$('#editActivityModal').on('hidden.bs.modal', function (e) {
					$(this)
						.find("input,textarea,date,time")
						.val('')
						.end()
				}) //Clears the input fields
				refreshActivity(); //Refreshes the activity dashboard to present the new modal
			}
		}
	});
};


/******************************************** Show Substitution requests ***********************************************/
function refreshSubs() {

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/activity/substitutes",
		method: "POST",
		data: {
			all: "false"
		},
		dataType: "json",

		success: function (data) {

			$("#substituteTable tbody").empty(); /* empties the table before each refresh */
			console.log("refreshsub");
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (substitution) {
					const time = new Date(substitution.time);

					$("#substituteTable tbody").append(
						'<tr><th scope="row" class="align-middle">' +
						substitution.activity_id +
						'</th><td class="align-middle">' +
						`${time.getDate()}.${time.getMonth() + 1}.${time.getFullYear()}` +
						"</td>" +
						'<td class="align-middle">' +
						`${time.getHours()}:${('0'+time.getMinutes()).slice(-2)}` +
						"</td>" +
						'<td class="align-middle">' +
						substitution.fname + ' ' + substitution.lname +
						"</td>" +
						'<td class="align-middle"><button class="icon-edit" type="button" ' +
						'title="קבל החלפה" id="approve_' +
						substitution.id +
						'"onclick="approveSubstitution(' + substitution.id + ', ' + substitution.activity_id + ')">' +
						'<i class="material-icons" id="editActivityIcon"' +
						'title="קבל החלפה">check</i></button></td></tr>'
					);

				});
			} else {
				$("#substituteTable tbody").append(
					'<tr><th scope="row" class="align-middle">' +
					'</th><td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					" אין בקשות חילוף כרגע" +
					"</td></tr>"
				);
			}
		},
	});
}


/******************************************** Approve substitution ***********************************************/
function approveSubstitution(id, activity_id) {

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Activity/change_guide",
		method: "POST",
		data: {
			id: id,
			activity_id: activity_id
		},
		dataType: "json",
		success: function (data) {

			if (data.success) {

				console.log(data);
				refreshSubs();

			}
		}

	})
}



/******************************************** Show massages ***********************************************/
function showMassages(all = 'false') {

	if (all == 'true') {
		$('#showAllMessagesBTN').hide();
	} else {
		$('#showAllMessagesBTN').show();
	}

	$("#no-new-notifications").show();

	$('#badge').hide();
	$('#badge').text('');

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Message/get_message",
		method: "POST",
		data: {
			all: all
		},
		dataType: "json",

		success: function (data) {

			console.log(data);
			if (data.length > 0) {
				$("#messages-container").empty();
				data.forEach(function (message) {
					const time = new Date(message.date_sent);


					$("#messages-container").append(
						'<div class="message">' +
						'<div class = "message-head">' +
						'<p><b>מאת: ' + message.sent_from + '</b></p>' +
						'<h3>' + message.subject + '</h3>' +
						'<p>' + `${time.getDate()}.${time.getMonth() + 1}.${time.getFullYear()}  ${time.getHours()}:${('0'+time.getMinutes()).slice(-2)}` +
						'</p>' +
						'<span hidden>' + message.id + '</span>' +
						'</div>' +
						'<div class = "message-body">' +
						'<p>' + message.content + '</p>' +
						'</div></div>'
					);

				});

			} else {
				$("#messages-container").append(
					'<div><p>אין הודעות חדשות</p></div>'
				)
			}
		}
	});

}



/* This function is activated with the edit activity button */
function editActivity(id) {
	//alert("editing id: " + id);
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
			$("#edit-activity").empty();
			console.log(data);
			$("#edit_activity_id").val(id);

			const activity = data[0];

			console.log(activity);

			const time = new Date(activity.time);

			const hour = `${time.getHours()}:${('0'+time.getMinutes()).slice(-2)}`;
			const date = `${time.getFullYear()}-${('0'+(time.getMonth() + 1)).slice(-2)}-${('0'+time.getDate()).slice(-2)}`;


			$("#edit-activity").append(
				'<input type = "text" name="id" value="' + id + '" hidden>' +
				'<div class = "input-box">' +
				'<div class = "input-group">' +
				'<label for = "activityName" > שם הפעילות: </label>' +
				'<input type = "text" name = "name" id = "activityName" maxlength = "32" value="' + activity.name + '"></div>' +
				'<div class = "input-group">' +
				'<label for = "activityDesc" >תיאור הפעילות:</label>' +
				'<textarea rows = "3" cols = "24" maxlength = "100" placeholder = "הזינו פרטים נוספים לגבי הפעילות..." name = "description" id = "activityDesc"  >' + activity.description + '</textarea>' +
				'<div class = "input-group">' +
				'<label for = "activityDate"> תאריך הפעילות: </label>' +
				'<input type = "date" name = "date" value="' + date + '"></div>' +
				'<div class = "input-group" >' +
				'<label for = "activityTime">שעת הפעילות:</label>' +
				'<input type = "time" name = "time" value="' + hour + '">' +
				'</div>' +
				'</div>' +
				'<button type = "sumbit" onclick="submitUpdateActivity(event)"> עדכן פעילות </button>' +
				'</div>'
			)
		}
	})
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
			data.members.forEach(function (member) {
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


/******************************************** Edit activity summery ***********************************************/

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





/******************************************** Ready Function ***********************************************/
$(document).ready(function () {

	let now = (new Date()).toISOString().substring(0, 10);

	$('#datepickerActivity').attr('min', now);
	refreshActivity();
	refreshMeeting();
	refreshSubs();
	checkNewMessages();
	updateMemberStats();

	/* the time interval in which the activity dashboard is refreshed */
	setInterval(() => {
		refreshActivity();
		refreshMeeting();
		checkNewMessages();
		updateMemberStats();
	}, 15000);

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






	/******************************************** Add new expanse ***********************************************/

	$('#newExpanseModal').on("submit", '#new-expanse', function (e) {
		e.preventDefault();

		//validations
		/* let error = false;
		console.log(this.elements.namedItem("date").value);
		console.log(this.elements.namedItem("time").value);

		if (error === true) {
			return;
		} */

		$.ajax({
			url: "http://" +
				window.location.hostname +
				":" +
				window.location.port +
				"/Guide/add_expanse",
			method: "POST",
			data: $(this).serialize(),
			dataType: "json",
			success: function (data) {
				if (data.success) {
					$('#new-expanse').find('input[type="text"]').val('');
					$('#newExpanseModal').modal('hide'); //Hides the modal
					$('#newExpanseModal').on('hidden.bs.modal', function (e) {
						$(this)
							.find("input,text,date,time, file")
							.val('')
							.end()
					}) //Clears the input fields
				}
			}
		});
	});


	$('#notificationsModal').on('hidden.bs.modal', function (e) {

		$("#messages-container").empty();
		$.ajax({
			url: "http://" +
				window.location.hostname +
				":" +
				window.location.port +
				"/message/set_read",
			method: "POST"
		});
		checkNewMessages();

	}) //Clears the input fields



});
