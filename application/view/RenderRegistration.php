<?php session_start(); ?>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="../../css/roboto.min.css" rel="stylesheet">
    <link href="../../css/material.min.css" rel="stylesheet">
    <link href="../../css/ripples.min.css" rel="stylesheet">
</head>

<body>

<!-- Registration Init -->

<div class="container">
    <br>

    <div class="row">
        <div class="well">
            <h1 align="center">Registration</h1>

            <?php
            	if(isset($_GET['success']))
            	{
            		if($_GET['success'])
            		{
            			echo "<div class=\"alert alert-dismissable alert-success\">
				            			<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
				            			<strong>Success!</strong> The user \"{$_GET['register_username']}\" has been registered.
				            		</div>";
            		}
            		else
            		{
            			echo "<div class=\"alert alert-dismissable alert-danger\">
				            			<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
				            			<strong>Warning!</strong> Could not register the user.
            						</div>";
            		}
            	} 
            ?>
            <fieldset>
                <form class="form-horizontal" action="../controller/RegistrationController.php" method="post">

                    <div class="col-lg-10">
                        <input type="text" class="form-control input-lg floating-label" id="registerName" name="registerName" placeholder="Name" required>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-10">
                        <input type="text" class="form-control input-lg floating-label" id="registerSurname" name="registerSurname" placeholder="Surname" required>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-10">
                        <input type="password" class="form-control input-lg floating-label" id="registerPassword" name="registerPassword" placeholder="Password" required>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-10">
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox" id="isEmployee" name="isEmployee" checked>
                                <span class="toogle"></span>
                                isEmployee
                            </label>

                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-10 col-offset-2">
                        <button class="btn btn-default btn-raised">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-raised">Submit</button>
                    </div>

                </form>
            </fieldset>
        </div>
    </div>
</div>

<!-- Registration End -->

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="../../js/ripples.min.js"></script>
<script src="../../js/material.min.js"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>

</body>

</html>
