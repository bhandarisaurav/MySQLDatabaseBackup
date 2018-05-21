<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>MySQL Backup</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet"/>
    <style>
        body {
            font-size: 20px;
        }
    </style>
</head>

<body class="login-page sidebar-collapse">
<div class="page-header" filter-color="orange">
    <div class="page-header-image" style="background-image:url(assets/img/login.jpg)"></div>
    <div class="container">
        <div class="col-md-4 content-center">
            <div class="card card-login card-plain">
                <form class="form" method="post" action="db_connect.php">
                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <img src="assets/img/now-logo.png" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                            <input type="text" placeholder="Username" class="form-control" name="username" autofocus required/>
                        </div>
                        <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                            <input type="text" placeholder="Password" class="form-control" name="password"/>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button class="btn btn-primary btn-round btn-lg btn-block">Create Connection</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>