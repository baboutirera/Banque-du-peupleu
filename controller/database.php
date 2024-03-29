<?php class Database
{
    private static $dbName = 'banquedupeuple' ;
    private static $dbHost = 'localhost' ;
    private static $dbclientname = 'root'; 
    private static $dbclientPassword = '';
    private static $cont = null; 

    public function __construct() { 
        die('Init function is not allowed');
     } 
     
    public static function connect() { 
        if ( null == self::$cont ) {    
             try { 
                 self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbclientname, self::$dbclientPassword); 
                }catch(PDOException $e) {
                     die($e->getMessage()); 
                 }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
    