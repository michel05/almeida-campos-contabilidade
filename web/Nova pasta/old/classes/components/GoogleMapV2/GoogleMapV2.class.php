<?php
require_once (_ENV_COMMONS_CLASSPATH . _COMP_SUBSCRIBER);

class GoogleMapV2 extends Subscriber {

    public function subscriberInit() {
        global $systemProperties;

        $widgetId = $this->getComponentProperty('id');
        $search = $this->getComponentProperty('search');
        $mapWidth = $this->getComponentProperty('mapWidth');
        if($mapWidth == 'auto' || _MOBILE || _FACEBOOK){
            $mapWidth = 'auto';
        }else{
            $mapWidth = $mapWidth."px";
        }
        $mapHeight = $this->getComponentProperty('mapHeight')."px";
        $mapPadding = $this->getComponentProperty('mapPadding')."px";
        $mapAlign = $this->getComponentProperty('mapAlign');
        $mapCoords = split(",", $this->getComponentProperty('mapCoords'), 2);
        $mapCoordsLat = $mapCoords[0];
        $mapCoordsLong = ($mapCoords[1]) ? $mapCoords[1] : null;
        $markerCoords = split(",", $this->getComponentProperty('markerCoords'), 2);
        $markerCoordsLat = $markerCoords[0];
        $markerCoordsLong = ($markerCoords[1]) ? $markerCoords[1] : null;
        $zoom = $this->getComponentProperty('zoom');
        $mapTypeId = $this->getComponentProperty('mapTypeId');
        $mapStyle = $this->getComponentProperty('mapStyle');

        // validate mapStyle as valid JSON
        $mapStyleJSON = json_decode($mapStyle);
        if ($mapStyleJSON === null) {
            $mapStyle = "null";
        }
        $this->addTemplateVariable('widgetId', $widgetId);
        $this->addTemplateVariable('search', $search);
        $this->addTemplateVariable('mapWidth', $mapWidth);
        $this->addTemplateVariable('mapHeight', $mapHeight);
        $this->addTemplateVariable('mapPadding', $mapPadding);
        $this->addTemplateVariable('mapAlign', $mapAlign);
        $this->addTemplateVariable('mapCoordsLat', $mapCoordsLat);
        $this->addTemplateVariable('mapCoordsLong', $mapCoordsLong);
        $this->addTemplateVariable('markerCoordsLat', $markerCoordsLat);
        $this->addTemplateVariable('markerCoordsLong', $markerCoordsLong);
        $this->addTemplateVariable('zoom', $zoom);
        $this->addTemplateVariable('mapTypeId', $mapTypeId);
        $this->addTemplateVariable('mapStyle', $mapStyle);

        $this->addTemplateVariable('SYSTEM_MODE', _SYSTEM_MODE);
    }

}
?>