<html>
<head> <meta http-equiv="content-type" content="text/html; charset=utf-8">
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
<body>
<div class="jumbotron">
    <div class="container">
        <div class="col-md-4">
            <?php
            if(isset($_GET['success']) && $_GET["success"] == 1) {
                echo "<div class='alert alert-success'>Pomyślnie zalogowano!</div>";}
            ?> <!-- pomyślnie zalogowano -->

            <ul class="nav nav-pills nav-stacked">
                <li <?php if($_GET['page'] == "dashboard" || empty($_GET['page'])) echo 'class="active"'; ?> >
                    <a href="?page=dashboard">Panel główny<span class="badge pull-right">1</span></a>

                </li>
                <li <?php if($_GET['page'] == "settings") echo "class='active'"; ?> >
                    <a href="?page=settings">Ustawienia<span class="badge pull-right">2</span></a>
                </li>
                <li <?php if($_GET['page'] == "przeglad2") echo "class='active'"; ?> >
                    <a href="?page=przeglad2">Przegląd<span class="badge pull-right">3</span></a>
                </li>
                <li <?php if($_GET['page'] == "koszyk") echo "class='active'"; ?> >
                    <a href="?page=koszyk">Koszyk<span class="badge pull-right">4</span></a>
                </li>



                <li>
                    <a href="?page=logout">Wyloguj<span class="badge pull-right">3</span></a>
                </li>
            </ul>





        </div>

        <div class="col-md-8">
            <?php


            if(isset($_GET['page'])) {

                require_once 'pages/' . $_GET['page'] . ".php";
            }
            else {
                require_once 'pages/' . 'dashboard.php';
            }
            ?>


        </div>
    </div>
</div>







</body>
</html>
