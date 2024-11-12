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
                <p class="time">
                    06:39:24
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
                <div id="prev" class="change button">
                    <i class="fa-solid fa-circle-chevron-left"></i> Previous month
                </div>
                <div class="choose">
                    <span id="month" class="button">Month</span>
                    <span id="year" class="button">Year</span>
                </div>
                <div id="next" class="change button">
                    Next month <i class="fa-solid fa-circle-chevron-right"></i>
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
                <table id="dateTable"></table>
            </div>

            <div id="monthTable" class="calendar changeTable">
                <!-- 改變月的表格 -->
            </div>

            <div id="yearTable" class="calendar changeTable">
                <!-- 改變年的表格 -->
            </div>

            <div class="bottomButton">
                <a href="design.html" class="button"><span id="reset">Reset date</span></a>
            </div>
        </main>

    </div>
    <footer>
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

        // 暫時用表格
        let td = "";

        for (i = 0; i < 6; i++) {
            td += "<tr>";
            for (j = 0; j < 7; j++) {
                td += `<td>${i * i + j}</td>`;
            }
            td += "</tr>"
        }
        document.getElementById('dateTable').innerHTML = td;

        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        let month = "<table>";
        for (i = 0; i < 4; i++) {
            month += "<tr>";
            for (j = 0; j < 3; j++) {
                month += `<td class="changeMonth">
                            <a href="?month=1" class="tableLink">
                                ${months[i * i + j]}
                            </a>
                        </td>`;
            }
            month += "</tr>"
        }
        month += "</table>"
        document.getElementById('yearTable').innerHTML = month;
        document.getElementById('monthTable').innerHTML = month;
        // console.log(`table: ${month}`)

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

        // 初始化
        function init() {
            hide('yearTable');
            hide('monthTable');
        }
        init()

    </script>


</body>

</html>