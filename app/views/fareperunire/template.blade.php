<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Fabio Alessandro Locati">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/datepicker.css') }}" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-40403885-1', 'fareinrete.it');
            ga('send', 'pageview');
        </script>
        <link href='http://fonts.googleapis.com/css?family=Autour+One' rel='stylesheet' type='text/css'>
        <style>
            div#header {
                background: #FFFFFF;
            }
            div#header div#top {
                height: 30px;
                background: #B3B3B3;
                text-align: center;
                font-size: 39px;
                padding-top: 10px;
                font-weight: bold;
                color: #FFFFFF;
            }
            div#header div#topleft {
                position: absolute;
                top: 5px;
                left: 10px;
            }
            div#header div#topright {
                position: absolute;
                top: 10px;
                right: 10px;
            }
            div#header div#middle {
                top: 70px;
                position: absolute;
                width: 100%;
                text-align: center;
                font-size: 70px;
                font-weight: bold;
                color: #c90c0f;
            }
            div#header div#slogan {
                position: absolute;
                top: 110px;
                width: 100%;
                text-align: center;
                font-size: 16px;
                font-weight: bold;
                font-family: 'Autour One', cursive;
            }
            div.container {
                margin-top:100px;
            }
        </style>
    </head>
  <body>
    <div id="wrapper">
        <div id="header">
            <div id="top">FARE PER UNIRE</div>
            <div id="topright"><img src="{{ URL::asset('images/topright.png') }}"></div>
            <div id="topleft"><img src="{{ URL::asset('images/fare.png') }}"></div>
            <div id="middle">AVANTI TUTTI!</div>
            <div id="slogan">Partecipa al programma dei Comitati</div>
        </div>
        <div class="container">
            @if(Session::has('flash_activation'))
                <div class="alert alert-warning">{{ Session::get('flash_activation') }}</div>
            @endif
            @if(Session::has('flash_document'))
                <div class="alert alert-warning">{{ Session::get('flash_document') }}</div>
            @endif
            @if(Session::has('flash_notice'))
                <div class="alert alert-success">{{ Session::get('flash_notice') }}</div>
            @endif
            @yield('content')
        </div> <!-- /container -->
        <div id="footer">
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                    <td width="20%" style="vertical-align:middle"><img src="{{ URL::asset('images/footer_logo.png') }}" alt="Fermare il Declino" width="122" height="60" border="0"></td>
                    <td width="15%"><a title="" href="http://fareinrete.it/chi-siamo" target="_blank">CHI SIAMO</a></td>
                    <td width="25%"><a title="" href="http://fareinrete.it/manifesto-2" target="_blank">IL NOSTRO MANIFESTO</a></td>
                    <td width="20%"><a title="" href="" target="_blank"></a><a title="" href="http://fareinrete.it/le-10-proposte/" target="">PROPOSTE</a></td>
                    <td width="20%"><a title="" href="" target="_blank"><a href="mailto:aiuto@fare2.it">E-MAIL</a></td>
                </tr>
            </table>
        </div>
    </div>
  </body>
</html>
