<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>calendar</title>

    <link id="styleElement" rel="stylesheet" href="./styles/calendar.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- navbar integration -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("navigation_head.html", function (data) {
            $("#nav-placeholder").replaceWith(data);
        });
        $.get("navigation_footer.html", function (data) {
            $("#nav-foot-placeholder").replaceWith(data);
        });
    </script>
    <script>
        var calendarView = true

        function toggleScheduleView() {
            let styleEl = document.getElementById('styleElement')
            let button = document.getElementById('calendar-toggle')
            if (calendarView) {
                styleEl.href = "./styles/scheduleList.css"
                button.textContent = "Calendar View"
                calendarView = false
            } else {
                styleEl.href = "./styles/calendar.css"
                button.textContent = "List View"
                calendarView = true
            }
        }

        console.log($(window).width())
    </script>

    <script>
        // There is a samll bug here about transfer list and calendar view, will fix later
        // (should switch back to calendar view from list view when window is expanded)
        $(document).ready(function () {
            $(window).resize(function () {
                let styleEl = document.getElementById('styleElement')
                if ($(window).width() < 850) {
                    styleEl.href = "./styles/scheduleList.css"
                    document.getElementById('calendar-toggle').style.display = "none"
                } else {
                    styleEl.href = "./styles/calendar.css"
                    document.getElementById('calendar-toggle').style.display = "flex"
                }
            });
        });
    </script>
</head>
<?php

function getYear($date){
    echo explode("-",$date)[0];
}

function getMonth($date){
    $numberMonth = explode("-",$date)[1];
   // echo $numberMonth;
   switch($numberMonth){
       case "01":
       echo "January";
       break;
       case "02":
       echo "Feburay";
       break;
       case "03":
       echo "March";
       break;
       case "04":
       echo "April";
       break;
       case "09":
       echo "September";
       break;
       case "10":
       echo "October";
       break;
       case "11":
       echo "November";
       break;
       case "12":
       echo "December";
       break;
   }
}

function getDayOfWeek(){

    
}

$months = array("September","October","November","December","January","Feburay","March","April");
$daysOfWeek = array("Monday","Tuesday","Wednesday","Thursday","Friday");
echo "<div class='wrapper'>";
echo "<div class='KARL-calendar-container'>";
      foreach ($months as $month)  {
        echo " <div class='month'>";
        echo "<h1 class='schedule-month'>".$month."</h1>";
        foreach ($daysOfWeek as $dayOfWeek){
            echo   "<h2 class='calender-day-of-week'>".$dayOfWeek."</h2>";
        }
                    // foreach (){
            //     echo   "<div class='day'>";
            //     echo   "<h3 class='day-of-week'>".Monday."</h3>";
            //     echo   "<h3 class='date'>".September 11, 2017."</h3>";
            //     echo   "<p class='subject'>".Orientation / Study Skills."</p>";
            //     echo   "<p class='instructor'>".Pat McGee / Marlene Delanghe."</p>";
            //     echo   "</div>";
            // }
        echo "</div>";
      }


echo "</div>";
echo "</div>";

$url='http://ssdscheduleapi20180326021240.azurewebsites.net/api/values';
$result = file_get_contents($url);
$resultData = json_decode($result);
echo getYear($resultData[0]->date);
echo getMonth($resultData[100]->date);
// print_r ($resultData[]);
//echo gettype($resultData[0]->date);


?>

