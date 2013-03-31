<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Fabio Alessandro Locati">
        <link href="style.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </style>
  </head>
  <body>
    <div id="wrapper">
        <div id="header">
            <p><img src="header_960.gif" width="960" height="140"></p>
        </div>
        <div class="container">
            @yield('content')
        </div> <!-- /container -->
        <div id="footer">
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                    <td width="20%" style="vertical-align:middle"><img src="footer_logo.png" alt="Fermare il Declino" width="122" height="60" border="0"></td>
                    <td width="15%"><a title="" href="http://www.fermareildeclino.it/cambiare-la-politica-fermare-il-declino-tornare-a-crescere" target="_blank">CHI SIAMO</a></td>
                    <td width="25%"><a title="" href="http://www.fermareildeclino.it/cambiare-la-politica-fermare-il-declino-tornare-a-crescere" target="_blank">IL NOSTRO MANIFESTO</a></td>
                    <td width="20%"><a title="" href="http://www.fermareildeclino.it/adesioni" target="_blank">I PRIMI FIRMATARI</a></td>
                    <td width="20%"><a title="" href="http://www.fermareildeclino.it/tutti-gli-aderenti" target="_blank">TUTTI GLI ADERENTI</a></td>
                </tr>
                <tr>
                    <td style="vertical-align:bottom" colspan="3">Copyright © Fare per Fermare il Declino - tutti i diritti riservati. CF 08056960969</td>
                    <td colspan="2" style="vertical-align:bottom;text-align:right"><a href="mailto:circolo@faremilano.it"></a></td>
                </tr>
            </table>
        </div>
    </div>
  </body>
</html>
