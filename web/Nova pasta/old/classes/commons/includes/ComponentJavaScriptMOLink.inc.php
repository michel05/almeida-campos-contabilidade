<?php
  # Get the locale from the request headers.
  $headers = apache_request_headers();
  $locale = $headers['Yola-Locale'];

  if(strlen($locale) == 0) {
    # Hard coded default value
    $locale = "en_US";
  }

  $localeParts = explode('_', $locale);

  for (; count($localeParts) > 0; array_pop($localeParts)) {
    $localPath = implode('_', $localeParts);

    if (file_exists ("../locale/${localPath}/LC_MESSAGES/javascript.mo")) {
      $requestPathParts = explode('/', $_SERVER['REQUEST_URI']);
      array_pop($requestPathParts);
      array_pop($requestPathParts);
      $moFilePath = implode('/', $requestPathParts) . "/locale/${localPath}/LC_MESSAGES/javascript.mo";

      echo "<link rel=\"gettext\" href=\"${moFilePath}\" type=\"application/x-mo\" />\n";

      break;
    }
  }
?>