<body class="schedule-body">
    <header>
        <div id="nav-placeholder"></div>
    </header>
    <main>
        <div class="wrapper">
            <h2 class="KARL-schedule-title">2017.9 - 2018.5 Schedule</h2>

            <!-- <div class="container"> -->

            <div class="button-toggler">
                <button id="calendar-toggle" onclick="toggleScheduleView()">List View</button>
            </div>

            <div class="KARL-calendar-container">
                <div class="month">
                    <h1 class="schedule-month">September</h1>
                    <h2 class="calender-day-of-week">Monday</h2>
                    <h2 class="calender-day-of-week">Tuesday</h2>
                    <h2 class="calender-day-of-week">Wednesday</h2>
                    <h2 class="calender-day-of-week">Thursday</h2>
                    <h2 class="calender-day-of-week">Friday</h2>
                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">September 11, 2017</h3>
                        <p class="subject">Orientation / Study Skills</p>
                        <p class="instructor">Pat McGee / Marlene Delanghe</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">September 12, 2017</h3>
                        <p class="subject">Team Building / Prof Communication</p>
                        <p class="instructor">Marlene Delanghe</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">September 13, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 1)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">September 14, 2017</h3>
                        <p class="subject">Systems Analysis and Design</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">September 15, 2017</h3>
                        <p class="subject">Relational Databases</p>
                        <p class="instructor">Pat McGee</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">September 18, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 1)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">September 19, 2017</h3>
                        <p class="subject">Systems Analysis and Design</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">September 20, 2017</h3>
                        <p class="subject">Relational Databases</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">September 21, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 1)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">September 22, 2017</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part I</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">September 25, 2017</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part I</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">September 26, 2017</h3>
                        <p class="subject">Systems Analysis and Design</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">September 27, 2017</h3>
                        <p class="subject">JavaScript (Part 1)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">September 28, 2017</h3>
                        <p class="subject">Relational Databases</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">September 29, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 1)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                </div>
                <div class="month">
                    <h1 class="schedule-month">October</h1>
                    <h2 class="calender-day-of-week">Monday</h2>
                    <h2 class="calender-day-of-week">Tuesday</h2>
                    <h2 class="calender-day-of-week">Wednesday</h2>
                    <h2 class="calender-day-of-week">Thursday</h2>
                    <h2 class="calender-day-of-week">Friday</h2>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">October 2, 2017</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part I</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">October 3, 2017</h3>
                        <p class="subject">Systems Analysis and Design</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">October 4, 2017</h3>
                        <p class="subject">JavaScript (Part 1)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">October 5, 2017</h3>
                        <p class="subject">Relational Databases</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">October 6, 2017</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part I</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">October 9, 2017</h3>
                        <p class="subject">Thanksgiving Day</p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">October 10, 2017</h3>
                        <p class="subject">Presentation Skills</p>
                        <p class="instructor">Marlene Delanghe</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">October 11, 2017</h3>
                        <p class="subject">JavaScript (Part 1)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">October 12, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 1)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">October 13, 2017</h3>
                        <p class="subject">Systems Analysis and Design</p>
                        <p class="instructor">Pat McGee</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">October 16, 2017</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part I</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">October 17, 2017</h3>
                        <p class="subject">Relational Databases</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">October 18, 2017</h3>
                        <p class="subject">JavaScript (Part 1)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">October 19, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 2)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">October 20, 2017</h3>
                        <p class="subject">Relational Databases</p>
                        <p class="instructor">Pat McGee</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">October 23, 2017</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part I</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">October 24, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 2)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">October 25, 2017</h3>
                        <p class="subject">JavaScript (Part 1)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">October 26, 2017</h3>
                        <p class="subject">Javascript Applications</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">October 27, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 2)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">October 30, 2017</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part I</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">October 31, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 2)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                </div>
                <div class="month">
                    <h1 class="schedule-month">November</h1>
                    <h2 class="calender-day-of-week">Monday</h2>
                    <h2 class="calender-day-of-week">Tuesday</h2>
                    <h2 class="calender-day-of-week">Wednesday</h2>
                    <h2 class="calender-day-of-week">Thursday</h2>
                    <h2 class="calender-day-of-week">Friday</h2>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">November 1, 2017</h3>
                        <p class="subject">Flex day (no class is currently scheduled but this could change)</p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">November 2, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 2)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">November 3, 2017</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part I</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">November 6, 2017</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part I</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">November 7, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 2)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">November 8, 2017</h3>
                        <p class="subject">Javascript Applications</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">November 9, 2017</h3>
                        <p class="subject">OO Programming in C# (Part 2)</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">November 10, 2017</h3>
                        <p class="subject">Introductory Java Programming</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">November 13, 2017</h3>
                        <p class="subject">Remembrance Day - BCIT Closed</p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">November 14, 2017</h3>
                        <p class="subject">Javascript Applications</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">November 15, 2017</h3>
                        <p class="subject">ASP.NET - 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">November 16, 2017</h3>
                        <p class="subject">Project 1 - Phase 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">November 17, 2017</h3>
                        <p class="subject">Introductory Java Programming</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">November 20, 2017</h3>
                        <p class="subject">ASP.NET - 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">November 21, 2017</h3>
                        <p class="subject">PHP / MySQL</p>
                        <p class="instructor">Jeff Parker</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">November 22, 2017</h3>
                        <p class="subject">Javascript Applications</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">November 23, 2017</h3>
                        <p class="subject">Project 1 - Phase 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">November 24, 2017</h3>
                        <p class="subject">Introductory Java Programming</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">November 27, 2017</h3>
                        <p class="subject">ASP.NET - 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">November 28, 2017</h3>
                        <p class="subject">Javascript Applications</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">November 29, 2017</h3>
                        <p class="subject">Project 1 - Phase 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">November 30, 2017</h3>
                        <p class="subject">ASP.NET - 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                </div>
                <div class="month">
                    <h1 class="schedule-month">December</h1>
                    <h2 class="calender-day-of-week">Monday</h2>
                    <h2 class="calender-day-of-week">Tuesday</h2>
                    <h2 class="calender-day-of-week">Wednesday</h2>
                    <h2 class="calender-day-of-week">Thursday</h2>
                    <h2 class="calender-day-of-week">Friday</h2>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">December 1, 2017</h3>
                        <p class="subject">Introductory Java Programming</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">December 4, 2017</h3>
                        <p class="subject">PHP / MySQL</p>
                        <p class="instructor">Jeff Parker</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">December 5, 2017</h3>
                        <p class="subject">PHP / MySQL</p>
                        <p class="instructor">Jeff Parker</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">December 6, 2017</h3>
                        <p class="subject">Javascript Applications</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">December 7, 2017</h3>
                        <p class="subject">Project 1 - Phase 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">December 8, 2017</h3>
                        <p class="subject">Introductory Java Programming</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">December 11, 2017</h3>
                        <p class="subject">ASP.NET - 2</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">December 12, 2017</h3>
                        <p class="subject">ASP.NET - 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">December 13, 2017</h3>
                        <p class="subject">PHP / MySQL</p>
                        <p class="instructor">Jeff Parker</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">December 14, 2017</h3>
                        <p class="subject">ASP.NET - 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">December 15, 2017</h3>
                        <p class="subject">Project 1 - Phase 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                </div>
                <div class="month">
                    <h1 class="schedule-month">January</h1>
                    <h2 class="calender-day-of-week">Monday</h2>
                    <h2 class="calender-day-of-week">Tuesday</h2>
                    <h2 class="calender-day-of-week">Wednesday</h2>
                    <h2 class="calender-day-of-week">Thursday</h2>
                    <h2 class="calender-day-of-week">Friday</h2>
                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">January 8, 2018</h3>
                        <p class="subject">JavaScript (Part 2)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">January 9, 2018</h3>
                        <p class="subject">PHP / MySQL</p>
                        <p class="instructor">Jeff Parker</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">January 10, 2018</h3>
                        <p class="subject">ASP.NET - 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">January 11, 2018</h3>
                        <p class="subject">ASP.NET - 1</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">January 12, 2018</h3>
                        <p class="subject">Android Introduction</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">January 15, 2018</h3>
                        <p class="subject">JavaScript (Part 2)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">January 16, 2018</h3>
                        <p class="subject">PHP / MySQL</p>
                        <p class="instructor">Jeff Parker</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">January 17, 2018</h3>
                        <p class="subject">ASP.NET - 2</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">January 18, 2018</h3>
                        <p class="subject">PHP / MySQL</p>
                        <p class="instructor">Jeff Parker</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">January 19, 2018</h3>
                        <p class="subject">Android Introduction</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">January 22, 2018</h3>
                        <p class="subject">JavaScript (Part 2)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">January 23, 2018</h3>
                        <p class="subject">PHP / MySQL</p>
                        <p class="instructor">Jeff Parker</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">January 24, 2018</h3>
                        <p class="subject">ASP.NET - 2</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">January 25, 2018</h3>
                        <p class="subject">ASP.NET - 2</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">January 26, 2018</h3>
                        <p class="subject">Android Introduction</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">January 29, 2018</h3>
                        <p class="subject">JavaScript (Part 2)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">January 30, 2018</h3>
                        <p class="subject">Web Application Security</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">January 31, 2018</h3>
                        <p class="subject">ASP.NET - 2</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                </div>
                <div class="month">
                    <h1 class="schedule-month">February</h1>
                    <h2 class="calender-day-of-week">Monday</h2>
                    <h2 class="calender-day-of-week">Tuesday</h2>
                    <h2 class="calender-day-of-week">Wednesday</h2>
                    <h2 class="calender-day-of-week">Thursday</h2>
                    <h2 class="calender-day-of-week">Friday</h2>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">February 1, 2018</h3>
                        <p class="subject">Web Application Security</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">February 2, 2018</h3>
                        <p class="subject">Android Introduction</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">February 5, 2018</h3>
                        <p class="subject">JavaScript (Part 2)</p>
                        <p class="instructor">Jason Harrison</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">February 6, 2018</h3>
                        <p class="subject">Web Application Security</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">February 7, 2018</h3>
                        <p class="subject">MEAN (Mongo, ExpressJS, Angular, Node)</p>
                        <p class="instructor">Medhat Elmasry</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">February 8, 2018</h3>
                        <p class="subject">Project 1 - Phase 2</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">February 9, 2018</h3>
                        <p class="subject">Android Introduction</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">February 12, 2018</h3>
                        <p class="subject">Family Day</p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">February 13, 2018</h3>
                        <p class="subject">Project 1 - Phase 2</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">February 14, 2018</h3>
                        <p class="subject">MEAN (Mongo, ExpressJS, Angular, Node)</p>
                        <p class="instructor">Medhat Elmasry</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">February 15, 2018</h3>
                        <p class="subject">Web Application Security</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">February 16, 2018</h3>
                        <p class="subject">Android Introduction</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">February 19, 2018</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part II</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">February 20, 2018</h3>
                        <p class="subject">Project 1 - Phase 2</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">February 21, 2018</h3>
                        <p class="subject">MEAN (Mongo, ExpressJS, Angular, Node)</p>
                        <p class="instructor">Medhat Elmasry</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">February 22, 2018</h3>
                        <p class="subject">Web Application Security</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">February 23, 2018</h3>
                        <p class="subject">Android Introduction</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">February 26, 2018</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part II</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">February 27, 2018</h3>
                        <p class="subject">Project 1 - Phase 2</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">February 28, 2018</h3>
                        <p class="subject">MEAN (Mongo, ExpressJS, Angular, Node)</p>
                        <p class="instructor">Medhat Elmasry</p>
                    </div>
                </div>
                <div class="month">
                    <h1 class="schedule-month">March</h1>
                    <h2 class="calender-day-of-week">Monday</h2>
                    <h2 class="calender-day-of-week">Tuesday</h2>
                    <h2 class="calender-day-of-week">Wednesday</h2>
                    <h2 class="calender-day-of-week">Thursday</h2>
                    <h2 class="calender-day-of-week">Friday</h2>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day empty-month-start">
                        <h3 class="date"></h3>
                        <p class="subject"></p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">March 1, 2018</h3>
                        <p class="subject">iOS Development</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">March 2, 2018</h3>
                        <p class="subject">Android Introduction</p>
                        <p class="instructor">Paul Mills</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">March 5, 2018</h3>
                        <p class="subject">iOS Development</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">March 6, 2018</h3>
                        <p class="subject">iOS Development</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">March 7, 2018</h3>
                        <p class="subject">MEAN (Mongo, ExpressJS, Angular, Node)</p>
                        <p class="instructor">Medhat Elmasry</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">March 8, 2018</h3>
                        <p class="subject">iOS Development</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">March 9, 2018</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part II</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">March 12, 2018</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part II</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">March 13, 2018</h3>
                        <p class="subject">iOS Development</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">March 14, 2018</h3>
                        <p class="subject">MEAN (Mongo, ExpressJS, Angular, Node)</p>
                        <p class="instructor">Medhat Elmasry</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">March 15, 2018</h3>
                        <p class="subject">iOS Development</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">March 16, 2018</h3>
                        <p class="subject">iOS Development</p>
                        <p class="instructor">Pat McGee</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">March 19, 2018</h3>
                        <p class="subject">March Break</p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">March 20, 2018</h3>
                        <p class="subject">March Break</p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">March 21, 2018</h3>
                        <p class="subject">March Break</p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">March 22, 2018</h3>
                        <p class="subject">March Break</p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">March 23, 2018</h3>
                        <p class="subject">March Break</p>
                        <p class="instructor"></p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">March 26, 2018</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part II</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">March 27, 2018</h3>
                        <p class="subject">Project 1 - Phase 3</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">March 28, 2018</h3>
                        <p class="subject">MEAN (Mongo, ExpressJS, Angular, Node)</p>
                        <p class="instructor">Medhat Elmasry</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">March 29, 2018</h3>
                        <p class="subject">Resume Writing Essentials</p>
                        <p class="instructor">Marlene Delanghe</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">March 30, 2018</h3>
                        <p class="subject">BCIT Closed Good Friday</p>
                        <p class="instructor"></p>
                    </div>
                </div>
                <div class="month">
                    <h1 class="schedule-month">April</h1>
                    <h2 class="calender-day-of-week">Monday</h2>
                    <h2 class="calender-day-of-week">Tuesday</h2>
                    <h2 class="calender-day-of-week">Wednesday</h2>
                    <h2 class="calender-day-of-week">Thursday</h2>
                    <h2 class="calender-day-of-week">Friday</h2>
                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">April 2, 2018</h3>
                        <p class="subject">BCIT Closed Easter Monday</p>
                        <p class="instructor"></p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">April 3, 2018</h3>
                        <p class="subject">Project 1 - Phase 3</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">April 4, 2018</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part II</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">April 5, 2018</h3>
                        <p class="subject">iOS Development</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">April 6, 2018</h3>
                        <p class="subject">Project 1 - Phase 3</p>
                        <p class="instructor">Pat McGee</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">April 9, 2018</h3>
                        <p class="subject">Interview Skills</p>
                        <p class="instructor">Marlene Delanghe</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">April 10, 2018</h3>
                        <p class="subject">Mock Interviews</p>
                        <p class="instructor">Marlene Delanghe</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Wednesday</h3>
                        <h3 class="date">April 11, 2018</h3>
                        <p class="subject">MEAN (Mongo, ExpressJS, Angular, Node)</p>
                        <p class="instructor">Medhat Elmasry</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Thursday</h3>
                        <h3 class="date">April 12, 2018</h3>
                        <p class="subject">iOS Development</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Friday</h3>
                        <h3 class="date">April 13, 2018</h3>
                        <p class="subject">Front End Web Design, Scripting, and Tooling - Part II</p>
                        <p class="instructor">Michael Whyte</p>
                    </div>

                    <div class="day">
                        <h3 class="day-of-week">Monday</h3>
                        <h3 class="date">April 16, 2018</h3>
                        <p class="subject">Project 1 - Phase 3</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                    <div class="day">
                        <h3 class="day-of-week">Tuesday</h3>
                        <h3 class="date">April 17 - May 11</h3>
                        <p class="subject">Industry Project</p>
                        <p class="instructor">Pat McGee</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div id="nav-foot-placeholder"></div>
    </footer>
</body>

</html>