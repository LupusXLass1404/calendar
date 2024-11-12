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
            $day=date('d');
        }
        if (isset($_GET['month'])){
            $month = $_GET['month'];
        } else {
            $month=date('m');
        }

        if (isset($_GET['year'])){
            $year = $_GET['year'];
        } else {
            $year=date('Y');
        }

        if($month <= 1){
            $prevMonth=12;
            $prevYear=$year-1;
        } else {
            $prevMonth=$month-1;
            $prevYear=$year;
        }

        if($month >= 12){
            $nextMonth=1;
            $nextYear=$year+1;
        } else {
            $nextMonth=$month+1;
            $nextYear=$year;
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
        <!--  -->
        <main id="main">
            <div id="buttons" class="buttons">
                <div id="prevChange">  
                    <!-- 放上一個按鈕的地方 -->
                </div>
                <div class="choose">
                    <span id="month" class="button">Month</span>
                    <span id="year" class="button">Year</span>
                </div>
                <div id="nextChange">
                    <!-- 放下一個按鈕的地方 -->
                </div>
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
                                    echo "<td class='thisTime'>";
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
                <a href="./index.php" class="button">Reset date</a>
            </div>
        </main>
    </div>

    <footer id="foot">
        <p>
            <a href="https://github.com/LupusXLass1404/calendar" target="_blank">
                <i class="fa-brands fa-github"></i> github
            </a>
            <i class="fa-regular fa-copyright"></i> 2024 Nemophila. All Rights Reserved.
        </p>
    </footer>

    <script>
        // getId
        let monthId = document.getElementById('month');
        let yearId = document.getElementById('year');
        let prevId = document.getElementById('prevChange');
        let nextId = document.getElementById('nextChange');
        
        // PHP
        let dayJs = `<?=$day?>`;
        let monthJs = `<?=$month?>`;
        let yearJs = `<?=$year?>`;

        // 月表格
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        // 監聽按鈕
        monthId.addEventListener('click', function () {
            // console.log('month');
            changeTime('month');
        });
        yearId.addEventListener('click', function () {
            // console.log('year');
            changeTime('year');
        });
        
        // 頂端按鈕
        function topButtons(type) {
            let prevButton, nextButton;
            
            switch (type) {
                case 'month':
                    console.log('month: ' + type);
                    prevButton = `
                        <a id="prevMonth" href="#" class="button">
                            <i class="fa-solid fa-circle-chevron-left"></i> Previous year
                        </a>`;
                    nextButton = `
                        <a id="nextMonth" href="#" class="button">
                            Next year <i class="fa-solid fa-circle-chevron-right"></i>
                        </a>`;
                    break;
                case 'year':
                    console.log('year: ' + type);
                    prevButton = `
                        <a href="#" class="button">
                            <i class="fa-solid fa-circle-chevron-left"></i> Previous
                        </a>`;
                    nextButton = `
                        <a href="#" class="button">
                            Next <i class="fa-solid fa-circle-chevron-right"></i>
                        </a>`;
                    break;
                default:
                    console.log('default: '+type);
                    prevButton = `
                        <a href="?year=<?=$prevYear;?>&month=<?=$prevMonth;?>&day=<?=$day;?>" class="button">
                            <i class="fa-solid fa-circle-chevron-left"></i> Previous month
                        </a>`;
                    nextButton = `
                        <a href="?year=<?=$nextYear;?>&month=<?=$nextMonth;?>&day=<?=$day?>" class="button">
                            Next month <i class="fa-solid fa-circle-chevron-right"></i>
                        </a>`;
                    break;
                }

            prevId.innerHTML = prevButton;
            nextId.innerHTML = nextButton;
            console.log(prevButton);
            console.log(nextButton);

            switch (type) {
                case 'month':
                    let prevMonthId = document.getElementById('prevMonth');
                    let nextMonthId = document.getElementById('nextMonth');

                    prevMonthId.addEventListener('click', function(){
                        yearJs -= 1;
                        changeTitle(month);
                    })
                    nextMonthId.addEventListener('click', function(){
                        yearJs += 1;
                        changeTitle(month);
                    })
                    break;
                case 'year':
                    console.log('year: ' + type);
                    break;
            }
        }


        let monthNum = 0;
        let monthTable = "<table>";
        monthTable += `<caption id="monthTitle">${yearJs}</caption>`
        for (i = 0; i < 4; i++) {
            monthTable += "<tr>";
            for (j = 0; j < 3; j++) {
                monthTable += `<td class="changeMonth">
                            <a href="?year=${yearJs}&month=${monthNum+1}&day=${dayJs}" class="tableLink">
                                ${months[monthNum]}
                            </a>
                        </td>`;
                monthNum+=1;
            }
            monthTable += "</tr>"
        }
        monthTable += "</table>"
        document.getElementById('monthTable').innerHTML = monthTable;

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
            topButtons(time);

            let changeClass = [...document.querySelectorAll('.changeMonth')];
            // console.log(changeClass);
            changeClass.forEach(ele => {
                ele.addEventListener('click', function () {
                    console.log(ele);
                    show('calendar');
                    hide('monthTable');
                    hide('yearTable');
                }, { once: true })
            }); // forEach() 結束
        } // changeTime() 結束

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

        function changeTitle(time) {
            document.getElementById('monthtitle').innerHTML = yearJs;
        }

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

        // 初始化
        function init() {
            topButtons('calendar');
            hide('yearTable');
            hide('monthTable');
            // 時鐘
            updateClock();
        }

        init()

    </script>


</body>

</html>