<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/a3ca2244ae.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="month_11">
    <?php
        date_default_timezone_set('Asia/Taipei');

        if (isset($_GET['day'])){
            $day = $_GET['day'];
        } else {
            $month=date('d');
        }
        if (isset($_GET['month'])){
            $month = $_GET['month'];
        } else {
            $month=date('m');
        }

        if (isset($_GET['year'])){
            $year = $_GET['year'];
        } else {
            $month=date('Y');
        }

        if($month >= 12){
            $nextMonth=1;
            $nextYear= year+1;
        } else {
            $nextMonth=$month+1;
        }

       
        $firstDay = date('Y-m-1');
        $thisDay = date('j');
        $thisweek = date('N');
        $thisMonth= date('m');
        
        // echo $firstDay;
        $dynamicDay = strtotime($firstDay);
        $lastWeek = 7-$thisweek;
        $dynamicDay = strtotime("-$lastWeek day", $dynamicDay);
        // echo $dynamicDay;
    ?>
    <!-- .container>aside+main^footer -->
    <div class="container">
        <aside>
            <div class="timeBox">
                <p class="yearMonth">
                    September ◆ 2024
                </p>
                <p class="day">
                    24<span class="ordinal">th</span>
                </p>
                <p class="week">
                    Wednesday
                </p>
                <p id="clock" class="clock">
                    00:00:00
                </p>
            </div>

            <div>
                <hr>
            </div>

            <div class="quotation">
                <div class="mark">
                    “
                </div>
                <div class="quote">
                    “ Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s”
                </div>
            </div>

        </aside>

        <main id="main">
            <div id="buttons" class="buttons">
                <a href="?year=2024&month=1&day=1" class="button">
                    <i class="fa-solid fa-circle-chevron-left"></i> Previous <span class="change">month</span>
                </a>
                <div class="choose">
                    <span id="month" class="button">Month</span>
                    <span id="year" class="button">Year</span>
                </div>
                <a href="?year=2024&month=1&day=1" class="button">
                    Next <span class="change">month</span> <i class="fa-solid fa-circle-chevron-right"></i>
                </a>
            </div>
            <div id="calendar" class="calendar">
                <ul class="weekList">
                    <li>Sun.</li>
                    <li>Mon.</li>
                    <li>Tue.</li>
                    <li>Wed.</li>
                    <li>Thu.</li>
                    <li>Fri.</li>
                    <li>Sat.</li>
                </ul>
                <table id="dateTable">
                    <?php
                        for ($i=1;$i<=6;$i++){
                            echo "<tr>";
                            for($j=1;$j<=7;$j++){
                                $dynamicMonth = date('m', $dynamicDay);
                                $printDay = date('j', $dynamicDay);

                                if ($thisMonth != $dynamicMonth){
                                    echo "<td class='non-nowMonth'>";
                                } else if($thisDay == $printDay) {
                                    echo "<td id='today'>";
                                } else {
                                    echo "<td>";
                                }
                                echo $printDay;
                                $dynamicDay = strtotime("+1 day", $dynamicDay);
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>

            <div id="monthTable" class="calendar changeTable">
                <!-- 改變月的表格 -->
            </div>

            <div id="yearTable" class="calendar changeTable">
                <!-- 改變年的表格 -->
            </div>

            <div class="bottomButton">
                <a href="#" class="button">Reset date</a>
            </div>
        </main>
    </div>

    <footer id="foot">
        <p>
            <a href="https://github.com/LupusXLass1404/calendar">
                <i class="fa-brands fa-github"></i> github
            </a>
            <i class="fa-regular fa-copyright"></i> 2024 Nemophila. All Rights Reserved.
        </p>
    </footer>

    <script>
        // 宣告getId
        let monthId = document.getElementById('month');
        let yearId = document.getElementById('year');

        // 監聽按鈕
        monthId.addEventListener('click', function () {
            // console.log('month');
            changeTime('month');
        });
        yearId.addEventListener('click', function () {
            // console.log('year');
            changeTime('year');
        });
        // 月表格
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        let monthNum = 1;

        let month = "<table>";
        month += "<caption>2024</caption>"
        for (i = 0; i < 4; i++) {
            month += "<tr>";
            for (j = 0; j < 3; j++) {
                month += `<td class="changeMonth">
                            <a href="?month=1" class="tableLink">
                                ${months[monthNum]}
                            </a>
                        </td>`;
                monthNum+=1;
            }
            month += "</tr>"
        }
        month += "</table>"
        document.getElementById('monthTable').innerHTML = month;

        // 年表格

        // 改變時間
        function changeTime(time) {
            hide('monthTable');
            hide('yearTable');
            hide('calendar');
            show(`${time}Table`);
            show('month');
            show('year');
            hide(time);

            let changeClass = [...document.querySelectorAll('.changeMonth')];
            // console.log(changeClass);
            changeClass.forEach(ele => {
                ele.addEventListener('click', function () {
                    console.log(ele);
                    show('calendar');
                    hide('monthTable');
                    hide('yearTable');
                })
            }); // forEach() 結束
        } // changeTime() 結束

        // 隱藏／顯示
        function hide(id) {
            // console.log(`hide: ${id}`)
            let getId = document.getElementById(id);
            // console.log(`hide: ${getId}`)
            getId.style.display = "none";
        }
        function show(id) {
            // console.log(`show: ${id}`)
            let getId = document.getElementById(id);
            // console.log(`show: ${getId}`)
            getId.style.display = "block";
        }

        // 時鐘區
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }

        // 每秒更新一次時鐘
        setInterval(updateClock, 1000);

        // 初始化
        function init() {
            hide('yearTable');
            hide('monthTable');
            // 時鐘
            updateClock();
        }

        init()

    </script>


</body>

</html>