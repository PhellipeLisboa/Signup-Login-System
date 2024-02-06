<?php 

class Validation {
    static function clean($str) {
        $str = trim($str);
        $str = stripcslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    static function name($str) {
        // Letters Only
        $name_regex = "/^([a-zA-Z' ]+)$/";

        if (preg_match($name_regex, $str)) {
            return true;
        } else {
            return false;
        }
    }

    static function userName($str) {
        // Must start with letter [A-Za-Z]
        // 6-8 characters {5,7} OBS: 1 initial letter + 5-7 mixed characteres 
        // Letters and numbers only [A-Za-z0-9]
        $userName_regex = "/^[A-Za-z][A-Za-z0-9]{5,7}$/";

        if (preg_match($userName_regex, $str)) {
            return true;
        } else {
            return false;
        }
    } 

    static function email($str) {
        if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    } 

    static function password($str) {
        // minimum 4 characteres in lenght. {4,}
        // At least one uppercase letter. (?=.*?[A-Z])
        // At least one lowercase letter. (?=.*?[a-z])
        // At least one digit. (?=.*?[0-9])
        // At least one special character. (?=.*?[#?!@$%^&*-])
        $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-,]).{4,}$/";

        if (preg_match($password_regex, $str)) {
            return true;
        } else {
            return false;
        }
    } 

    static function match($str1, $str2) {

        if ($str1 === $str2) {
            return true;
        } else {
            return false;
        }
    } 
}