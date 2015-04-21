<?php
session_start();
require_once("../controller/WelcomeController.php");
?>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="../../css/roboto.min.css" rel="stylesheet">
    <link href="../../css/material.min.css" rel="stylesheet">
    <link href="../../css/ripples.min.css" rel="stylesheet">
</head>

<body>

<!-- Welcome Init -->

<div class="container">
    <br>

    <div class="row">
        <div class="well">
            <h1 align="center">Welcome <?php echo($_SESSION['inputUsername']); ?>, your Executive is <?php echo($_SESSION['executiveUsername']); ?>!</h1>
        </div>
    </div>
</div>

<!-- Welcome End -->

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
