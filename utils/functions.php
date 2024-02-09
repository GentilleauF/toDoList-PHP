<?php

class Functions {

    // Clean Forms input
    public static function sanitize(?string $data):string{
        return htmlentities(strip_tags(stripslashes(trim($data))));

    }
}