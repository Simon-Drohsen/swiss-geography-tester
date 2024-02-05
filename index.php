<?php
$cantonArr = array(
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
);

$cantonInput = array_search(strtolower($_GET['canton']), $cantonArr);
$cantonIndex = array_search($cantonInput, array_keys($cantonArr)) + 1;

if (isset($_GET['canton'])) {
    if(array_search($cantonInput, array_keys($cantonArr))) {
        $canton = twoWordString($cantonArr[$cantonIndex], str_contains($cantonArr[$cantonIndex], ' '), str_contains($cantonArr[$cantonIndex], '-'));
        print_r('This is '. ucfirst($canton));
    } else {
        print_r('This is not a canton');
    }
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
