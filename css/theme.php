<?php
    $c= $month-1;

    $color = [
        [
            'title'=> "rgb(74 145 133)", // 松綠
            'button'=> "rgba(127 225 209 / 50%)", 
            'special' => "rgb(109 231 210)",
        ],
        [
            'title'=> "rgb(119 82 153)", // 紫
            'button'=> "rgba(188 117 205 / 50%)",
            'special' => "rgb(231 171 255)",
        ],
        [
            'title'=> "rgb(237 102 145)", // 粉
            'button'=> "rgba(255 132 190 / 50%)", 
            'special' => "rgb(255 173 199)",
        ],
        [
            'title'=> "rgb(87 175 87)", // 淺綠
            'button'=> "rgba(129 221 129 / 50%)", 
            'special' => "rgb(88 227 150)",
        ],
        [
            'title'=> "rgb(165 165 165)", // 灰
            'button'=> "rgba(163 163 163 / 50%)", 
            'special' => "rgb(255 254 234)",
        ],
        [
            'title'=> "rgb(255 132 132)", // 珊瑚
            'button'=> "rgba(253 141 118 / 50%)", 
            'special' => "rgb(255 157 157)",
        ],
        [
            'title'=> "rgb(39 158 191)", // 藍
            'button'=> "rgba(70 146 180 / 50%)", 
            'special' => "rgb(0 241 255)",
        ],
        [
            'title'=> "rgb(255 185 0)", // 黃
            'button'=> "rgba(255 225 32 / 50%)", 
            'special' => "rgb(255 241 116)",
        ],
        [
            'title'=> "rgb(137 0 0)", // 紅
            'button'=> "rgba(209 13 13 / 50%)", 
            'special' => "rgb(239 27 27)",
        ],
        [
            'title'=> "rgb(141 102 63)", // 深棕
            'button'=> "rgba(143 85 43 / 50%)", 
            'special' => "rgb(203 139 108)",
        ],
        [
            'title'=> "rgb(191 76 24)", // 橘
            'button'=> "rgba(255 125 20 / 50%)", 
            'special' => "rgb(255 153 0)",
        ],
        [
            'title'=> "rgb(54 112 173)", // 冰藍
            'button'=> "rgba(135 191 255 / 50%)",
            'special' => "rgb(141 196 255)",
        ]
    ];

?>

<style>
    .timeBox p {
        color: <?=$color[$c]['special'];?>;
    }

    .month #dateTable td:nth-child(1) a,
    .month #dateTable td:nth-child(7) a,
    .month #dateTable th:nth-child(1),
    .month #dateTable th:nth-child(7) {
        color: <?=$color[$c]['special'];?>;
    }

    .month .thisTime a {
        background-color: <?=$color[$c]['special'];?>;
    }

    .month caption{
        background-color: <?=$color[$c]['title'];?>;
    }

    .month .tableLink:active {
        background-color: <?=$color[$c]['special'];?>;
    }

    .month .tableLink:hover {
        border: 3px solid <?=$color[$c]['special'];?>>;
    }

    .month .button {
        background-color: <?=$color[$c]['button'];?>;
    }

</style>