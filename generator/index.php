<?php
function generator($text, &$counterr)
{
    for ($i = 0; $i < strlen($text); $i++) {
        switch ($text[$i]) {
            case 'h':
                $counterr++;
                yield '4';
                break;
            case 'l':
                $counterr++;
                yield '1';
                break;
            case 'e':
                $counterr++;
                yield '3';
                break;
            case 'o':
                $counterr++;
                yield '0';
                break;
            default:
                yield $text[$i];
                break;
        }
    }
}


function recreate($text)
{
    $pointer = 0;
    $final_string = '';
    foreach (generator($text, $pointer) as $new_line) {
        $final_string .= $new_line;
    }
    echo $final_string;
    echo '</br>';
    echo $pointer;
}



if (isset($_REQUEST['text'])) {
    $string = $_REQUEST['text'];
    recreate($string);
} else {
    include 'file_.html';
}
