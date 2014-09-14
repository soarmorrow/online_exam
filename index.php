<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Test :: choose you stream</title>
        <!-- Behavioral Meta Data -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Core Meta Data -->
        <meta name="author" content="Iminentech Innovatives">
        <meta name="description" content="Online Test">
        <meta name="keywords" content="Online test, test, exam">

        <!--Google fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Allerta' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <!--Stylesheet-->
        <link rel="stylesheet" href="foundation/css/normalize.css">
        <link rel="stylesheet" href="foundation/css/foundation.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/qastyle.css">
        <link rel="stylesheet" href="css/selector.css">
    </head>
    <body>
        <header id="header">
            <nav class="top-bar" data-topbar data-option="is_hover: false"> 
                <ul class="title-area"> 
                    <li class="name"> 
                        <h1><a href="#">Online Test</a></h1> 
                    </li> 
                    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li> 
                </ul> 
            </nav>
        </header>
        <div class="row" id="selectort-wrapper">
            <div class="small-10 small-centered medium-10 medium-centered large-10 large-centered column" role="main-container" id="wrapper">
                <section id="stream-selection">
                    <h1>Select type</h1>
                    <aside id="select-type">
                        <form action="startexam/" method="post">
                            <div class="row collapse">
                                <div class="small-9 large-10 columns">
                                    <select class="type" name="type" required="required">
                                    </select>
                                </div>
                                <div class="small-3 large-2 columns">
                                    <button type="submit" class="button postfix">Go</button>
                                </div>
                            </div>
                        </form>
                    </aside>
                </section>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="foundation/js/foundation.min.js"></script>
        <script src="foundation/js/foundation/foundation.tooltip.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone-localstorage.js/1.0/backbone.localStorage-min.js" type="text/javascript"></script>  
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="foundation/js/vendor/placeholder.js"></script>
        <script src="foundation/js/vendor/fastclick.js"></script>
        <script src="js/modernizr-latest.js"></script>
        <script src="js/prefixfree.js"></script>
        <script src="js/selectStream.js"></script>
    </body>
</html>
