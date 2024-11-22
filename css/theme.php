<?php
    $c= $month-1;

    $color = [
        [
            'title'=> "rgb(74 145 133)", // 灰
            'button'=> "rgba(127 225 209 / 50%)", 
            'special' => "rgb(109 231 210)",
        ],
        [
            'title'=> "rgb(119 82 153)", // 紫
            'button'=> "rgba(188 117 205 / 50%)",
            'special' => "rgb(231 171 255)",
        ],
        [
            'title'=> "rgb(255 173 199)", // 粉
            'button'=> "rgba(255 132 190 / 50%)", 
            'special' => "rgb(255 173 199)",
        ],
        [
            'text' => "rgb(144, 238, 144)", // 淺綠
            'title'=> "rgb(144, 238, 144)", 
            'button'=> "rgba(152, 251, 152, 0.5)", 
            'special' => "rgb(60, 179, 113)",
        ],
        [
            'text' => "rgb(173, 216, 230)", // 淺藍
            'title'=> "rgb(173, 216, 230)", 
            'button'=> "rgba(240, 248, 255, 0.5)", 
            'special' => "rgb(135, 206, 250)",
        ],
        [
            'text' => "rgb(34, 139, 34)", // 珊瑚
            'title'=> "rgb(34, 139, 34)", 
            'button'=> "rgba(50, 205, 50, 0.5)", 
            'special' => "rgb(0, 100, 0)",
        ],
        [
            'text' => "rgb(230, 230, 250)", // 淺紫
            'title'=> "rgb(230, 230, 250)", 
            'button'=> "rgba(216, 191, 216, 0.5)", 
            'special' => "rgb(147, 112, 219)",
        ],
        [
            'text' => "rgb(255, 215, 0)", // 黃
            'title'=> "rgb(255, 215, 0)", 
            'button'=> "rgba(255, 255, 224, 0.5)", 
            'special' => "rgb(240, 230, 140)",
        ],
        [
            'text' => "rgb(139, 0, 0)", // 深紅
            'title'=> "rgb(139, 0, 0)", 
            'button'=> "rgba(205, 92, 92, 0.5)", 
            'special' => "rgb(178, 34, 34)",
        ],
        [
            'text' => "rgb(101, 67, 33)", // 深棕
            'title'=> "rgb(101, 67, 33)", 
            'button'=> "rgba(139, 69, 19, 0.5)", 
            'special' => "rgb(160, 82, 45)",
        ],
        [
            'title'=> "rgb(255 185 80)", // 橘
            'button'=> "rgba(247 151 65 / 50%)", 
            'special' => "rgb(255 185 80)",
        ],
        [
            'title'=> "rgb(54 112 173)", // 深藍
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
    .month .weekList li:nth-child(1),
    .month .weekList li:nth-child(7) {
        color: <?=$color[$c]['special'];?>;
    }

    .month .thisTime a {
        background-color: <?=$color[$c]['special'];?>;
    }

    .month caption,
    .month .tableLink:active {
        background-color: <?=$color[$c]['title'];?>;
    }

    .month .tableLink:hover {
        border: 3px solid <?=$color[$c]['special'];?>;
    }

    .month .button {
        background-color: <?=$color[$c]['button'];?>;
    }

</style>