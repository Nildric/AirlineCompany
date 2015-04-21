<?php
session_start();
require_once("../model/DatabaseManagement.php");

class RegistrationController {
    public static function handleRegistration() {
        $_SESSION['registerName'] = $_POST['registerName'];
        $_SESSION['registerSurname'] = $_POST['registerSurname'];
        $userName = ($_POST['registerSurname'] . "." . $_POST['registerName']);
        
        $_SESSION['registerPassword'] = $_POST['registerPassword'];
        $_SESSION['isEmployee'] = (isset($_POST['isEmployee']) ? true : false);

        $databaseConnection = DatabaseManagement::getManagement()->getConnectionPDO();

        $bSuccess = true;
        if ($_SESSION['isEmployee']) {
        		try
        		{
	            $toDoQuery = <<<END
	                SELECT *
	                    FROM `user`
	                    WHERE `user`.`username` = :username AND `user`.`password` = :password
END;
	            $statement = $databaseConnection->prepare($toDoQuery);
	            
	            if(!$statement->execute(array(':username' => $_SESSION['inputUsername'], ':password' => $_SESSION['inputPassword'])))
	            {
	            	$bSuccess = false;
	            }
	            
	            $executive = $statement->fetchAll();
	            
	            $executive = $executive[0];
	
	            $toDoQuery = <<<END
	                INSERT INTO user(`id`, `username`, `password`, `id_funzionario`, `is_primo_accesso`)
	                    VALUES (DEFAULT, :username, :password, :executive, 1)
END;
	            $statement = $databaseConnection->prepare($toDoQuery);
	            if(!$statement->execute(array(':username' => $userName, ':password' => $_SESSION['registerPassword'], ':executive' => $executive['id'])))
	            {
	            	$bSuccess = false;
	            }
        		}
        		catch(Exception $ex)
        		{
        			$bSuccess = false;
        		}
        } else {
            $toDoQuery = <<<END
                SHOW TABLE STATUS LIKE :table
END;
            $statement = $databaseConnection->prepare($toDoQuery);
            if(!$statement->execute(array(':table' => "user")))
            {
            	$bSuccess = false;
            }
            
            $autoIncrement = $statement->fetchAll();
            $autoIncrement = $autoIncrement[0]['Auto_increment'];

            $toDoQuery = <<<END
                INSERT INTO user(id, username, password, id_funzionario, is_primo_accesso)
                    VALUES (NULL, :username, :password, :executive, 1)
END;
            $statement = $databaseConnection->prepare($toDoQuery);
            if(!$statement->execute(array(':username' => $userName, ':password' => $_SESSION['registerPassword'], ':executive' => $autoIncrement)))
            {
            	$bSuccess = false;
            }
        }
        
        if($bSuccess && isset($userName) && !empty($userName))
        {
        	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AirportCompany/application/view/RenderRegistration.php?success=1&register_username=" . urlencode($userName));
        }
        else
        {
        	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/AirportCompany/application/view/RenderRegistration.php?success=0");
        }
    }
}

RegistrationController::handleRegistration();