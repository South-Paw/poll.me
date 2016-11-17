<html ng-app="pollsApp">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>poll.me</title>
        <meta name="description" content="Polling website for SENG365 assignment 2" />
        <meta name="author" content="Alex Gabites" />

        <link rel="icon" type="image/x-icon" href="<?php echo base_url("public/favicon.ico"); ?>" />

        <link rel="stylesheet" media="screen" href="<?php echo base_url("public/css/bootstrap.superhero.min.css"); ?>" />
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
        <link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,400italic,900" />
        <link rel="stylesheet" media="screen" href="<?php echo base_url("public/css/app.css"); ?>" />

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div ng-view></div>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-route.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="<?php echo base_url("public/js/app.js"); ?>"></script>
        <script src="<?php echo base_url("public/js/controllers.js"); ?>"></script>
    </body>
</html>
