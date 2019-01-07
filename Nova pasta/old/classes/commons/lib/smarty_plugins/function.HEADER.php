<?php
require_once(_ENV_COMMONS_CLASSPATH . "includes/Common.functions.php");
require_once(_ENV_COMMONS_CLASSPATH . 'lib/smarty_plugins/modifier.anticache.php');

/**
 * Construct HTML Header Chunk
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_HEADER($params, & $smarty) {

    $headString     = "";
    $system         = $smarty->get_template_vars("system");
    $uniproperties  = $smarty->get_template_vars("uniproperties");
    $page           = $system['page'];
    $pageType       = $system['page']['type'];
    $meta           = $uniproperties['meta'];
    $tracking       = $uniproperties['tracking'];
    $css            = $uniproperties['css'];
    $pageContext    = $smarty->get_template_vars('pageContext');
    $blogPostTitle  = $pageContext->getPublishedProperty('blogPostTitle');
    $pageProperties = $smarty->get_template_vars("properties");
    $includeString  = '';

    $styleName;

    if (_MOBILE) {
        $styleName = $system['template']['mobile']['name'];
    } else if (_FACEBOOK) {
        $styleName = 'Facebook';
    } else {
        $styleName = $system['template']['name'];
    }

    $pageType = strtolower($system['page']['type']);

    if ($pageType == 'blog' || $pageType == 'news') {
        $base_url = getBaseURI();
    }

    /*
     * ------------------- Includes ------------------------ */

    //Include dynamic css
    foreach ($pageProperties['masterComponentList'] as $component) {
        if ($component->componentProperties['sys_hasDynamicCSS']) {
            $includeString .= "\n\t\t" . '/* CSS for ' . $component->className . ' component (' . $component->componentProperties['id'] . ') */';
            $includeString .= "\n\t\t" ."\n\t\t<style type=\"text/css\">\n";
            $includeString .= $smarty->fetch($component->template_dir . DIRECTORY_SEPARATOR . $component->styleName . '.css.tpl');
            $includeString .= "\n\t\t</style>"."\n";
        }
    }

    //Include static component CSS
    foreach ($pageProperties['includes'] as $include) {
        $includeString .= "\n\t\t" . '<link rel="stylesheet" type="text/css" href="' . smarty_modifier_anticache($include) . '" />'."\n";
    }


    $includeString .= "\n\t\t" . '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
    $includeString .= "\n\t\t" . '<script type="text/javascript">window.jQuery || document.write(\'<script src="'.smarty_modifier_anticache('/components/bower_components/jquery/dist/jquery.js').'"><\/script>\')</script>';

    $includeString .= "\n\t\t" . '<link rel="stylesheet" type="text/css" href="' . smarty_modifier_anticache('classes/commons/resources/flyoutmenu/flyoutmenu.css') . '" />';
    $includeString .= "\n\t\t" . '<script type="text/javascript" src="'.smarty_modifier_anticache('classes/commons/resources/flyoutmenu/flyoutmenu.js').'"></script>';

    $includeString .= "\n\t\t" . '<link rel="stylesheet" type="text/css" href="' . smarty_modifier_anticache('classes/commons/resources/global/global.css') . '" />';

    //Include global component resources
    if (array_key_exists('componentResources', $pageProperties)) {
        foreach ($pageProperties['componentResources'] as $componentResource) {
            //0 = ALL, 1 =  DESIGN, 2 = RUN;
            $runLevel = $componentResource['runLevel'];
            $useResource = false;

            if ($runLevel == 0) {
                $useResource = true;
            } else if ($runLevel == 1 && _SYSTEM_MODE == 'DESIGN') {
                $useResource = true;
            } else if ($runLevel == 2 && _SYSTEM_MODE != 'DESIGN') {
                $useResource = true;
            }

            if ($useResource) {
                // 0 = CSS 1 = JS
                if ($componentResource['type'] == 0) {
                    $includeString .= "\n\t\t" . '<link rel="stylesheet" type="text/css" href="' . smarty_modifier_anticache($componentResource['resource']) . '" />';
                } else if ($componentResource['type'] == 1) {
                    $includeString .= "\n\t\t" . '<script type="text/javascript" language="javascript" src="' . smarty_modifier_anticache($componentResource['resource']) . '" ></script>';
                }
            }
        }
    }

    /* ------------------- Head Tags ------------------------ */

    //note, as of: 5 Dec 2008, google requires verification code to be first meta tag
    if ($page['name'] == 'index.php' && $meta['googleWebmaster'] != '') {
        $headString .= "\t\t" . '<meta name="google-site-verification" content="'.htmlspecialchars($meta['googleWebmaster']).'" />';
        $headString .= "\n\t\t" . '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
    } else {
        $headString .= "\t\t" . '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
    }


    $pageTitle = htmlspecialchars($uniproperties['title']['text']);

    if (!empty($blogPostTitle)) {
        $pageTitle = htmlspecialchars($blogPostTitle);
    }

    //<base> is required to come before any tag referencing an external source
    if (isset($base_url)) {
        $headString .= "\n\t\t" . '<base href="' . $base_url. '" />';
    }

    $page_has_ecwid_store = false;
    foreach ($pageProperties['masterComponentList'] as $component) {
        if ($component->getComponentProperty('sys_className') == 'Ecwid_Ecommerce_Default') {
            $page_has_ecwid_store = true;
            break;
        }
    }
    if ($page_has_ecwid_store) {
        if (!isset($_GET['_escaped_fragment_'])) {
            $headString .= "\n\t\t" . '<meta name="fragment" content="!" />';
        } else {
            if (!defined('_ENV_PROJECT_BASE')) {
                define('_ENV_PROJECT_BASE', dirName($_SERVER['SCRIPT_FILENAME']));
            }
            require_once(_ENV_PROJECT_BASE . '/classes/commons/lib/ecwid/indexing.php');
            global $systemProperties;
            $ecwid_store_id = $systemProperties['system']['purchased']['ecommerce']['storeId'];
            $development = strpos($systemProperties['system']['ecwid_api_url'], 'appdev.ecwid.com') !== false;
            $store_indexing = new StoreIndexing($ecwid_store_id, $development);
            $ecwid_dict = $store_indexing->ecwid_generate_indexing_dict();
            $ecwid_description = $ecwid_dict['description'];
            $ecwid_title = $ecwid_dict['title'];
            if (!empty($ecwid_description)) {
                $meta['description'] = htmlspecialchars($ecwid_description);
            }
            if (!empty($ecwid_title)) {
                $pageTitle = htmlspecialchars($ecwid_title);
            }
        }

        $headString .= "\n\t\t" .
            '<link rel="dns-prefetch" href="//images-cdn.ecwid.com/">';
        $headString .= "\n\t\t" .
            '<link rel="dns-prefetch" href="//images.ecwid.com/">';

        $dev_suffix = $development ? 'dev' : '';
        $headString .= "\n\t\t" .
            '<link rel="dns-prefetch" href="//app' . $dev_suffix . '.ecwid.com/">';
    }

    $headString .= "\n\t\t" . '<title>' . $pageTitle . '</title>';

    //add RSS meta tag:
    if($pageType == 'blog' || $pageType == 'news') {
        $headString .= "\n\t\t<link rel=\"alternate\" type=\"application/rss+xml\" title=\"" . $pageTitle . " RSS feed\" href=\"" . substr($system['page']['name'],0,strlen($system['page']['name'])-4) . ".rss\" />";
    }

    $headString .= "\n\t\t" . '<meta name="description" content="'.htmlspecialchars($meta['description']).'" />' . "\n\t\t". '<meta name="keywords" content="'.htmlspecialchars($meta['keywords']).'" />';

    if ($meta['favicon'] != ''){
        $headString .= "\n\t\t" . '<link href="'.htmlspecialchars($meta['favicon']).'" rel="shortcut icon" type="image/x-icon" />';
        $headString .= "\n\t\t" . '<link href="'.htmlspecialchars($meta['favicon']).'" rel="icon" type="image/x-icon" />';
    }

    $customTrackingBought  = $system['purchased']['custom_tracking']['enabled'];

    if (!isset($_REQUEST["safeMode"]) || $_REQUEST["safeMode"] != 'true') {
        if ($customTrackingBought && !empty($tracking['header'])) {
            $headString .=
                "\n\t\t" . '<!-- Start of user defined header tracking codes -->' .
                "\n\t\t" . $tracking['header'] .
                "\n\t\t" . '<!-- End of user defined header tracking codes -->';
        }
    }

    $cssOverridesBought  = $system['purchased']['css_overrides']['enabled'];

    // enabled == null defaults to true
    if(!($cssOverridesBought) || $css['style-enabled'] !== 'false') {
        $headString .=
            "\n\t\t<style type=\"text/css\" id=\"styleCSS\">\n" .
            $smarty->fetch('templates/' . $styleName . '/style.css') .
            "\n\t\t</style>";
    } else {
        if(_SYSTEM_MODE == 'SOURCE_PREVIEW') {
            $headString .=
                "\n<style type=\"text/css\" id=\"styleCSS\">/*" .
                $smarty->fetch('templates/' . $styleName . '/style.css') .
                "*/</style>";
        }
    }

    $headString .= "<script src='//ajax.googleapis.com/ajax/libs/webfont/1.4.2/webfont.js' type='text/javascript'></script>";

    // style_designer.enabled is only false if the value is explicitly false
    // this is due to the site migration logic forcing a false value, whereas the
    // other possible values are null or true, both of which are considered enabled
    $style_designer_enabled = $uniproperties['style_designer']['enabled'];
    $style_designer_enabled = ($style_designer_enabled == "false" ? false : true);
    if($style_designer_enabled  && !_MOBILE && !_FACEBOOK){
        $google_font_prop = $uniproperties['site']['google_fonts'];
        if (!is_null($google_font_prop)) {
            $google_fonts_json = json_decode($google_font_prop, true);
            $google_fonts = $google_fonts_json['fonts'];

            if (is_array($google_fonts)) {
                $font_string = "";

                foreach ($google_fonts as &$font) {
                    $font_string .= urlencode($font) . '|';
                }

                // strip off trailing pipe |
                $font_string = substr($font_string, 0, -1);

                $google_font_import = "\n\t\t<style type=\"text/css\">\n\t\t\t@import url('//fonts.googleapis.com/css?family=" . $font_string . "');\n\t\t</style>";

                if(strlen($font_string) > 0) {
                    $headString .= $google_font_import;
                }
            }
        }

        // CSS override include for Style Designer
        $headString .=  "\n<style type=\"text/css\" id=\"styleOverrides\">\n";
            if(empty($params['site_style']) || $params['site_style'] == 'true') {
                $headString .= $smarty->fetch('classes/commons/resources/designsettings/site_style.css');
            }
        $headString .= "\n</style>";

        if(_SYSTEM_MODE == "DESIGN") {
            $smarty->assign("templatemode", "DESIGN");
            $headString .= "\n<script id=\"styleTemplate\" type=\"text/x-handlebars-template\">\n";
            $headString .= $smarty->fetch('templates/' . $styleName . '/style.css');
            if(empty($params['site_style']) || $params['site_style'] == 'true') {
                $headString .= $smarty->fetch('classes/commons/resources/designsettings/site_style.css');
            }
            $headString .= "\n</script>";
            $smarty->assign("templatemode", "");
        }
    } else {
        // enable legacy font import
        // enabled == null defaults to true
        if($css['fonts'] && $css['fonts'] !== '' && !_MOBILE && !_FACEBOOK) {
            $headString .=
                "\n<style id='yola-css-fonts-overrides' type=\"text/css\">\n" .
                "\n" . $css['fonts'] .
                "\n</style>";
        }
    }

    if (!isset($_REQUEST["safeMode"]) || $_REQUEST["safeMode"] != 'true') {

        // enabled == null defaults to true
        if($cssOverridesBought && $css['overrides'] && $css['overrides-enabled'] !== 'false' && !_MOBILE && !_FACEBOOK) {
            $headString .=
                "\n\t\t<style id='yola-user-css-overrides' type=\"text/css\">\n" .
                "\n\t\t" . $css['overrides'] .
                "\n\t\t</style>";
        }

    }

    return $headString . $includeString;
}

?>
