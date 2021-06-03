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


    <link rel="stylesheet" href="../../assets/css/instructor-homepage.css">

    <title>Instructor Homepage</title>
</head>

<body>
    <header>

        <!-----------------------------Navbar -------------------------------------->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark navbar-custom">
            <div class="container-fluid">

                <a class="navbar-brand" href="/application/views/Instructor/homepage.php">
                    <img style="max-width:40%" src="../../assets/pics/logo/white_logo.png" class="img-responsive" /></a>

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
                                <span class="material-icons" type="button" data-toggle="modal"
                                    data-target="#notificationsModal">
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

    <!---------------------------------- End Header -------------------------------------->
    <div class="container-fluid-reverse horizontal-scrollable">

        <h2>
            <!--<?php echo $fname ?>--> שלום
        </h2>
        <div class="orientation-bar"></div>

        <!-----------------------------Submition Notes & Alerts-------------------------------------->
        <span class="submition-alert"></span>

        <!-----------------------------Dashboard data-------------------------------------->
        <div class="row flex-row-reverse flex-nowrap align-items-top" id="row-dashboard">

            <!----------------------- Activities --------------------->
            <div class="col-sm-12 col-md-6 col-xl-3 text-center text-center" id="activity">
                <div class="dashboard-bar" id="activity-status">
                    <h3>הפעילויות הקרובות שלי</h3>
                    <table class="table" id="activityTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">תאריך</th>
                                <th scope="col">שעה</th>
                                <th scope="col">פעילות</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class="expansion-bar">
                    <botton type="button" class="expandBtn" data-toggle="collapse" data-target="#expandedActivityBar"
                        id="expandedActivityBar-btn">
                        ניהול פעילויות<i class="material-icons" title="הרחב" id="expandIcon">keyboard_arrow_down</i>
                    </botton>
                </div>

                <div id="expandedActivityBar" class="collapse">
                    <div class="expanded-content">
                        <button type="button" data-toggle="modal" data-target="#newActivityModal" class="modalOpenBtns">
                            צור פעילות
                            חדשה</button>

                        <button type="button" data-toggle="modal" data-target="#watchAllActivitiesModal"
                            class="modalOpenBtns">
                            צפה בכל הפעילויות</button>

                        <button type="button" data-toggle="modal" data-target="#newExpanseModal"
                            class="modalOpenBtns">הוספת
                            הוצאה</button>

                        <button type="button" data-toggle="modal" data-target="#ExpansesModal"
                            class="modalOpenBtns">שליפת
                            דו"ח
                            הוצאות
                        </button>
                    </div>
                </div>

                <img src="../../assets/pics/bnei-akiva/13.jpg">
            </div>

            <!----------------------- Meetings --------------------->
            <div class="col-sm-12 col-md-6 col-xl-3 text-center text-center" id="meetings">
                <div class="dashboard-bar" id="class-status">
                    <h3>הפגישות הקרובות שלי</h3>
                    <table class="table" id="meetingsTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">תאריך</th>
                                <th scope="col">שעה</th>
                                <th scope="col">שם ההורה</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class="expansion-bar">
                    <botton type="button" class="expandBtn" data-toggle="collapse" data-target="#expandedMeetingsBar">
                        ניהול פגישות<i class="material-icons" title="הרחב" id="expandIcon">keyboard_arrow_down</i>
                    </botton>
                </div>

                <div id="expandedMeetingsBar" class="collapse">
                    <div class="expanded-content">
                        <button type="button" data-toggle="modal" data-target="#watchAllMeetingsModal"
                            class="modalOpenBtns">
                            צפה בכל הפגישות
                        </button>
                    </div>
                </div>

                <img src="../../assets/pics/bnei-akiva/12.jpg">
            </div>


            <!----------------------- the Movement --------------------->
            <div class="col-sm-12 col-md-6 col-xl-3 text-center" id="movement">
                <div class="dashboard-bar" id="next-activity">
                    <h3>בקשות להחלפת משמרת</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">תאריך</th>
                                <th scope="col">שעה</th>
                                <th scope="col">מבקש</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td class="align-middle">14.05.21</td>
                                <td class="align-middle">15:00</td>
                                <td class="align-middle">מור נחום</td>
                                <td class="align-middle"><button class="icon-edit" type="button" data-toggle="modal"
                                        data-target="#editActivityModal" title="אשר החלפה">
                                        <i class="material-icons" id="editActivityIcon" title="אשר החלפה">check</i>
                                    </button>
                                </td>
                                <td class="align-middle"><button class="icon-start" type="button" data-toggle="modal"
                                        data-target="#editActivityModal" title="דחה החלפה">
                                        <i class="material-icons" id="editActivityIcon" title="דחה החלפה">clear</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td class="align-middle">28.05.21</td>
                                <td class="align-middle">18:30 </td>
                                <td class="align-middle">נועה רמון</td>
                                <td class="align-middle"><button class="icon-edit" type="button" data-toggle="modal"
                                        data-target="#editActivityModal" title="אשר החלפה">
                                        <i class="material-icons" id="editActivityIcon" title="אשר החלפה">check</i>
                                    </button>
                                </td>
                                <td class="align-middle"><button class="icon-start" type="button" data-toggle="modal"
                                        data-target="#editActivityModal" title="דחה החלפה">
                                        <i class="material-icons" id="editActivityIcon" title="דחה החלפה">clear</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td class="align-middle">10.06.21</td>
                                <td class="align-middle">10:00</td>
                                <td class="align-middle">איליה שיפרין</td>
                                <td class="align-middle"><button class="icon-edit" type="button" data-toggle="modal"
                                        data-target="#editActivityModal" title="אשר החלפה">
                                        <i class="material-icons" id="editActivityIcon" title="אשר החלפה">check</i>
                                    </button>
                                </td>
                                <td class="align-middle"><button class="icon-start" type="button" data-toggle="modal"
                                        data-target="#editActivityModal" title="דחה החלפה">
                                        <i class="material-icons" id="editActivityIcon" title="דחה החלפה">clear</i>
                                    </button>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>

                <div class="expansion-bar">
                    <botton type="button" class="expandBtn" data-toggle="collapse" data-target="#expandedMovementBar">
                        ניהול משמרות <i class="material-icons" title="הרחב" id="expandIcon">keyboard_arrow_down</i>
                    </botton>
                </div>

                <div id="expandedMovementBar" class="collapse">
                    <div class="expanded-content">
                        <div class="activity-bar" id="new-activity">
                            <button type="button" data-toggle="modal" data-target="#newActivityModal"
                                class="modalOpenBtns">בקשה לחילוף בפעילות
                            </button>
                        </div>
                    </div>
                </div>

                <img src="../../assets/pics/bnei-akiva/1.png">

            </div>


            <!----------------------- Students --------------------->
            <div class="col-sm-12 col-md-6 col-xl-3 text-center" id="d2">
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
                                <td class="align-middle">10</td>
                                <td class="align-middle">6</td>
                                <td class="align-middle">15</td>
                            </tr>
                            <tr>
                                <th scope="row">לא התקבלו</th>
                                <td class="align-middle">5</td>
                                <td class="align-middle">9</td>
                                <td class="align-middle">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="expansion-bar">
                    <botton type="button" class="expandBtn" data-toggle="collapse" data-target="#expandedStudentsBar">
                        ניהול חניכים<i class="material-icons" title="הרחב" id="expandIcon">keyboard_arrow_down</i>
                    </botton>
                </div>

                <div id="expandedStudentsBar" class="collapse">
                    <div class="expanded-content">
                        <button type="button" data-toggle="modal" data-target=#newMessageModal class="modalOpenBtns">
                            שליחת הודעה</button>
                        <button type="button" data-toggle="modal" data-target="#newActivityModal"
                            class="modalOpenBtns">צפייה בפרטי החניכים</button>
                        <button type="button" data-toggle="modal" data-target="#pendingStudentsModal"
                            class="modalOpenBtns">חניכים ממתינים לאישור
                        </button>
                    </div>
                </div>

                <img src="/assets/pics/bnei-akiva/4.jpg">

            </div>

        </div>

    </div>


    <footer>

    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="/assets/js/instructor-homepage.js"></script>
