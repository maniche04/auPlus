<?php

class DatabaseObject {
    
    protected static $table_name;
    
    public static function get_by_id($id){
        global $database;
        $sql = "SELECT * FROM " . static::$table_name ." WHERE id = {$id} LIMIT 1";
        $result = $database->query($sql);
        $output = $database->fetch_assoc($result);
        if ($output) {
            return $output;
        } else {
            return "";
        }
        
    }
    
}

?>