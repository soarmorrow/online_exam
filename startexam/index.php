<?php
if (!isset($_REQUEST['type']) && empty($_REQUEST['type'])):
    die('direct access restricted');
endif;
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Test</title>
        <!-- Behavioral Meta Data -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Core Meta Data -->
        <meta name="author" content="">
        <meta name="description" content="Online Test">
        <meta name="keywords" content="Online test, test, exam">

        <!--Google fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Allerta' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <!--Stylesheet-->
        <link rel="stylesheet" href="../foundation/css/normalize.css">
        <link rel="stylesheet" href="../foundation/css/foundation.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../notify/src/main/resources/css/jquery.toastmessage.css">
        <link rel="stylesheet" href="../css/skins/line/green.css">
        <link rel="stylesheet" href="../css/skins/line/blue.css">
        <link rel="stylesheet" href="../css/TimeCircles.css">
        <link rel="stylesheet" href="../css/qastyle.css">
    </head>
    <body>
        <div id="overlay">
            <button type="button" class="button large success" id="startTest"> Start </button>
        </div>
        <header id="header">
            <div class="slide-menu-toggle">
                <span class="fa-stack fa-lg">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-bars fa-stack-1x fa-inverse"></i>
                </span>
            </div>
            <nav class="top-bar" data-topbar data-option="is_hover: false"> 
                <ul class="title-area"> 
                    <li class="name"> 
                        <h1><a href="#">Online Test</a></h1> 
                    </li> 
                    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li> 
                </ul> 
            </nav>
        </header>
        <section id="side-menu-list">
            <aside id="side-menu">
            </aside>
        </section>
        <div class="row">
            <div class="small-4 small-offset-8 medium-4 medium-8 large-4 large-offset-8 column">
                <div class="timer-wrapper">
                    <section id="timer">
                        <div class="DateCountdown" data-timer="1800"></div>
                    </section>
                    <section id="timeup">
                        <div data-alert class="alert-box alert round">
                            Time Up
                        </div>
                    </section>
                </div>
                <input type="hidden" value="<?= $_REQUEST['type'] ?>" id="type">
            </div>
        </div>
        <div class="row">
            <div class="small-10 small-centered medium-10 medium-centered large-10 large-centered column" role="main-container" id="wrapper">
                <div id="mask"></div>
                <section id="qa-container" class="disabled">
                    <aside id="qa-wrapper">
                        <!--Question container-->
                    </aside>
                </section>
                <a class="button qa-prev round" href="#prev"><i class="fa fa-arrow-circle-left"> </i> back</a>
                <a class="button qa-next success round" href="#next"> next <i class="fa fa-arrow-circle-right"> </i></a>
            </div>
        </div>
        <div id="progress">
            <script type="text/template" id="progress-template">
                <div class="progress medium-12 success"> 
                <span class="meter" style="width: <%= progress %>%"><%= progress %>%</span>
                </div>
            </script>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="../foundation/js/foundation.min.js"></script>
        <script src="../foundation/js/foundation/foundation.tooltip.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone-localstorage.js/1.0/backbone.localStorage-min.js" type="text/javascript"></script>  
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="../notify/src/main/javascript/jquery.toastmessage.js"></script>
        <script src="../js/TimeCircles.js"></script>
        <script src="../foundation/js/vendor/placeholder.js"></script>
        <script src="../foundation/js/vendor/fastclick.js"></script>
        <script src="../js/jquery.nicescroll.min.js"></script>
        <script src="../js/modernizr-latest.js"></script>
        <script src="../js/prefixfree.js"></script>
        <script src="../js/icheck.min.js"></script>
        <script src="../js/json2.js"></script>
        <script src="../js/fastclick.js"></script>
        <script src="../js/qascript.js"></script>
    </body>
</html>
