<?php

/**
 * place abacus script in site footer
 * @author <a href = mailto:christo@synthasite.com>Christo Crampton</a>
 * @return void
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_TRACKING($params, & $smarty) {

    $system = $smarty->get_template_vars("system");
    $uniproperties  = $smarty->get_template_vars("uniproperties");
    $tracking = $uniproperties['tracking'];
    $systemMode = $system["mode"];
    $abacusUrl = $system["abacusURL"];
    $string="";

    $customTrackingBought  = $system['purchased']['custom_tracking']['enabled'];

    if(!isset($_REQUEST["safeMode"]) || $_REQUEST["safeMode"] != 'true'){

        if($customTrackingBought && !empty($tracking['footer'])){
            $string .=
                "\n" . '<!-- Start of user defined footer tracking codes -->' .
                "\n" . $tracking['footer'] .
                "\n" . '<!-- End of user defined footer tracking codes -->' . "\n";
        }

    }

    // design time new text widget support
    // this needs to be loaded last to avoid jquery conflicts
    if(_SYSTEM_MODE == 'DESIGN'){
        $string .=
            "\n" . '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>' .
            "\n" . '<script type="text/javascript" src="/components/bower_components/jquery-minicolors/jquery.minicolors.min.js"></script>' .
            "\n" . '<link rel="stylesheet" type="text/css" href="/components/bower_components/jquery-minicolors/jquery.minicolors.css" />' .
            "\n" . '<script type="text/javascript" src="/components/bower_components/tinymce4/js/tinymce/tinymce.min.js"></script>' .
            "\n" . '<script type="text/javascript" src="/components/bower_components/tinymce4/js/tinymce/jquery.tinymce.min.js"></script>' .
            "\n" . '<script type="text/javascript" src="/ide/page/controls/text/plugins/minicolor_picker/minicolor_picker.js"></script>';
    }

    //only show yola tracking code at runtime
    if($systemMode != 'RUN'){

        return $string;
    }

    $siteId = $system["site"]["id"];

    if($abacusUrl != ""){

        /*$string .= '<script src="' . $abacusUrl . '" type="text/javascript"></script>
        <script type="text/javascript">
            var siteId="'.$siteId.'";
            try{Tracker();}catch(err){}
        </script>';*/

        $string .= '<script type="text/javascript">
            var _yts = _yts || [];
            _yts.push(["_siteId", "'.$siteId.'"]);
            _yts.push(["_trackPageview"]);
            (function() {
                var yts = document.createElement("script");
                yts.type = "text/javascript";
                yts.async = true;
                yts.src = "' . $abacusUrl . '";
                (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(yts);
            })();
        </script>';

    }
    
    $string .= "\n" . '<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.3/fastclick.min.js"></script>';

    $string .= '<script type="text/javascript">
                  window.addEventListener("load", function() {
                    FastClick.attach(document.body);
                  }, false);
                </script>';

    $string .= '<!-- Start Quantcast tag -->
    <script type="text/javascript" src="//edge.quantserve.com/quant.js"></script>
    <script type="text/javascript">_qacct="p-b8x17GqsQ_656";quantserve();</script>
    <noscript>
        <a href="http://www.quantcast.com/p-b8x17GqsQ_656" target="_blank"><img src="//pixel.quantserve.com/pixel/p-b8x17GqsQ_656.gif" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/></a>
    </noscript>
    <!-- End Quantcast tag -->';

    if(!empty($tracking['gaid']) && $tracking['gaid'] != ''){
        $string .=
            "\n" . '<!-- Start of Google Analytics code configured in the Site Settings dialog -->' .
            "\n" . "<script type='text/javascript'>" .
                "\n" . "var _gaq = _gaq || [];" .
                "\n" . "_gaq.push(['_setAccount', '" . $tracking['gaid'] . "']);" .
                "\n" . "_gaq.push(['_trackPageview']);" .
                "\n" . "(function(){" .
                    "\n" . "var ga = document.createElement('script');" .
                    "\n" . "ga.type = 'text/javascript';" .
                    "\n" . "ga.async = true;" .
                    "\n" . "ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';" .
                    "\n" . "var s = document.getElementsByTagName('script')[0];" .
                    "\n" . "s.parentNode.insertBefore(ga, s);" .
                "\n" . "})();" .
            "\n" . "</script>" .
            "\n" . '<!-- End of Google Analytics code configured in the Site Settings dialog -->';
    }

    return $string;

}

?>
