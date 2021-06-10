/* This function is activated with the start activity button */



function passHealthData(activity_id, name, email) {
	console.log('Date: ' + (new Date()).toLocaleDateString());

	for (i = 1; i < 4; i++) {
		$('#nameSpn' + i).html(name);
	}

	$('#dateSpn').html((new Date()).toLocaleDateString());

	$('#activity_id_holder').val(activity_id);
	$('#email_holder').val(email);

}




/******************************************** Show Activities ***********************************************/

function refreshActivity() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/activity/activitiesForParent",
		method: "POST",
		data: {
			all: "true"
		},
		dataType: "json",

		success: function (data) {

			$("#activityTable tbody").empty(); /* empties the table before each refresh */
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (activity) {
					/* complete structure of the table */
					const time = new Date(activity.time);
					const declare = activity.hd == 0 ? '' : 'hidden';

					$("#activityTable tbody").append(
						'<tr><th scope="row" class="align-middle" hidden>' +
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
						activity.fname +
						"</td>" +
						'<td class="align-middle"><button class="icon-start"  type="button" data-toggle="modal"' +
						'data-target="#healthDeclareModal" title="מלא הצהרת בריאות" id="start_' +
						activity.id + '" onclick="passHealthData(' + activity.id + ',\'' + activity.fname + '\',\'' + activity.email + '\')" ' + declare + '>' +
						'<i class="material-icons" id="editActivityIcon"' +
						'title="מלא הצהרת בריאות">assignment</i></button></td></tr>'
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

function sendHealthDeclare() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Parents/fill_health_declare",
		method: "POST",
		data: $('#healthDeclareForm').serialize(),
		dataType: "json",

		success: function (data) {

			if (data.success) {
				$('#activity_id_holder').val('');
				$('#email_holder').val('');
				refreshActivity();

				$('#healthDeclareModal').modal('hide');

			}
		}

	});

}






function showAllActivities() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/activity/activitiesForParent",
		method: "POST",
		data: {
			all: "false"
		},
		dataType: "json",

		success: function (data) {

			$("#allActivitiesTable tbody").empty(); /* empties the table before each refresh */
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (activity) {
					/* complete structure of the table */
					const time = new Date(activity.time);
					const declare = activity.hd == 0 ? '' : 'hidden';

					$("#allActivitiesTable tbody").append(
						'<tr><th scope="row" class="align-middle" hidden>' +
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
						activity.fname +
						"</td>" +
						'<td class="align-middle"><button class="icon-start"  type="button" data-toggle="modal"' +
						'data-target="#healthDeclareModal" title="מלא הצהרת בריאות" id="start_' +
						activity.id + '" onclick="passHealthData(' + activity.id + ',\'' + activity.fname + '\',\'' + activity.email + '\')" ' + declare + '> ' +
						'<i class="material-icons" id="editActivityIcon"' +
						'title="מלא הצהרת בריאות">assignment</i></button></td></tr>'
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

/******************************************** Get all relevant insturctors ***********************************************/
function getInstructors(selector) {

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Parents/get_guides",
		method: "POST",
		dataType: "json",

		success: function (data) {

			$("#instructors").empty(); /* empties the table before each refresh */
			console.log("Here comes the guides: ");
			console.log(data);

			if (data.length > 0) {
				data.forEach(function (guide) {
					const time = new Date(guide.date);

					$('#' + selector).append(
						'<option value="' + guide.email + '">' + guide.fname + ' ' + guide.lname + ', שבט ' + '"' + guide.name + '"' + '</option >'
					);

				});
			}
		},
	});
}



/******************************************** send message to guide ***********************************************/
function sendMessage() {

	$('#msgSpinner').show();
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/message/send_message",
		method: "POST",
		data: $('#new-message').serialize(),
		dataType: "json",

		success: function (data) {
			$('#msgSpinner').hide();
			$('#newMessageModal').modal('hide');

		}
	})
}

/******************************************** send meeting request to guide ***********************************************/
function sendMeeting() {

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Calendar/do_meeting",
		method: "POST",
		data: $('#new-meeting').serialize(),
		dataType: "json",

		success: function (data) {
			$('#newMeetingModal').modal('hide');
			refreshMeeting();
		}
	})
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



/******************************************** Show my kids ***********************************************/

function showMyKids() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/member/members_list",
		method: "POST",
		dataType: "json",

		success: function (data) {

			$("#myKidsTable tbody").empty(); /* empties the table before each refresh */
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (member) {
					/* complete structure of the table */

					const membership = member.membership == 0 ? "X" : "V";
					const trip = member.trips == 0 ? "X" : "V";
					const insurance = member.insurance == 0 ? "X" : "V";

					$("#myKidsTable tbody").append(
						'<tr><td class="align-middle">' + member.fname + '</td>' +
						'<td class = "align-middle" > ' + member.grade + '</td>' +
						'<td class = "align-middle" > ' + member.name + '</td>' +

						'</tr> '
					);


				});
			} else {
				$("#myKidsTable tbody").append(
					'<tr><th scope="row" class="align-middle">' +
					'</th><td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"אין ילדים רשומים" +
					"</td></tr>"
				);
			}
		}
	});
}



