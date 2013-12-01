<?php

class User extends DatabaseObject {

    protected static $table_name = "user";

    public static function data_by_id($user_id, $data) {
        $output = self::get_by_id($user_id);
        return $output["{$data}"];
    }

}

?>