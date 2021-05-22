/* This function is activated with the start activity button */
function startActivity(id) {
        alert("starting activity id: " + id);
    }

/* This function is activated with the edit activity button */
function editActivity(id) {
    alert("editing id: " +id);
}

function compareDates (actDate) {
    var realDate = new date();
    var actDate = actDate();

    if (realDate.getTime() <= actDate.getTime()) {
        $('#start_'+activity.id).hide();
    }
}


$(document).ready(function () {

    /* the time interval in which the activity dashboard is refreshed */
     setInterval(() => {
        refreshActivity();
        refreshMeeting();
    }, 60000);

    var i=0;
    /******************************************** Activities ***********************************************/
    function refreshActivity() {
        var data1 = [{id:i+1, date:"2021-05-22", time:"10-50", name:"משחק"},{id:i+2, date:"2021-05-25", time:"11-50", name:"ארוחה"}, {id:i+3, date:"2021-05-28", time:"12-50", name:"סרט"} ]; /* artificial data for the dashboard data generator. to be replaced with the json */
        i+=3;
        
        $("#activityTable tbody").empty(); /* empties the table before each refresh */

        data1.forEach(function(activity) {
            /* complete structure of the table */
            $("#activityTable tbody").append('<tr><th scope="row" class="align-middle">'+activity.id+
            '</th><td class="align-middle">'+activity.date+'</td>'+
            '<td class="align-middle">'+activity.time+ '</td>'+
            '<td class="align-middle">'+activity.name+'</td>'+
            '<td class="align-middle"><button class="icon-start"  type="button" data-toggle="modal"'+
                                        'data-target="#editActivityModal" title="התחל פעילות" id="start_'+activity.id+'" onclick="startActivity('+activity.id+')">'+
                                        '<i class="material-icons" id="editActivityIcon"'+
                                            'title="התחל פעילות">play_arrow</i></button></td>'+
            '<td class="align-middle"><button class="icon-edit" type="button" data-toggle="modal"'+
                                        'data-target="#editActivityModal" title="ערוך פעילות" id="edit_'+activity.id+'" onclick="editActivity('+activity.id+')">'+
                                        '<i class="material-icons" id="editActivityIcon" title="ערוך'+ 'פעילות">edit</i></button></td></tr>'
                                        );

                                         /*compareDates(activity.date);*/

        

        });

    }


/******************************************** Meetings ***********************************************/
var j=0;
    function refreshMeeting() {
        var data2 = [{id:j+1, date:"2021-05-22", time:"10-50", parent:"רבקה קליין"},{id:j+2, date:"2021-05-25", time:"11-50", parent:"אריה אברמוב"}, {id:j+3, date:"2021-05-28", time:"12-50", parent:"הלל סבג"} ]; 
        j+=3;
        
        $("#meetingsTable tbody").empty(); /* empties the table before each refresh */

        data2.forEach(function(meeting) {
            /* complete structure of the table */
            $("#meetingsTable tbody").append('<tr><th scope="row" class="align-middle">'+meeting.id+
            '</th><td class="align-middle">'+meeting.date+'</td>'+
            '<td class="align-middle">'+meeting.time+ '</td>'+
            '<td class="align-middle">'+meeting.parent+'</td>'+
            '<td class="align-middle"><button class="icon-edit"  type="button" data-toggle="modal"'+
                                        'data-target="#editActivityModal" title="אשר פגישה" id="start_'+activity.id+'" onclick="startActivity('+activity.id+')">'+
                                        '<i class="material-icons" id="editActivityIcon"'+
                                            'title="אשר פגישה">check</i></button></td>'+
            '<td class="align-middle"><button class="icon-start" type="button" data-toggle="modal"'+
                                        'data-target="#editActivityModal" title="דחה פגישה" id="edit_'+activity.id+'" onclick="editActivity('+activity.id+')">'+
                                        '<i class="material-icons" id="editActivityIcon" title="דחה פגישה">clear</i></button></td></tr>'
                                        );

                                         /*compareDates(activity.date);*/

        });

    }



    refreshActivity();
    refreshMeeting();

})