</body>


<!-----------------------------modal: watch all activities -------------------------------------->
<div class="modal fade" id="watchAllActivitiesModal">
    <div class="modal-container">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">

                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">X</button>
                    <h3>הפעילויות של שבט אפריים</h3>
                </div>

                <div class="modal-body">
                    <table class="table" id="activityTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">תאריך</th>
                                <th scope="col">שעה</th>
                                <th scope="col">פעילות</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

<!-----------------------------END modol watch all activities -------------------------------------->


<!-----------------------------modal: Start activity -------------------------------------->
<div class="modal fade" id="startActivityModal">
    <div class="modal-container">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">

                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">X</button>
                    <h3><span id="activityHeader">התחלת הפעילות</span></h3>
                </div>

                <div class="modal-body">
                    <form id="manage-activity" data-target="#startActivityModal">
                        <input type="text" id="manage_activity_id" hidden>
                        <div class="input-box">

                            <table class="table" id="membersTable">
                                <thead>
                                    <tr>
                                        <th scope="col">שם החניך</th>
                                        <th scope="col">הצהרה</th>
                                        <th scope="col">נוכחות</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                            <div>
                                <textarea id="after_summary" placeholder="הוסף סיכום קצר לפגישה"></textarea>
                            </div>
                            <div>
                                <button onclick="sendSummery(event)">בצע</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-----------------------------END modol start activity -------------------------------------->

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
                    <form id="new-activity">
                        <div class="input-box">
                            <div class="input-group">
                                <label for="activityName">שם הפעילות:</label>
                                <input type="text" name="name" id="activityName" maxlength="32">
                            </div>

                            <div class="input-group">
                                <label for="activityDesc">תיאור הפעילות:</label>
                                <textarea rows="3" cols="24" maxlength="100"
                                    placeholder="הזינו פרטים נוספים לגבי הפעילות..." name="description"
                                    id="activityDesc"></textarea>

                                <div class="input-group">
                                    <label for="activityDate">תאריך הפעילות:</label>
                                    <input type="date" name="date">
                                </div>

                                <div class="input-group">
                                    <label for="activityTime">שעת הפעילות:</label>
                                    <input type="time" name="time">
                                </div>
                            </div>

                            <button type="sumbit">בצע</button>

                        </div>
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



