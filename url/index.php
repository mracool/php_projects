<?php
ini_set('max_execution_time', 900);
function print_ping($url)
{
    $output = [];
    $command = 'ping ' . $url;
    exec($command, $output);
    //print_r($output);
    echo '<b>' . explode(']', explode('[', $output[1])[1])[0] . '</b>';
    echo '<br>';
    echo 100 - explode('%', explode('(', $output[9])[1])[0] . '% success';

}

function print_tracert($url)
{
    $output = [];
    $command = 'tracert ' . $url;
    exec($command, $output);
    // print_r($output);
    echo '<b>' . explode(']', explode('[', $output[1])[1])[0] . '</b><br>';
    for ($i = 4; $i < count($output); $i++) {
        if (strlen($output[$i]) > 0) {
            if (is_numeric($output[$i][strlen($output[$i]) - 1])) {
                $temp = explode(' ', $output[$i]);
                echo $temp[count($temp) - 1] . ' ';
            }
            if ($output[$i][strlen($output[$i]) - 1] == ']') {
                $temp = explode(' ', $output[$i]);
                echo $temp[count($temp) - 1] . ' ';
            }
        }
    }
}


if (isset($_REQUEST['url'])) {
    $ecraned = escapeshellcmd($_REQUEST['url']);
    if ($_REQUEST['url'] == $ecraned) {
        if (isset($_REQUEST['ping'])) {
            print_ping($_REQUEST['url']);
        }
        if (isset($_REQUEST['tracert'])) {
            print_tracert($_REQUEST['url']);
        }
    } else {
        echo "Wrong URL form!";
    }
} else {
    include 'phpurl.html';
}