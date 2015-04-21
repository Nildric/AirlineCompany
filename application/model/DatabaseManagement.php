<?php
require_once(dirname(__DIR__) . "/ConfigurationClass.php");

class DatabaseManagement {
    private static $databaseManagement;
    private $connectionPDO;

    public static function getManagement(){
        if (!self::$databaseManagement) {
            self::$databaseManagement = new DatabaseManagement();
        }
    return self::$databaseManagement;
    }

    public function getConnectionPDO() {
        if (!$this->connectionPDO) {
            $cofiguration = ConfigurationClass::getConfiguration();

            $optionsPDO = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
            $this->connectionPDO = new PDO(
                $cofiguration['DATABASE_TYPE'] .
                ':host=' . $cofiguration['DATABASE_HOST'] .
                ';dbname=' . $cofiguration['DATABASE_NAME'],
                $cofiguration['DATABASE_USERNAME'],
                $cofiguration['DATABASE_PASSWORD'],
                $optionsPDO
            );
        }
    return $this->connectionPDO;
    }
}