<!-----------------------------modal: expanses -------------------------------------->
<div class="modal fade" id="ExpansesModal">
    <div class="modal-container">
        <div class="modal-dialog vertical-align-center">

            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">X</button>
                    <h3>הוצאות</h3>
                </div>

                <div class="modal-body">
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
                                <td class="align-middle">14.05.21</td>
                                <td class="align-middle">140 ש"ח </td>
                                <td class="align-middle">קיימת</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td class="align-middle">28.05.21</td>
                                <td class="align-middle">252 ש"ח </td>
                                <td class="align-middle">קיימת</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td class="align-middle">10.06.21</td>
                                <td class="align-middle">78 ש"ח </td>
                                <td class="align-middle">חסר</td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

    <!-----------------------------END modal: new expanse -------------------------------------->

    <!-----------------------------modal: watch all meetings -------------------------------------->
    <div class="modal fade" id="watchAllMeetingsModal">
        <div class="modal-container">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">

                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal">X</button>
                        <h3>כל הפגישות שלי</h3>
                    </div>

                    <div class="modal-body">
                        <table class="table" id="meetingsTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">תאריך</th>
                                    <th scope="col">שעה</th>
                                    <th scope="col">שם ההורה</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-----------------------------END modol watch all meetings -------------------------------------->






    <!-----------------------------modal: read notifications -------------------------------------->
    <div class="modal fade" id="notificationsModal">
        <div class="modal-container">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">

                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal">X</button>
                        <h3>הודעות</h3>
                    </div>

                    <div class="modal-body">
                        <span id="no-new-notifications">אין הודעות חדשות.</span>
                        <div> <button type="button">צפה בכל ההודעות</button></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-----------------------------END modal: read notifications -------------------------------------->






</html>
