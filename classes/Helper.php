<?php

class Helper {

    static function get_current_Page_URL() {
        $pageURL = isset($_SERVER ['HTTPS']) ? 'https://' : 'http://';
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return strtolower($pageURL);
    }

    static function print_array($array) {
        $arr = array();
        foreach ($array as $k => $v) {
            if (is_array($array[$k])) {
                echo "$k is an array <br/>";
                print_array($array[$k]);
            } else {
                echo "****$k : $v <br/>";
            }
        }
    }

    /* Checks whether an option is an answer or not
        If there's a star at the second letter then it's the answer
        example:
        Q: What is not a super global variable of the following
        A) $_SERVER
        B) $_GET
        C) $_POST
        D*) $_PUT
        D is considered the answer in this case
    */
    static function is_answer($option) {
        $answer = false;
        if(substr($option, 1, 1) === '*') {
            $answer = true;
        }
        return $answer;
    }

    /* Trims the answer field to take only the answer value without the question number */
    static function get_answer_value($option) {
        return trim(substr($option, 4, strlen($option)));
    }
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helper
 *
 * @author memad
 */

