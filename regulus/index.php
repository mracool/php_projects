<?php


function regulus($line){
    // password length
    $reg_length = '/^.{10,}$/';
    if (!preg_match($reg_length, $line)) {
        echo 'Length less than 10</br>';
    }
    //number of numbers
    $reg_two_numbers = "/^(.*?[0-9]){2,}.*$/";
    if (!preg_match($reg_two_numbers, $line)) {
        echo 'Line isnt contain at least 2 numbers</br>';
    }
    //number of lowercase characters
    $reg_two_lowercase = "/^(.*?[a-z]){2,}.*$/";
    if (!preg_match($reg_two_lowercase, $line)) {
        echo 'Line isnt contain at least 2 lowercase characters</br>';
    }
    //number of uppercase characters
    $reg_two_uppercase = "/^(.*?[A-Z]){2,}.*$/";
    if (!preg_match($reg_two_uppercase, $line)) {
        echo 'Line isnt contain at least 2 uppercase characters</br>';
    }
    //number of %$#_* characters
    $reg_two_spec = "/^(.*?[%$#_*]){2,}.*$/";
    if (!preg_match($reg_two_spec, $line)) {
        echo 'Line isnt contain at least 2 %$#_* characters</br>';
    }

    //3rd part of a task
    //numbers
    //$reg_3_numbers = "/(\d){4,}/";
    $reg_3_numbers = "/([0-9]){4,}/";
    if (preg_match($reg_3_numbers, $line)) {
        echo 'Line is containing more then 3 numbers in a row</br>';
    }
    //%$#_* characters
    $reg_3_spec = "/([%$#_*]){4,}/";
    if (preg_match($reg_3_spec, $line)) {
        echo 'Line is containing ore then 3 %$#_* characters</br>';
    }
    //uppercase characters
    $reg_3_uppercase = "/[A-Z]{4,}/";
    if (preg_match($reg_3_uppercase, $line)) {
        echo 'Line is containing more then 3 uppercase characters</br>';
    }
    //number of lowercase characters
    $reg_3_lowercase = "/[a-z]{4,}/";
    if (preg_match($reg_3_lowercase, $line)) {
        echo 'Line is containing more then 3 lowercase characters</br>';
    }
}
if (isset($_REQUEST['text'])) {
    $line = $_REQUEST['text'];
    regulus($line);
} else {
    include 'regular.html';
}