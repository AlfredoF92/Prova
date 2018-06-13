<?php

include_once "config.php";
include_once "ConnectionException.php";

class Manager {

    /** @var  mysqli */
    private static $c;

    /**
     * @return mysqli
     * @throws ConnectionException
     */
    public static function getDB() {
        if (self::$c == NULL) {
		
           self::$c = new mysqli(Config::$DB_URL, Config::$DB_USER, Config::$DB_PASS, Config::$DB_NAME);
            if (self::$c->connect_error) {
                throw new ConnectionException("Connection failed: " . self::$c->connect_error);
            }
        }
        return self::$c; //Msqli object. Open a new connection to the MySQL server
    }

    public static function formatNullString($string){
        if($string==null || empty($string)){
            return 'null';
        }else{
            return "'$string'";
        }
    }
}

?>