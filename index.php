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

        include("./css/theme.php"); 
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeless Calendar</title>
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/theme.php">
    <script src="https://kit.fontawesome.com/a3ca2244ae.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>
<body class="base month month_<?=$month;?>">
<div class="snow-container"></div>

    <?php
        $thisToday = strtotime(date('y-m-d'));
        $thisDay = date('j', $thisToday);
        $thisMonth = date('m', $thisToday);
        $thisYear = date('Y', $thisToday);

        $firstDay = strtotime(date($year."-".$month."-1"));
        $chooseTime = strtotime(date($year."-".$month."-".$day));
        $chooseWeek = date('N', $firstDay);
        $chooseMonth = date('m', $chooseTime);
        $chooseYear = date('Y', $chooseTime);
    ?>
    <!-- .container>aside+main^footer -->
    <div class="container">
        <aside>
            <div class="timeBox">
                <?php
                    // 處理日期文字
                    $showWeek = date("l", $chooseTime);
                    $showMonth = date("F", $chooseTime);
                    $dayOrdinal = "th";
                    if (!in_array($day, array(11,12,13))) {
                        switch ($day % 10) {
                            case 1:  $dayOrdinal = 'st'; break;
                            case 2:  $dayOrdinal = 'nd'; break;
                            case 3:  $dayOrdinal = 'rd'; break;
                        }
                    }
                ?>
                <p class="yearMonth">
                    <?=$showMonth;?> ◆ <?= $year;?>
                </p>
                <p class="day">
                    <?=$day;?><span class="ordinal"><?=$dayOrdinal;?></span>
                </p>
                <p class="week">
                    <?=$showWeek?>
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
                    <i class="fa-solid fa-quote-left"></i>
                </div>
                <div class="quote">
                    "<?php
                        $quotes = [
                            "New year, new beginnings.",
                            "The best way to predict the future is to create it.",
                            "Love is in the air.",
                            "The future belongs to those who believe in the beauty of their dreams.",
                            "April showers bring May flowers.",
                            "Life isn’t about waiting for the storm to pass, it’s about learning to dance in the rain.",
                            "Summer is the time to live in the moment.",
                            "Do what you love, and you’ll never work a day in your life.",
                            "Fall in love with taking care of yourself.",
                            "Don't wait for the perfect moment. Take the moment and make it perfect.",
                            "Gratitude turns what we have into enough.",
                            "End the year with a grateful heart."
                        ];
                        echo $quotes[$month-1];
                    ?>"
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
                <table id="dateTable">
                <caption><?=$year;?> — <?=$month;?></caption>
                    <tr>
                        <th>Sun.</th>
                        <th>Mon.</th>
                        <th>Tue.</th>
                        <th>Wed.</th>
                        <th>Thu.</th>
                        <th>Fri.</th>
                        <th>Sat.</th>
                    </tr>
                    <?php
                        $dynamicDay = $firstDay;
                        $lastWeek = 7-(7-$chooseWeek)+1;
                        $lastWeek = $chooseWeek;
                        
                        $dynamicDay = strtotime("-$lastWeek day", $dynamicDay);

                        for ($i=1;$i<=6;$i++){
                            echo "<tr>";
                            for($j=1;$j<=7;$j++){
                                $dynamicMonth = date('n', $dynamicDay);
                                // echo "$dynamicMonth,";
                                // echo $dynamicDay;
                                $printDay = date('j', $dynamicDay);
                                $chooseTimeClass=(date("Y-m-d",$chooseTime)==date("Y-m-d", $dynamicDay))?'chooseTime':'';

                                if ($month != $dynamicMonth){
                                    echo "<td class='non-nowMonth $chooseTimeClass'>";
                                } else if($thisYear == $chooseYear && $thisMonth == $chooseMonth &&  $thisDay == $printDay) {
                                    echo "<td class='thisTime $chooseTimeClass'>";
                                } else {
                                    echo "<td class='$chooseTimeClass'>";   
                                }
                                echo "<a href='?year=$year&month=$dynamicMonth&day=$printDay' class='tableLink'>$printDay</a>";
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
        const monthId = document.getElementById('month');
        const yearId = document.getElementById('year');
        const prevId = document.getElementById('prevChange');
        const nextId = document.getElementById('nextChange');
        
        // PHP
        let dayJs = `<?=$day?>`;
        let monthJs = `<?=$month?>`;
        let yearJs = `<?=$year?>`;
        const thisYearJs = `<?=$thisYear?>`;
        const thisMonthJs = `<?=$thisMonth?>`;

        // 月陣列
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        // 監聽按鈕
        monthId.addEventListener('click', function () {
            // console.log('month');
            monthTable();
            changeTime('month');
        });
        yearId.addEventListener('click', function () {
            // console.log('year');
            yearTable()
            changeTime('year');
        });
        
        // 頂端按鈕
        function topButtons(type) {
            let prevButton, nextButton;
            
            switch (type) {
                case 'month':
                    // console.log('month: ' + type);
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
                    // console.log('year: ' + type);
                    prevButton = `
                        <a id="prevYear" href="#" class="button">
                            <i class="fa-solid fa-circle-chevron-left"></i> Previous
                        </a>`;
                    nextButton = `
                        <a id="nextYear" href="#" class="button">
                            Next <i class="fa-solid fa-circle-chevron-right"></i>
                        </a>`;
                    break;
                default:
                    // console.log('default: '+type);
                    prevButton = `
                        <a href="?year=<?=$prevYear;?>&month=<?=$prevMonth;?>&day=<?=$day;?>" class="button">
                            <i class="fa-solid fa-circle-chevron-left"></i> Previous month
                        </a>`;
                    nextButton = `
                        <a href="?year=<?=$nextYear;?>&month=<?=$nextMonth;?>&day=<?=$day;?>" class="button">
                            Next month <i class="fa-solid fa-circle-chevron-right"></i>
                        </a>`;
                    break;
                }

            prevId.innerHTML = prevButton;
            nextId.innerHTML = nextButton;
            // console.log(prevButton);
            // console.log(nextButton);

            switch (type) {
                case 'month':
                    const prevMonthId = document.getElementById('prevMonth');
                    const nextMonthId = document.getElementById('nextMonth');

                    prevMonthId.addEventListener('click', function(){
                        yearJs = Number(yearJs) - 1;
                        changeTitle(month);
                        monthTable();
                    })
                    nextMonthId.addEventListener('click', function(){
                        yearJs = Number(yearJs) + 1;
                        changeTitle(month);
                        monthTable();
                    })
                    break;
                case 'year':
                    const prevYearId = document.getElementById('prevYear');
                    const nextYearId = document.getElementById('nextYear');

                    prevYearId.addEventListener('click', function(){
                        yearJs = Number(yearJs) - 12;
                        changeTitle(year);
                        yearTable();
                    })
                    nextYearId.addEventListener('click', function(){
                        yearJs = Number(yearJs) + 12;
                        changeTitle(year);
                        yearTable();
                    })
                    break;
            }
        }

        // 選擇月份的表格
        function monthTable(){
            let monthNum = 0;
            let monthTable = "<table>";
            monthTable += `<caption id="monthTitle">${yearJs}</caption>`
            for (i = 0; i < 4; i++) {
                monthTable += "<tr>";
                for (j = 0; j < 3; j++) {
                    monthTable += `<td class="changeMonth ${thisYearJs == yearJs &&  thisMonthJs == monthNum+1 ? "thisTime" : ""}">
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
            // if ($yearJs ){

            // }
        }

        // 選擇年份的表格
        function yearTable(){
            let yearNum = yearJs-4;
            let yearTable = "<table>";
            yearTable += `<caption id="yearTitle">${yearNum} - ${yearNum+11}</caption>`
            for (i = 0; i < 4; i++) {
                yearTable += "<tr>";
                for (j = 0; j < 3; j++) {
                    yearTable += `<td class="changeYear ${thisYearJs == yearNum ? "thisTime" : ""}">
                                <a href="?year=${yearNum}&month=${monthJs}&day=${dayJs}" class="tableLink">
                                    ${yearNum}
                                </a>
                            </td>`;
                    yearNum+=1;
                }
                yearTable += "</tr>"
            }
            yearTable += "</table>"
            document.getElementById('yearTable').innerHTML = yearTable;
        }

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
            switch (time) {
                case 'month':
                    document.getElementById('monthTitle').innerHTML = yearJs;
                    break;
                case 'year':
                    document.getElementById('yearTitle').innerHTML = `${yearNum} - ${yearNum+11}`;     
                    break;
            }
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

        document.addEventListener('mousemove', function(event) {
            // 創建雪花元素
            const snowflake = document.createElement('div');
            snowflake.classList.add('snowflake');

            // 設置雪花的大小，隨機生成一個 3 到 6 像素的大小
            const size = Math.random() * 3 + 3;
            snowflake.style.width = `${size}px`;
            snowflake.style.height = `${size}px`;

            // 設置雪花的初始位置，根據鼠標位置放置
            snowflake.style.left = `${event.pageX - size / 2}px`;
            snowflake.style.top = `${event.pageY - size / 2}px`;

            // 設置雪花掉落的速度，隨機設定
            const animationDuration = Math.random() * 3 + 2;
            snowflake.style.animationDuration = `${animationDuration}s`;

            // 將雪花加入到雪花容器中
            document.querySelector('.snow-container').appendChild(snowflake);

            // 在動畫結束後移除雪花
            snowflake.addEventListener('animationend', function() {
                snowflake.remove();
            });
        });

    </script>


</body>

</html>