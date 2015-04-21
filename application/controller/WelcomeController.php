<?php
session_start();
require_once("../model/DatabaseManagement.php");

class WelcomeController {
    public static function getExecutive() {
        $databaseConnection = DatabaseManagement::getManagement()->getConnectionPDO();
        $toDoQuery = <<<END
                SELECT user.*
                    FROM user
                    WHERE user.id = (
                        SELECT user.id_funzionario
                            FROM user
                            WHERE user.username = :username
                    )
END;
        $statement = $databaseConnection->prepare($toDoQuery);
        $statement->execute(array(':username' => $_SESSION['inputUsername']));
        $executive = $statement->fetchAll();
        $_SESSION['executiveUsername'] = $executive[0]['username'];
    }
}

WelcomeController::getExecutive();
