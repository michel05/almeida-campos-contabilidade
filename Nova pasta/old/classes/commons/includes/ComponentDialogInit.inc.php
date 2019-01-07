<?php
  # Get the locale from the request headers.
  $headers = apache_request_headers();
  $locale = $headers['Yola-Locale'];
  $category = LC_ALL;

  if(strlen($locale) == 0) {
    # Hard coded default value
    $locale = "en";
  }

  # Canonicalize:
  $locales = array(
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
  if (array_key_exists($locale, $locales)) {
    $locale = $locales[$locale];
  }
  if (strpos($locale, ".") === false) {
    $locale .= ".UTF-8";
  }

  putenv("LC_ALL=${locale}");
  setlocale($category, $locale);
  bindtextdomain("messages", "../locale");
  textdomain("messages");

  # Set content-type and charset headers based on file type
  header("Content-type: text/html; charset=utf-8");
  # Set the locale in a header (for debugging purposes).
  header("Yola-Locale: ${locale}");
?>
