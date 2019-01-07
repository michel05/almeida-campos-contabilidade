<?php
/************************************************
 * Define Enviorment Constants
 ************************************************/
if(!defined('_ENV_PROJECT_BASE')) {define('_ENV_PROJECT_BASE', dirName($_SERVER['SCRIPT_FILENAME']));}

if (array_key_exists('DEBUG', $_SERVER) && $_SERVER['DEBUG'] == 'TRUE') {
    define('_DEBUG', true);
} else {
    define('_DEBUG', false);
}

define('_IS_ROUTED', true);

require_once(_ENV_PROJECT_BASE . '/classes/commons/includes/Common.functions.php');

$relReqPath = getRelativeRequestURIPath();

if ($relReqPath == '/sitemap.xml') {
    require_once(_ENV_PROJECT_BASE . '/sitemap.xml.php');

} elseif ($relReqPath == '/robots.txt') {
    require_once(_ENV_PROJECT_BASE . '/robots.txt.php');

} elseif (preg_match('@\.rss$@', $relReqPath)) {
    require_once(_ENV_PROJECT_BASE . '/classes/components/BlogWidget/rss.php');

} elseif (preg_match('@\.search$@', $relReqPath)) {
    require_once(_ENV_PROJECT_BASE . '/classes/components/BlogSearchWidget/search.php');

} else {
    require_once(_ENV_PROJECT_BASE . '/page.inc.php');
}

exit;

?>
