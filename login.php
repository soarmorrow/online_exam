<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Test :: Login</title>
        <!-- Behavioral Meta Data -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Core Meta Data -->
        <meta name="author" content="Iminentech Innovatives">
        <meta name="description" content="Online Test">
        <meta name="keywords" content="Online test, test, exam">

        <!--Google fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <!--Stylesheet-->
        <link rel="stylesheet" href="foundation/css/normalize.css">
        <link rel="stylesheet" href="foundation/css/foundation.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/qastyle.css">
    </head>
    <body class="login">
        <div class="row">
            <div class="small-8 small-centered medium-5 medium-centered large-4 large-centered column login-title">
                <h1>Sign in</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="small-8 small-centered medium-5 medium-centered large-4 large-centered column login-form" role="main-container">
                <form action="/login/" method="post" data-abide>
                    <div class="row collapse">
                        <div class="small-3 large-2 columns">
                            <label for="username"><span class="prefix"><i class="fa fa-user"></i></span></label>
                        </div>
                        <div class="small-9 large-10 columns">
                            <input type="text" placeholder="username" name="username" id="username" required pattern="[a-zA-Z0-9]+">
                            <small class="error">Name is required and must be valid.</small>
                        </div>
                    </div>
                    <div class="row collapse">
                        <div class="small-3 large-2 columns">
                            <label for="password"><span class="prefix"><i class="fa fa-key"></i></span></label>
                        </div>
                        <div class="small-9 large-10 columns">
                            <input type="password" placeholder="password" name="password" id="password" required >
                            <small class="error">Password is required and must be valid.</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 large-12 columns">
                            <button type="submit" class="button expand">login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="foundation/js/foundation.min.js"></script>
        <script src="js/modernizr-latest.js"></script>
        <script src="js/prefixfree.js"></script>
        <script>
            $(function() {
                $(document).foundation();
            });
        </script>
    </body>
</html>