/******************************************** KIDS payment status ***********************************************/

function showKidsPayments() {
	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/member/members_list",
		method: "POST",
		dataType: "json",

		success: function (data) {

			$("#kidsPaymentsTable tbody").empty(); /* empties the table before each refresh */
			console.log("kids payment:  ");
			console.log(data);
			if (data.length > 0) {
				data.forEach(function (member) {
					/* complete structure of the table */

					const membership = member.membership == 0 ? "X" : "V";
					const trip = member.trips == 0 ? "X" : "V";
					const insurance = member.insurance == 0 ? "X" : "V";

					const showBtn = (parseInt(member.trips) + parseInt(member.membership) + parseInt(member.insurance)) < 3 ? "" : "hidden";

					$("#kidsPaymentsTable tbody").append(
						'<tr><td class="align-middle">' + member.fname + '</td>' +
						'<td class = "align-middle" > ' + membership + '</td>' +
						'<td class = "align-middle" > ' + insurance + '</td>' +
						'<td class = "align-middle" > ' + trip + '</td>' +
						'<td class="align-middle"><button class="icon-edit" data-toggle="modal" data-target="#payModal" type="button" ' +
						'title="בצע תשלום" id="approve_' + member.users_email +
						'" onclick="payMember(\'' + member.email + '\',\'' + member.fname + '\', ' + member.membership + ',' + member.insurance + ',' + member.trips + ') "  ' + showBtn + '>' +
						'<i class="material-icons" id="editActivityIcon"' +
						'title="בצע תשלום">payment</i></button></td>' +
						'</tr> '
					);

				});
			} else {
				$("#kidsPaymentsTable tbody").append(
					'<tr><th scope="row" class="align-middle">' +
					'</th><td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"</td>" +
					'<td class="align-middle">' +
					"אין ילדים רשומים" +
					"</td></tr>"
				);
			}
		}
	});
}


/******************************************** Pay for members ***********************************************/
function payMember(email, name, membership, insurance, trips) {

	const membervar = membership == 0 ? "" : "hidden";
	const insurancevar = insurance == 0 ? "" : "hidden";
	const tripsvar = trips == 0 ? "" : "hidden";



	$('#payTitle').html(name);
	$('#kidEmail').val(email);
	$("#paymentSelector").empty();



	$("#paymentSelector").append($('<option>', {
		selected: true,
		disabled: true,
		hidden: true,
		text: "בחר תשלום"
	}));



	$("#paymentSelector").append(
		'<option value="membership" ' + membervar + '>דמי חברות - ₪150</option>' +
		'<option value= "insurance" ' + insurancevar + '>דמי ביטוח - ₪110</option>' +
		'<option value= "trips" ' + tripsvar + '>טיול - ₪200</option>'
	);



}


/******************************************** Click on pay via paypal ***********************************************/

function paypalClick(email, payment) {

	console.log("email: " + email + " payment: " + payment);

	$.ajax({
		url: "http://" +
			window.location.hostname +
			":" +
			window.location.port +
			"/Parents/pay",
		method: "POST",
		data: {
			member_email: email,
			payment: payment
		},
		dataType: "json",

		success: function (data) {
			showKidsPayments();
			$('#payModal').modal('hide');
		}
	})
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



/******************************************** Ready Function ***********************************************/
$(document).ready(function () {

	/******************************************** Change payment status ***********************************************/
	$("#paymentSelector").change(function () {
		var selected = $('option:selected', this).val();
		var email = $('#kidEmail').val();
		$('#payBtnDiv').html('<input type="image" src="https://www.paypalobjects.com/he_IL/IL/i/btn/btn_paynowCC_LG.gif"' +
			'name = "submit" alt = "PayPal - הדרך הקלה והבטוחה יותר לשלם באינטרנט!" onclick = "paypalClick(\'' + email + '\', \'' + selected + '\')" >' +
			'<img alt = "" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width = "1" height = "1" > ');
	});




	let now = (new Date()).toISOString().substring(0, 10);

	$('#datepicker').attr('min', now);

	refreshActivity();
	showMyKids();
	showKidsPayments();
	refreshMeeting();
	checkNewMessages();
	updateMemberStats();

	/* the time interval in which the activity dashboard is refreshed */
	setInterval(() => {
		refreshActivity();
		refreshMeeting();
		showKidsPayments();
		checkNewMessages();
		updateMemberStats();
		showMyKids();
	}, 60000);

	var i = 0;
	var j = 0;




	///////////////////////// Toggle disabled function //////////////////////////////
	$('#declare').click(function () {
		$('#sendHealthDeclareBtn').attr('disabled', !this.checked)
	});








});
