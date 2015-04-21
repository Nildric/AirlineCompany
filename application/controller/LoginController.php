<?php
session_start();

require_once("../model/DatabaseManagement.php");

class LoginController {
    public static function checkLogin() {
        $_SESSION['inputUsername'] = $_POST['inputUsername'];
        $_SESSION['inputPassword'] = $_POST['inputPassword'];

        $databaseConnection = DatabaseManagement::getManagement()->getConnectionPDO();
        $toDoQuery = <<<END
        	SELECT user.*
        		FROM user
        		WHERE user.username = :username AND user.password = :password
END;
        $statement = $databaseConnection->prepare($toDoQuery);
        $statement->execute(array(':username' => $_SESSION['inputUsername'], ':password' => $_SESSION['inputPassword']));
        $user = $statement->fetchAll();

        if (count($user) === 1) {
            $user = $user[0];
            if ($user['is_primo_accesso'] == 1) {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AirportCompany/application/view/RenderFirstAccess.php");
            } else {
                if ($user['id'] != $user['id_funzionario']) {
                    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AirportCompany/application/view/RenderWelcome.php");
                } else {
                    $_SESSION['isExecutive'] = 1;
                    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AirportCompany/application/view/RenderRegistration.php");
                }
            }
        } else {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AirportCompany/index.php");
        }
    }
}

LoginController::checkLogin();