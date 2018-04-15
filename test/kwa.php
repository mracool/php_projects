<?php
$code = '';
$data = '';
try {
    if (!isset($_REQUEST['code'])) {
        throw new Exception("Wrong script entry");
    }
    $code = $_REQUEST['code'];
    $data = $_REQUEST['data'];
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}


$array = [];
$array[0] = 0;
$final_string = "";
$array_move = 0;
$data_symbol = 0;
$i = 0;
for ($i = 0; $i < strlen($code); $i++) {
    switch ($code[$i]) {
        case '>':
            $array_move++;
            if (!isset($array[$array_move])) {
                $array[$array_move] = 0;
            }
            break;
        case '<':
            $array_move--;
            if (!isset($array[$array_move])) {
                $array[$array_move] = 0;
            }
            break;
        case '+':
            $array[$array_move]++;
            if ($array[$array_move] == 256) {
                $array[$array_move] = 0;
            }
            break;
        case '-':
            $array[$array_move]--;
            if ($array[$array_move] == -1) {
                $array[$array_move] = 255;
            }
            break;
        case '.':
            $final_string .= chr($array[$array_move]);
            break;
        case ',':
            $array[$array_move] = ord($data[$data_symbol]);
            $data_symbol++;
            break;
        case '[':
            if ($array[$array_move] == 0) {
                $bras = 0;
                while (true) {
                    if ($code[$i] == '[') {
                        $bras++;
                    } elseif ($code[$i] == ']') {
                        $bras--;
                    }
                    $i++;
                    if ($bras == 0) {
                        break;
                    }
                }
            }
            break;
        case ']':
            if ($array[$array_move] != 0) {
                $bras = 0;
                while (true) {
                    if ($code[$i] == ']') {
                        $bras++;
                    } elseif ($code[$i] == '[') {
                        $bras--;
                    }
                    $i--;
                    if ($bras == 0) {
                        break;
                    }
                }
            }
            break;
    }
}
echo $final_string;


//                      _
//          __   ___.--'_'.
//         ( _'.'. -   'o' )
//         _\.'_'      _.-'
//        ( \'. )    //\'
//         \_'-''---'\\__,
//          \'        '-\