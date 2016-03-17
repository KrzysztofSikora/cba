<html>
<head>
    <!--    administrator komentarzy z facebooka-->
    <meta property="fb:admins" content="100005557807089"/>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  <!--- kodowanie polskich znaków -->
    <!---->
    <!--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <!--    <link rel="stylesheet" href="custom.css">-->
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!--    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <!--    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">-->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    -->
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

</head>

<body>
<!--skrypt obsługujący komentarze facebook-->
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.5&appId=1776971415858954";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<!--skrypt obsługujący like button-->

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1776971415858954";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <ul class="nav nav-pills">
            <!--            <li role="presentation" class="active"><a href="#">Home</a></li>-->


            <li role="presentation"><a href="?category=all">Wszystko</a></li>
            <li role="presentation"><a href="?category=top">Top</a></li>
            <li role="presentation"><a href="?category=technowinki">Technowinki</a></li>
            <li role="presentation"><a href="?category=natura">Natura</a></li>
            <li role="presentation"><a href="?category=nieporawni">Nieporawni</a></li>
            <li role="presentation"><a href="?category=inne">Inne</a></li>
            <!--            <li role="presentation"><a href="#">Messages</a></li>-->

            <li>
                <form class="navbar-form navbar-left" role="search" method="get" action="index_unknow.php">

                    <button type="submit" class="btn btn-default" name="category" value="search">Szukaj</button>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="w opisie" name="searchValue">
                    </div>
            </li>
            <li role="presentation"><a href="?category=rule">Regulamin</a></li>
        </ul>
        </form>
    </nav>
</div>


<div class="container" style="padding-top: 100px">
    <div class="row jumbotron">
        <div class="col-md-2">2</div>
        <div class="col-md-6"> </div>

        <div class="col-md-2">2</div>

    </div>
    <div class="row jumbotron">


    </div>
</div>

</body>
</html>
