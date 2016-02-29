<html>
<head> <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">


    <title>Zalogowanie</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!--jQuery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>




</head>







<style>

    /* Space out content a bit */
    body {
        /*padding-top: 20px; odstęp od góry*/
        padding-bottom: 20px;
    }

    /* Everything but the jumbotron gets side spacing for mobile first views */
    .header,
    .marketing,
    .footer {
        padding-right: 15px;
        padding-left: 15px;
    }

    /*!* Custom page header *!*/
    /*.header {*/
        /*padding-bottom: 20px;*/
        /*border-bottom: 1px solid #e5e5e5;*/
    /*}*/
    /* Make the masthead heading the same height as the navigation */
    .header h3 {
        margin-top: 0;
        margin-bottom: 0;
        line-height: 40px;
    }

    /* Custom page footer */
    .footer {
        padding-top: 19px;
        color: #777;
        border-top: 1px solid #e5e5e5;
    }

    /* Customize container */
    @media (min-width: 768px) {
        .container {
            max-width: 730px;
        }
    }
    .container-narrow > hr {
        margin: 30px 0;
    }

     Main marketing message and sign up button
    .jumbotron {
        margin-top: 200px;
        text-align: center;
        border-bottom: 1px solid #e5e5e5;
    }
    /*.jumbotron .btn {*/
        /*padding: 14px 24px;*/
        /*font-size: 21px;*/
    /*}*/

    /* Supporting marketing content */
    .marketing {
        margin: 40px 0;
    }
    .marketing p + h4 {
        margin-top: 28px;
    }

    /* Responsive: Portrait tablets and up */
    @media screen and (min-width: 768px) {
        /* Remove the padding we set earlier */
        .header,
        .marketing,
        .footer {
            padding-right: 0;
            padding-left: 0;
        }
        /* Space out the masthead */
        .header {
            margin-bottom: 30px;
        }
        /* Remove the bottom border on the jumbotron for visual effect */
        .jumbotron {
            border-bottom: 0;
        }

        /*dopisuje swoje*/

        .navbar {

            font-family: 'Titillium Web',sans-serif;
            font-size: .9em;
            font-weight: 500;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            width: 100%;
            height: 70px;
            background-color: #FFF;
        }

        #obrazek {
            border-style: solid;
            border-color: red;

        }
        img {
            background: #3A6F9A;
            vertical-align: middle;
            max-width: 575px;
        }

        #menu_other li{
            display: inline;
            list-style-type: none ;
        }

        #opis {
            text-align: center;
        }

        .container {
            padding-top: 100px;
        }

        #footer {
            padding-top: 10px;
            text-align: center;
        }



    }





</style>
<body>

<?php

session_save_path('session/');
session_start();

echo $_SESSION['ip'];


?>


<nav class="navbar navbar-default">

    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="?page=o_nas">O nas <span class="sr-only">(current)</span></a></li>
                <li><a href="?page=image">Obrazek testowy</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="?page=forwarding"><button type="button" class="btn btn-default btn-xs">
                            Dodaj obrazek <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        </button></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
</div>
<!--koniec nawigacji-->


<div class="container">

<!--    <div class="jumbotron">-->
        <?php

        echo $_SESSION['ip'];
        if(isset($_GET['page'])) {

            require_once 'pages/' . $_GET['page'] . ".php";
        }
        else {
            require_once 'pages/' . $_GET['page'] . 'display_image.php';
        }

        ?>
<!--    </div>-->




<!---->
<!--    <div class="jumbotron">-->
<!--        <h1>Jumbotron heading</h1>-->
<!--        <p class="lead">Cras justo odio, dapibusas justo odio, dapibus ac facilisis in, egestas as justo odio, dapibus ac facilisis in, egestas as justo odio, dapibus ac facilisis in, egestas as justo odio, dapibus ac facilisis in, egestas  ac facilisis in, egestas eget quam. Fusce dapibus,dssssssssssssssssssssssssssss-->
<!--            Cras justo odio, dapibusas justo odio, dapibus ac facilisis in, egestas as justo odio, dapibus ac facilisis in, egestas as justo odio, dapibus ac facilisis in, egestas as justo odio, dapibus ac facilisis in, egestas  ac facilisis in, egestas eget quam. Fusce dapibus,dssssssssssssssssssssssssssss-->
<!--            tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>-->
<!--        <p><a class="btn btn-lg btn-success" href="http://getbootstrap.com/examples/jumbotron-narrow/#" role="button">Sign up today</a></p>-->
<!--    </div>-->


</div>
<!--koniec jumbotrona-->





<footer class="footer">
    <div class="container" id="footer">
        <p class="text-muted">Wszelkie demotywatory w serwisie są generowane przez Użytkowników serwisu i jego Właściciel nie bierze za nie odpowiedzialności.</p>

    </div>
</footer>


</body>

</html>
