<?php

function getBaseURI() {
    $requestParts = explode('?', $_SERVER['REQUEST_URI']);
    $requestPathParts = explode('/', $requestParts[0]);
    $baseURIPathParts = array();

    if (count($requestPathParts) > 1 && $requestPathParts[1] === 'restricted_view') {

        for ($currPart = array_shift($requestPathParts);
                isset($currPart) && !(preg_match('/^[a-f0-9]{32}$/', $currPart));
                $currPart = array_shift($requestPathParts)) {
            $baseURIPathParts[] = $currPart;
        }

        if (isset($currPart)) {
            $baseURIPathParts[] = $currPart;

            if (count($baseURIPathParts) > 1) {
                return implode('/', $baseURIPathParts).'/';

            } else {
                return '/';
            }

        } else {
            return '/';
        }

    } else {
        return '/';
    }    
}

function getRelativeRequestURI() {
    $requestParts = explode('/', $_SERVER['REQUEST_URI']);

    if (count($requestParts) > 1 && $requestParts[1] === 'restricted_view') {

        for ($currPart = array_shift($requestParts);
                isset($currPart) && !(preg_match('/^[a-f0-9]{32}$/', $currPart));
                $currPart = array_shift($requestParts));

        if (isset($currPart)) {
            return '/'.implode('/', $requestParts);

        } else {
            return $_SERVER['REQUEST_URI'];
        }

    } else {
        return $_SERVER['REQUEST_URI'];
    }
}

function getRelativeRequestURIPath() {
    $relReqURI = getRelativeRequestURI();

    // Strip off any passed params
    $relReqURIParts = explode('?', $relReqURI);

    return $relReqURIParts[0];
}

// getRelativeRequestDecodedPath() is a replacement for $_SERVER['PATH_INFO'] since those
// values are not consistent for mutli-byte chars between apache and lighttpd
function getRelativeRequestDecodedPath() {

    return rawurldecode(getRelativeRequestURIPath());
}

function getCurrentPage() {
    $relReqPath = getRelativeRequestDecodedPath();

    if (_SYSTEM_MODE == 'RUN' && !defined('_IS_ROUTED')) {
        if (endsWith($relReqPath, '/')) {
            return 'index.php';
        } else {
            $relReqPathParts = explode('/', $relReqPath);

            return end($relReqPathParts);
        }
    } else {
        
        if ($relReqPath === '/') {
            return 'index.php';
        } else {
            $relReqPathParts = explode('/', $relReqPath);

            return $relReqPathParts[1];
        }
    }
}

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}


function getCurrentPageName() {
    return preg_replace('/(\.php|\.search|\.rss|\.single)$/', '', getCurrentPage());
}

function canonicalizePageURI() {
    $relReqPath = getRelativeRequestURIPath();

    if ($relReqPath !== "/") {
        $split_arr = explode("/", $relReqPath);

        // if this isn't a subdirectory type blog url
        if ((count($split_arr) === 2) || ($split_arr[2] === "")) {

            $endOfReqPathPart = strpos($_SERVER['REQUEST_URI'], "?");

            if ($endOfReqPathPart !== false) {
                $reqPathPart = substr($_SERVER['REQUEST_URI'], 0, $endOfReqPathPart);
                $reqQueryPart = substr($_SERVER['REQUEST_URI'], $endOfReqPathPart);

            } else {
                $reqPathPart = $_SERVER['REQUEST_URI'];
                $reqQueryPart = '';
            }

            $needsThreeOhOne = false;

            // trailing slashes are not cool unless you're the index page (handled above)
            if (substr($reqPathPart, -1) === "/") {
                $reqPathPart = substr($reqPathPart, 0, -1);
                $needsThreeOhOne = true;
            }

            // require the .php on the end
            if (!(substr($reqPathPart, -4) === ".php")) {
                $reqPathPart = $reqPathPart . '.php';
                $needsThreeOhOne = true;
            }

            // "/index.php" canonicalizes to "/"
            if (substr($reqPathPart, -10) === "/index.php") {
                $reqPathPart = substr($reqPathPart, 0, -9);
                $needsThreeOhOne = true;
            }

            // redirect if needed
            if ($needsThreeOhOne === true) {
                $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https' : 'http';
                threeOhOne($protocol . '://' . $_SERVER['SERVER_NAME'] . $reqPathPart . $reqQueryPart);
            }
        }
    }
}

/**
 * return the string path to use to include a php definitions file from a url
 * @return string
 * @param $modeString This param should basically map to the requested _SYSTEM_MODE -> $modeString values
 */
function getDefinitionsPath($modeString) {
    $currentPageParts = explode('/', $_SERVER['REQUEST_URI']);

    for ($ii = 0; ($ii + 1) < count($currentPageParts); $ii++) {

         if (preg_match('/^[a-f0-9]{32}$/', $currentPageParts[$ii])) {
             $siteId = $currentPageParts[$ii];

             break;
         }
    }

    $currentPage = getCurrentPageName();

    $include = 'http://' . $_SERVER['HTTP_HOST'] . '/rest/definitions'
            . '/' . $modeString
            . '/' . $siteId
            . '/' . rawurlencode($currentPage);

    return $include;

}

function threeOhOne($redirect) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);

    exit(0);
}

function threeOhTwo($redirect) {
    header('HTTP/1.1 302 Found');
    header('Location: ' . $redirect);

    exit(0);
}

/**
 *  replacement for the official basename() function that breaks on certain utf8 characters
 */
function getBaseName($path, $suffix=null) {
    $baseNameVal = array_pop(explode('/', $path));

    if ($suffix) {
        if (strpos($baseNameVal, $suffix) !== false) {
            $baseNameVal = str_replace($suffix, '', $baseNameVal);
        }
    }

    return $baseNameVal;
}

function exception_error_handler($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
?>
