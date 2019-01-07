<?php
/**
 * Class ComponentHelper
 * Contains common functions used in widgets
 */
class ComponentHelper
{
    /**
     * Returns $langToLocMap array
     * @return array
     */
    public static function getLangToLocMap()
    {
        return array(
            "cs" => "cs_CZ",
            "de" => "de_DE",
            "en" => "en_US",
            "es" => "es_ES",
            "fr" => "fr_FR",
            "it" => "it_IT",
            "nb" => "nb_NO",
            "nl" => "nl_NL",
            "pl" => "pl_PL",
            "pt" => "pt_BR",
            "sk" => "sk_SK",
            "sv" => "sv_SE",
        );
    }

    /**
     * Returns language, defaults to getLocales()['en']
     * @return string
     */
    public static function getLocale()
    {
        $language = $GLOBALS['systemProperties']['system']['locale'];
        $langToLocMap = self::getLangToLocMap();
        if (array_key_exists($language, $langToLocMap)) {
            $locale = $langToLocMap[$language];
        } else {
            $locale = $langToLocMap['en'];
        }
        return $locale;
    }
}
