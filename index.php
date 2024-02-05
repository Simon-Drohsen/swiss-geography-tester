<?php
$cantonArr = [
    1 => 'zürich',
    2 => 'bern',
    3 => 'luzern',
    4 => 'uri',
    5 => 'schwyz',
    6 => 'obwalden',
    7 => 'nidwalden',
    8 => 'glarus',
    9 => 'zug',
    10 => 'freiburg',
    11 => 'solothurn',
    12 => 'basel-stadt',
    13 => 'basel-land',
    14 => 'schaffhausen',
    15 => 'appenzell ausserrhoden',
    16 => 'appenzell innerrhoden',
    17 => 'st. gallen',
    18 => 'graubünden',
    19 => 'aargau',
    20 => 'thurgau',
    21 => 'tessin',
    22 => 'waadt',
    23 => 'wallis',
    24 => 'neuenburg',
    25 => 'genf',
    26 => 'jura'
];

$biggestMountains = [
    'dufourspitze',
    'nordend',
    'liskamm',
    'täschhorn',
    'dom'
];

$biggestLakes = [
    'genfersee',
    'bodensee',
    'neuenburgersee',
    'lago Maggiore',
    'vierwaldstättersee'
];

$biggestRivers = [
    'rhein',
    'aare',
    'rhône',
    'reuss',
    'thur'
];

$cantonInput = strtolower($_GET['canton']);
$cantonIndex = array_search($cantonInput, $cantonArr);
$mountainInput = strtolower($_GET['biggestMountains']);
$lakeInput = strtolower($_GET['biggestLakes']);
$riverInput = strtolower($_GET['biggestRivers']);

if (isset($_GET['canton'])) {
    if($cantonIndex) {
        $canton = twoWordString($cantonArr[$cantonIndex], str_contains($cantonArr[$cantonIndex], ' '), str_contains($cantonArr[$cantonIndex], '-'));
        print_r('This is '. ucfirst($canton));
    } else {
        print_r('This is not a canton');
    }
    print_r('<br>');
}

if (isset($_GET['biggestMountains'])) {
    if (in_array($mountainInput, $biggestMountains)) {
        print_r(ucfirst($mountainInput) . ' is one of the top five mountains');
    } else {
        print_r('This is not a top five mountain');
    }
    print_r('<br>');
}

if (isset($_GET['biggestLakes'])) {
    if (in_array($lakeInput, $biggestLakes)) {
        print_r(ucfirst($lakeInput) . ' is one of the top five lakes');
    } else {
        print_r('This is not a top five lake');
    }
    print_r('<br>');
}

if (isset($_GET['biggestRivers'])) {
    if (in_array($riverInput, $biggestRivers)) {
        print_r(ucfirst($riverInput) . ' is one of the top five rivers');
    } else {
        print_r('This is not a top five river');
    }
    print_r('<br>');
}

function twoWordString(string $canton, bool $space, bool $dash) : string {
    $cantonLetters = str_split($canton);
    if(str_contains($canton, ' ') || str_contains($canton, '-')) {
        if($space) {
            $spaceIndex = array_search(' ', $cantonLetters);
            $cantonLetters[$spaceIndex+1] = ucfirst($cantonLetters[$spaceIndex+1]);
        } else if($dash) {
            $dashIndex = array_search('-', $cantonLetters);
            $cantonLetters[$dashIndex+1] = ucfirst($cantonLetters[$dashIndex+1]);
        }
    }
    return implode($cantonLetters);
}
