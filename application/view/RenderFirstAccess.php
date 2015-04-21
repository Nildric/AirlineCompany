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

<!-- FirstAccess Init -->

<div class="container">
    <br>

    <div class="row">
        <div class="well">
            <h1 align="center">Change Password</h1>

            <fieldset>
                <form class="form-horizontal" action="../controller/FirstAccessController.php" method="post">

                    <div class="col-lg-10">
                        <input type="password" class="form-control input-lg floating-label" id="inputNewPassword" name="inputNewPassword" placeholder="New Password" required>
                    </div>
                    <br>
                    <div class="col-lg-10">
                        <input type="password" class="form-control input-lg floating-label" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="New Password Confirm" required>
                    </div>
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

<!-- FirstAccess End -->

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
