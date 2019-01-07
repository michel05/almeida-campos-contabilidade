<?php

require_once (_ENV_COMMONS_CLASSPATH . _COMP_SUBSCRIBER);

class Horizontal_Line extends Subscriber {
    
    public function subscriberInit() {
        
        $widgetId = $this->getComponentProperty('id');
        $margin   = $this->getComponentProperty('margin');
        $color   = $this->getComponentProperty('horizontal-line-color');
        $width   = $this->getComponentProperty('horizontal-line-thickness');
        $style   = $this->getComponentProperty('horizontal-line-style');
        
        $this->addTemplateVariable('widgetId', $widgetId);
        $this->addTemplateVariable('margin', $margin);
        $this->addTemplateVariable('color', $color);
        $this->addTemplateVariable('width', $width);
        $this->addTemplateVariable('style', $style);
        
        $this->addTemplateVariable('_SYSTEM_MODE', _SYSTEM_MODE);
        
    }
    
}