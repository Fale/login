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
    </style>
  </head>
  <body>
    <div id="wrapper">
        <div id="header">
            <p><img src="{{ URL::asset('images/logo.png') }}" /></p>
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
                    <td width="15%"><a title="" href="http://www.fermareildeclino.it/cambiare-la-politica-fermare-il-declino-tornare-a-crescere" target="_blank">CHI SIAMO</a></td>
                    <td width="25%"><a title="" href="http://comitati.fareinrete.org/manifesto-2" target="_blank">IL NOSTRO MANIFESTO</a></td>
                    <td width="20%"><a title="" href="" target="_blank"></a><a title="" href="http://comitati.fareinrete.org/le-10-proposte/" target="">PROPOSTE</a></td>
                    <td width="20%"><a title="" href="" target="_blank"><a href="mailto:aiuto@fare2.it">E-MAIL</a></td>
                </tr>
            </table>
        </div>
    </div>
  </body>
</html>
