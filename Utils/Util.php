<?php

class Util
{
    static function redirect($location, $type, $errorMessage, $data = "")
    {
        header("Location: $location?$type=$errorMessage&$data");
    }
}
