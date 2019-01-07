<?php
require_once (_ENV_COMMONS_CLASSPATH . _COMP_SUBSCRIBER);

class Form extends Subscriber {

    public function subscriberInit() {
        
        global $systemProperties;

        $formServicePath = str_replace('http://', '//', $systemProperties['system']['formServicePathURL']);
        $formServicePath = rtrim($formServicePath, '/');
            
        $isWhiteLabel = $systemProperties['system']["isWhiteLabel"];
        $locale = $systemProperties['system']['locale'];
        $widgetId = $this->getComponentProperty('id');        
        $destination = $this->getComponentProperty('destination');
        
        //$userId = $this->getComponentProperty('userId');
        //$siteId = $this->getComponentProperty('siteId');
        //$pageId = $this->getComponentProperty('pageId');
        
        $siteId = $systemProperties['system']['site']['id'];
        $pageId = $systemProperties['system']['page']['id'];
        $userId = $systemProperties['system']['user']['id'];
        
        $email = $this->getComponentProperty('email');
        $successMessage = $this->getComponentProperty('successMessage');
        $data = $this->getComponentProperty('json');
        
        $pageURL = 'http';
        $pageURLFail = 'http';
        
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        
        $pageURL .= "://";
        $pageURLFail .= "://";
        
        $baseURL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        $fbId = $systemProperties['system']['site']['facebookPageId'].'.';
        
        if(_FACEBOOK && $fbId != '.'){
            $baseURL = $fbId.'yolafb.com'.$_SERVER["REQUEST_URI"];
        }
        
        $baseURL = str_replace("?form".$widgetId."PostFailed=true&", "?", $baseURL);
        $baseURL = str_replace("?form".$widgetId."PostFailed=true", "", $baseURL);
        $baseURL = str_replace("&form".$widgetId."PostFailed=true", "", $baseURL);
        $baseURL = str_replace("?form".$widgetId."Posted=true&", "?", $baseURL);
        $baseURL = str_replace("?form".$widgetId."Posted=true", "", $baseURL);
        $baseURL = str_replace("&form".$widgetId."Posted=true", "", $baseURL);

        $pageURL .= $baseURL;
        $pageURLFail .= $baseURL;

        $siteName = $systemProperties['system']['site']['name'];

        if(strrpos($pageURL, '?') > -1){
            $pageURL .= "&form".$widgetId."Posted=true";
        }else{
            $pageURL .= "?form".$widgetId."Posted=true";
        }
        
        if(strrpos($pageURLFail, '?') > -1){
            $pageURLFail .= "&form".$widgetId."PostFailed=true";
        }else{
            $pageURLFail .= "?form".$widgetId."PostFailed=true";
        }
        
        $posted = false;
        if (isset($_REQUEST["form".$widgetId."Posted"]) && $_REQUEST["form".$widgetId."Posted"] == 'true') {
            $posted = true;
        }
        
        $failed = false;
        if (isset($_REQUEST["form".$widgetId."PostFailed"]) && $_REQUEST["form".$widgetId."PostFailed"] == 'true') {
            $failed = true;
            $posted = true;
        }
        
        $short_locale = strtolower(substr($locale, 0, 2));

        /* Locales supported by reCAPTCHA */
        if(
            $short_locale == 'en' || 
            $short_locale == 'nl' || 
            $short_locale == 'fr' || 
            $short_locale == 'de' || 
            $short_locale == 'pt' || 
            $short_locale == 'ru' || 
            $short_locale == 'es' || 
            $short_locale == 'tr'
        ){
            
        }else{
            $short_locale = '';
        }
        
        $this->addTemplateVariable('data', json_decode($data, true));
        $this->addTemplateVariable('email', $email);
        $this->addTemplateVariable('userId', $userId);
        $this->addTemplateVariable('pageId', $pageId);
        $this->addTemplateVariable('siteId', $siteId);
        $this->addTemplateVariable('widgetId', $widgetId);
        $this->addTemplateVariable('redirect', $pageURL);
        $this->addTemplateVariable('destination', $destination);
        $this->addTemplateVariable('redirectFail', $pageURLFail);
        $this->addTemplateVariable('posted', $posted);
        $this->addTemplateVariable('failed', $failed);
        $this->addTemplateVariable('siteName', $siteName);
        $this->addTemplateVariable('successMessage', $successMessage);
        $this->addTemplateVariable('formServicePath', $formServicePath);
        $this->addTemplateVariable('locale', $locale);
        $this->addTemplateVariable('short_locale', $short_locale);
        $this->addTemplateVariable('isWhiteLabel', ($isWhiteLabel === true)?("1"):("0"));
        

        $this->addTemplateVariable('_SYSTEM_MODE', _SYSTEM_MODE);
        
    }

}
