<?php
session_start();
require_once("../model/DatabaseManagement.php");

class FirstAccessController {
    public static function handleFirstAccess() {
        $_SESSION['inputNewPassword'] = $_POST['inputNewPassword'];
        $_SESSION['inputConfirmPassword'] = $_POST['inputConfirmPassword'];

        if ($_SESSION['inputNewPassword'] == $_SESSION['inputConfirmPassword']) {
            $databaseConnection = DatabaseManagement::getManagement()->getConnectionPDO();
            $toDoQuery = <<<END
                UPDATE user
                    SET user.password = :password, user.is_primo_accesso = 0
                    WHERE user.username = :username
END;
            $statement = $databaseConnection->prepare($toDoQuery);
            $statement->execute(array(':password' => $_SESSION['inputNewPassword'], ':username' => $_SESSION['inputUsername']));

            if ($_SESSION['isExecutive'] == 1) {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AirportCompany/application/view/RenderRegistration.php");
            } else {
                header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AirportCompany/application/view/RenderWelcome.php");
            }
        } else {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AirportCompany/application/view/RenderFirstAccess.php");
        }
    }
}

FirstAccessController::handleFirstAccess();