<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        {{ HTML::style('css/bootstrap.min.css') }}
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        {{ HTML::style('css/bootstrap-responsive.min.css') }}
        {{ HTML::style('css/redmond/jquery-ui-1.10.3.custom.min.css') }}
        {{ HTML::style('css/style.css') }}

        {{ HTML::script('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    {{ link_to('dashboard', 'MyDingus', array('class' => 'brand')) }}
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>

                        <?php if(Auth::check()) { ?>

                            {{ link_to('account/logout', 'Logout', array('style' => 'float: right; margin: 10px 20px 0px 0px;')) }}

                        <?php } else { ?>

                            <form class="navbar-form pull-right" action="{{ URL::to('account/login') }}" method="post">
                                <input class="span2" type="text" placeholder="Email" name="email">
                                <input class="span2" type="password" placeholder="Password" name="password">
                                <button type="submit" class="btn">Sign in</button>
                            </form>

                        <?php } ?>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">


            @yield('content')


                        <hr>

            <footer>
                <p>&copy; MyDingus 2013</p>
            </footer>

        </div> <!-- /container -->
        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        {{ HTML::script('js/vendor/bootstrap.min.js') }}
        {{ HTML::script('js/vendor/jquery-ui-1.10.3.custom.min.js') }}
        {{ HTML::script('js/main.js') }}

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>