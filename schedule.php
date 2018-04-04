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
        jQuery(function(){
            jQuery('#header-placeholder').load('header.html');
            jQuery('#footer-placeholder').load('footer.html');
        });
    </script>
    <script>
        var calendarView = true
        function toggleScheduleView() {
            //test
            let styleEl = document.getElementById('styleElement')
            let button = document.getElementById('calendar-toggle')
            if (calendarView) {
                styleEl.href = "./styles/scheduleList.css"
                button.textContent = "Calendar View"
                calendarView = false
                sessionStorage.setItem('buttonText', 'Calendar View');
                sessionStorage.setItem('cssLink','./styles/scheduleList.css')


//test

            } else {
                styleEl.href = "./styles/calendar.css"
                button.textContent = "List View"
                calendarView = true
                
                sessionStorage.setItem('buttonText', 'List View');
                sessionStorage.setItem('cssLink','./styles/calendar.css')

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
                    styleEl.href = sessionStorage.getItem('cssLink')
                    document.getElementById('calendar-toggle').textContent = sessionStorage.getItem('buttonText')
                    document.getElementById('calendar-toggle').style.display = "flex"
                }
            });
        });
    </script>
</head>


<body class="schedule-body">
    <header>
        <div id="header-placeholder"></div>
    </header>
    <main>
    <?php

function getYear($date){
    //echo explode("-",$date)[0];
    return explode("-",$date)[0];
}

function getMonthInNumber($date){
    return explode("-",$date)[1];
}

function getMonth($date){
    $numberMonth = explode("-",$date)[1];
   // echo $numberMonth;
   switch($numberMonth){
       case "01":
       return  "January";
       break;
       case "02":
       return "Feburay";
       break;
       case "03":
       return "March";
       break;
       case "04":
       return "April";
       break;
       case "09":
       return "September";
       break;
       case "10":
       return "October";
       break;
       case "11":
       return "November";
       break;
       case "12":
       return "December";
       break;
   }
}

function getDay($date){
    $numberDayWithTail = explode("-",$date)[2];
    $Day = explode("T",$numberDayWithTail)[0];
    return $Day;
}

function getDayOfWeek($date){
    $year = getYear($date);
    $month = getMonthInNumber($date);
    $numberDayWithTail = explode("-",$date)[2];
    $Day = explode("T",$numberDayWithTail)[0];
    $stringDate = $year."-".$month."-".$Day;
   $unixTimestamp = strtotime($date);
   $dayOfWeek = date("l", $unixTimestamp);
   return $dayOfWeek;
}

function dayFromMonday($date){
    $dayOfWeek = getDayOfWeek($date);
    switch($dayOfWeek){
        case "Monday":
            return 0;
            break;
        case "Tuesday":
            return 1;
            break;
        case "Wednesday":
            return 2;
            break;
        case "Thursday":
            return 3;
            break;
        case "Friday":
            return 4;
            break;
    }
}

function isFirstDay($date,$resultData){

    if ($date == $resultData[0]){
        return true;
    }

    for($i = 0; $i<200;$i++){
        if ($date == $resultData[$i]){
            if (getMonth($date->date) != getMonth($resultData[$i-1]->date)){
                return true;
            }else {
                return false;
            }
        }
    }
}

//get data from api
$url='http://ssdscheduleapi20180326021240.azurewebsites.net/api/values';
$result = file_get_contents($url);
$resultData = json_decode($result);

$months = array("September","October","November","December","January","Feburay","March","April");
$daysOfWeek = array("Monday","Tuesday","Wednesday","Thursday","Friday");
echo "<div class='wrapper'>";
echo "<h2 class='KARL-schedule-title'>2017.9 - 2018.5 Schedule</h2>";
echo "<div class='button-toggler'>";
echo "<button id='calendar-toggle' onclick='toggleScheduleView()'>List View</button>";
echo "</div>";
echo "<div class='KARL-calendar-container'>";
      foreach ($months as $month)  {
        
        echo " <div class='month'>";
        echo "<h1 class='schedule-month'>".$month."</h1>";
        foreach ($daysOfWeek as $dayOfWeek){
            echo   "<h2 class='calender-day-of-week'>".$dayOfWeek."</h2>";
        }
                
                foreach ($resultData as $oneDayData){
                    if (getMonth($oneDayData->date)  == $month ){
                        if (isFirstDay($oneDayData,$resultData)){
                          //  echo $firstDayOfMonth;
                            for($i = 0; $i<dayFromMonday($oneDayData->date);$i++){
                                echo "<div class='day'></div>";
                            }
                        }
                        echo   "<div class='day'>";
                        echo   "<h3 class='day-of-week'>".getDayOfWeek($oneDayData->date)."</h3>";
                        echo   "<h3 class='date'>".getMonth($oneDayData->date)." ".getDay($oneDayData->date).", ".getYear($oneDayData->date)."</h3>";
                        echo   "<p class='subject'>".$oneDayData->course."</p>";
                        echo   "<p class='instructor'>".$oneDayData->instructor."</p>";
                        echo   "</div>"; 
                    }
                
                }
                
        echo "</div>";
      }
echo "</div>";
echo "</div>";
?>
    </main>
    <footer>
        <div id="footer-placeholder"></div>
    </footer>
</body>
<script>
        let styleEl = document.getElementById('styleElement')

        if (document.documentElement.clientWidth < 850 ){
            calendarView = false
            styleEl.href = "./styles/scheduleList.css"
            document.getElementById('calendar-toggle').style.display = "none"
            sessionStorage.setItem('buttonText', 'Calendar View');
            sessionStorage.setItem('cssLink','./styles/scheduleList.css')


        }else {
            calendarView = true
            styleEl.href = "./styles/calendar.css"
            sessionStorage.setItem('buttonText', 'List View');
            sessionStorage.setItem('cssLink','./styles/calendar.css')
        }
</script>
</html>