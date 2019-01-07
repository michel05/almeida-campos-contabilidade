<?php /* Smarty version 2.6.25-dev, created on 2015-01-08 15:50:01
         compiled from E:%5Chome%5Calmeidaeca1%5Calmeidaecampos.com.br%5Cweb/classes/components/GoogleMapV2%5Clayouts%5CDefault%5CDefault.tpl */ ?>

<?php if ($this->_tpl_vars['mapCoordsLat']): ?>

    <div style="padding:<?php echo $this->_tpl_vars['mapPadding']; ?>
;text-align:<?php echo $this->_tpl_vars['mapAlign']; ?>
;position:relative;">

        <?php if ($this->_tpl_vars['SYSTEM_MODE'] == 'DESIGN'): ?>
            <p style='display:none;'>&nbsp;</p>
            <div style="height:<?php echo $this->_tpl_vars['mapHeight']; ?>
;width:100%;position:absolute;z-index:999;top:<?php echo $this->_tpl_vars['mapPadding']; ?>
;left:0;"></div>
        <?php endif; ?>

        <div id="yola_google_map_canvas_<?php echo $this->_tpl_vars['widgetId']; ?>
" style="height:<?php echo $this->_tpl_vars['mapHeight']; ?>
;width:<?php echo $this->_tpl_vars['mapWidth']; ?>
;<?php if ($this->_tpl_vars['mapAlign'] == 'center'): ?>margin:0 auto;<?php elseif ($this->_tpl_vars['mapAlign'] == 'right'): ?>margin:0 0 0 auto;<?php endif; ?>"></div>

        <script type="text/javascript">try{google && google.maps}catch(err){document.write('<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.6&sensor=false"><\/script>');}</script>

        <script type="text/javascript">
            function yola_google_map_canvas_callback_<?php echo $this->_tpl_vars['widgetId']; ?>
(){
                var widgetId = "<?php echo $this->_tpl_vars['widgetId']; ?>
";
                var map_element = document.getElementById("yola_google_map_canvas_" + widgetId);
                // Create a map object, and include the MapTypeId to add to the map type control.
                var map_options = {
                    scrollwheel: false,
                    zoom: <?php echo $this->_tpl_vars['zoom']; ?>
,
                    center: new google.maps.LatLng(<?php echo $this->_tpl_vars['mapCoordsLat']; ?>
, <?php echo $this->_tpl_vars['mapCoordsLong']; ?>
),
                    mapTypeControlOptions: {
                        mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                    }
                };
                var map = new google.maps.Map(map_element, map_options);
                var marker = new google.maps.Marker({
                    position : map.getCenter(),
                    map : map
                });
                try {
                    // Define the map style dictionary
                    var mapStyle = <?php echo $this->_tpl_vars['mapStyle']; ?>
;
                }
                catch(e) {}
                if(mapStyle) {
                    // Create a new StyledMapType object, passing it the array of styles,
                    // as well as the name to be displayed on the map type control.
                    var styledMap = new google.maps.StyledMapType(mapStyle.styles, {
                        name: "Styled Map"
                    });
                    //Associate the styled map with the MapTypeId and set it to display.
                    map.mapTypes.set('map_style', styledMap);
                    map.setMapTypeId('map_style');
                }
            }

            try{
                yola_google_map_canvas_callback_<?php echo $this->_tpl_vars['widgetId']; ?>
();
            }catch(err){
                $.getScript('http://maps.googleapis.com/maps/api/js?v=3.6&sensor=false&callback=yola_google_map_canvas_callback_<?php echo $this->_tpl_vars['widgetId']; ?>
');
            }

        </script>

    </div>

<?php endif; ?>