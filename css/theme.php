<?php
    $c= $month-1;

    $color = [
        1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        10,
        11,
        [
            'text' => "rgb(26, 79, 108)",
            'link'=> "rgb(26, 79, 108)",
            'button'=> "rgba(161, 205, 255, 0.5)",
            'special' => "rgb(86, 117, 201)",
        ]
    ];

?>

<style>
    .month,
    .month a,
    .month .bottomButton a {
        color: <?=$color[$c]['text'];?>;
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
        background-color: <?=$color[$c]['link'];?>;
    }

    .month .tableLink:hover {
        border: 3px solid <?=$color[$c]['link'];?>;
    }

    .month .button {
        background-color: <?=$color[$c]['button'];?>;
    }

</style>