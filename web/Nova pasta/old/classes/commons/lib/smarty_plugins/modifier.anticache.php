<?php

    function smarty_modifier_anticache($path) {

        if (_SYSTEM_MODE != 'RUN') {
            $versionPrefix = "";
            $cdnPath = "";

            if (file_exists(_ENV_COMMONS_CLASSPATH . 'includes/version.inc.php')) {
                include(_ENV_COMMONS_CLASSPATH . 'includes/version.inc.php');

                if (isset($version)) {
                    $versionPrefix = '/V' . str_pad($version, 7, '0', STR_PAD_LEFT);

                    if (isset($cdnDomains)) {
                        $cdnCounter = 0;

                        foreach (str_split($path) as $chr) {
                            $cdnCounter += ord($chr);
                        }
                        $cdnPath = $cdnDomains[$cdnCounter % sizeof($cdnDomains)];
                    }
                }
            }
            
            if (strpos($path, 'classes/components/') === 0) {
                return $cdnPath . $versionPrefix . '/components/system/' . strstrbi($path, 'classes/components/', false, false, true);
                
            } else if (strpos($path, 'templates/') === 0) {
                return $cdnPath . $versionPrefix . '/template_resources/0/' . strstrbi($path, 'templates/', false, false, true);
                
            } else if (strpos($path, 'classes/commons/') === 0) {
                return $cdnPath . $versionPrefix . '/components/commons/' . strstrbi($path, 'classes/commons/', false, false, true);
                
            } else {
                return $path;
            }

        } else {
            return $path;
        }
    }


    function strstrbi($haystack, $needle, $before_needle=FALSE, $include_needle=TRUE, $case_sensitive=FALSE) {
        //Find the position of $needle
        if($case_sensitive) {
            $pos=strpos($haystack,$needle);
        } else {
            $pos=strpos(strtolower($haystack),strtolower($needle));
        }

        //If $needle not found, abort
        if($pos===FALSE) return FALSE;

        //Adjust $pos to include/exclude the needle
        if($before_needle==$include_needle) $pos+=strlen($needle);

        //get everything from 0 to $pos?
        if($before_needle) return substr($haystack,0,$pos);

        //otherwise, go from $pos to end
        return substr($haystack,$pos);
    }
?>

