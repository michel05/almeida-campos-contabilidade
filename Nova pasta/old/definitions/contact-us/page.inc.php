<?php
global $systemProperties;

require_once (_ENV_COMMONS_CLASSPATH . 'component' . DIRECTORY_SEPARATOR . 'PageContext.class.php');

$pageContext = new PageContext();
$masterComponentList = array();
$pageProperties = array();

//Page Level Properties
$systemProperties['system']['page'] = array();
$systemProperties['system']['page']['id'] = '8a4986c94ac11584014ac5e5a8f83df7';
$systemProperties['system']['page']['name'] = 'contact-us.php';
$systemProperties['system']['page']['type'] = 'Contact us - Super Flat';
$systemProperties['system']['page']['protected'] = 'false';
$systemProperties['system']['page']['layout'] = 'layout_A';
$systemProperties['system']['page']['lastModified'] = '1420723380';
$systemProperties['system']['page']['etag'] = '13f220442b495a88f513ef757f69a4cb';

            $systemProperties['properties']['meta']['keywords'] = '';
                $systemProperties['properties']['meta']['description'] = '';
                $systemProperties['properties']['body']['background-attachment'] = 'fixed';
                $systemProperties['properties']['body']['background-color'] = '';
                $systemProperties['properties']['body']['background-image'] = 'classes/commons/resources/images/backgrounds/retina_wood.png';
                $systemProperties['properties']['logo']['visible'] = '';
                $systemProperties['properties']['logo']['src'] = '';
                $systemProperties['properties']['heading']['text'] = 'Almeida & Campos Contabilidade';
                $systemProperties['properties']['body']['background-repeat'] = 'repeat';
                $systemProperties['properties']['logo']['background-color'] = '';
                $systemProperties['properties']['body']['background-position'] = 'top left';
                $systemProperties['properties']['banner']['src'] = '';
                $systemProperties['properties']['title']['text'] = 'Almeida & Campos Contabilidade';
                $systemProperties['properties']['banner']['background-color'] = '';
                $systemProperties['properties']['layout']['lock'] = '';
                $systemProperties['properties']['heading']['style'] = '';
    
//Includes
$pageProperties['includes'] = array();

    $pageProperties['includes'][] = 'classes/components/Form/layouts/Default/Default.css';


//ComponentResources
$pageProperties['componentResources'] = array();



$pageProperties['regions'] = array();

//Define the regions for the page
	$pageProperties['regions']['sys_region_1'] = array();
		
					
		//Layout1 Component
		$layout1_7_componentProps = array();
                        $layout1_7_componentProps['id'] = 'I7';
                        $layout1_7_componentProps['sys_displayType'] = 'block';
                        $layout1_7_componentProps['sys_layoutName'] = 'Default';
                        $layout1_7_componentProps['sys_className'] = 'Layout1_Default';
                        $layout1_7_componentProps['sys_hasCSS'] = false;
                        $layout1_7_componentProps['sys_hasDynamicCSS'] = false;


                                                                    $layout1_7_componentProps['lw'] = '50.227790432801825%';
                                                                                            $layout1_7_componentProps['margin'] = '0 0 0 0';
                                                                                            $layout1_7_componentProps['rw'] = '49.772209567198175%';
                                                                                            $layout1_7_componentProps['left_column']['padding'] = '0';
                                                                                            $layout1_7_componentProps['right_column']['padding'] = '0';
                                                        		//Find regions for this component
										
				//Text_2 Component
				$text_2_8_componentProps = array();			
                                        $text_2_8_componentProps['id'] = 'I8';
                                        $text_2_8_componentProps['sys_displayType'] = 'block';
                                        $text_2_8_componentProps['sys_layoutName'] = 'Default';
                                        $text_2_8_componentProps['sys_className'] = 'Text_2_Default';
                                        $text_2_8_componentProps['sys_hasCSS'] = false;
                                        $text_2_8_componentProps['sys_hasDynamicCSS'] = false;

				                                                                                    $text_2_8_componentProps['margin'] = '0 0 0 0';
                                        				                                                                                    $text_2_8_componentProps['padding'] = '';
                                        				                                                                                    $text_2_8_componentProps['text'] = '<p>&nbsp;</p>';
                                        					
					                                
                                //Add the 'Text_2' component to the region
                                require_once (_ENV_COMPONENT_CLASSPATH . "Text_2/Text_2.class.php");
				$text_2_8 = new Text_2($pageContext, $text_2_8_componentProps);
				$masterComponentList[] = $text_2_8;
				$layout1_7_componentProps['regions']['Right'][] = $text_2_8;	
								
				//GoogleMapV2 Component
				$googlemapv2_9_componentProps = array();			
                                        $googlemapv2_9_componentProps['id'] = 'I9';
                                        $googlemapv2_9_componentProps['sys_displayType'] = 'block';
                                        $googlemapv2_9_componentProps['sys_layoutName'] = 'Default';
                                        $googlemapv2_9_componentProps['sys_className'] = 'GoogleMapV2_Default';
                                        $googlemapv2_9_componentProps['sys_hasCSS'] = false;
                                        $googlemapv2_9_componentProps['sys_hasDynamicCSS'] = false;

				                                                                                    $googlemapv2_9_componentProps['mapAlign'] = 'right';
                                        				                                                                                    $googlemapv2_9_componentProps['mapCoords'] = '-16.6868912,-49.264794300000005';
                                        				                                                                                    $googlemapv2_9_componentProps['mapHeight'] = '400';
                                        				                                                                                    $googlemapv2_9_componentProps['mapPadding'] = '0';
                                        				                                                                                    $googlemapv2_9_componentProps['mapTypeId'] = 'map_style';
                                        				                                                                                    $googlemapv2_9_componentProps['mapWidth'] = '400';
                                        				                                                                                    $googlemapv2_9_componentProps['markerCoords'] = '-16.6868912,-49.264794300000005';
                                        				                                                                                    $googlemapv2_9_componentProps['search'] = 'Goiânia';
                                        				                                                                                    $googlemapv2_9_componentProps['zoom'] = '12';
                                        				                                                                                    $googlemapv2_9_componentProps['mapStyle'] = '{"display_name":"Normal","author":"Yola","attribution":"","license":"","description":"Default Google map style","styles":[{"featureType":"all","stylers":[{"saturation":0}]}],"name":"normal"}';
                                        					
					                                
                                //Add the 'GoogleMapV2' component to the region
                                require_once (_ENV_COMPONENT_CLASSPATH . "GoogleMapV2/GoogleMapV2.class.php");
				$googlemapv2_9 = new GoogleMapV2($pageContext, $googlemapv2_9_componentProps);
				$masterComponentList[] = $googlemapv2_9;
				$layout1_7_componentProps['regions']['Right'][] = $googlemapv2_9;	
													
				//Form Component
				$form_10_componentProps = array();			
                                        $form_10_componentProps['id'] = 'I10';
                                        $form_10_componentProps['sys_displayType'] = 'block';
                                        $form_10_componentProps['sys_layoutName'] = 'Default';
                                        $form_10_componentProps['sys_className'] = 'Form_Default';
                                        $form_10_componentProps['sys_hasCSS'] = true;
                                        $form_10_componentProps['sys_hasDynamicCSS'] = false;

				                                                                                    $form_10_componentProps['destination'] = 'BSfYPpR25xFLef3iQ3aJ5NbyDDqoPb8va_vd2DORbPERsujHfFYvSFGYygRdUBC-ln3yY_nyUh5QYA==:-UgEa2w3H5W7qouiyiEN1oQbDUjA5kKfODQIPqBXQVE=';
                                        				                                                                                    $form_10_componentProps['email'] = '';
                                        				                                                                                    $form_10_componentProps['json'] = '{
 "heading" : "Contato",
 "submit" : "Enviar",
 "fields" : [{
 "label" : "Nome",
 "id" : 0,
 "type" : "text",
 "defaultValue" : ""
}, {
 "label" : "Email",
 "id" : 1,
 "type" : "text",
 "defaultValue" : ""
}, {
 "label" : "Telefone",
 "id" : 2,
 "type" : "text",
 "defaultValue" : ""
}, {
 "label" : "Mensagem",
 "id" : 3,
 "type" : "textarea",
 "defaultValue" : ""
}, {
 "label" : null,
 "id" : 4,
 "type" : "captcha"
}],
 "autoGenerated" : true
}';
                                        				                                                                                    $form_10_componentProps['pageId'] = 'ff808184328ec5700132936a74480058';
                                        				                                                                                    $form_10_componentProps['siteId'] = 'ff8081843282b4f0013282b9756e0004';
                                        				                                                                                    $form_10_componentProps['successMessage'] = 'Your form has been successfully submitted! Thank you!';
                                        				                                                                                    $form_10_componentProps['userId'] = 'a1ab7963abd94bd8b0ee3e29272b9f8d';
                                        					
					                                
                                //Add the 'Form' component to the region
                                require_once (_ENV_COMPONENT_CLASSPATH . "Form/Form.class.php");
				$form_10 = new Form($pageContext, $form_10_componentProps);
				$masterComponentList[] = $form_10;
				$layout1_7_componentProps['regions']['Left'][] = $form_10;	
						
		//Add the 'Layout1' component to the region
                require_once (_ENV_COMPONENT_CLASSPATH . "Layout1/Layout1.class.php");
		$layout1_7 = new Layout1($pageContext, $layout1_7_componentProps);
		$masterComponentList[] = $layout1_7;		
		$pageProperties['regions']['sys_region_1'][] = $layout1_7;

	
$pageProperties['masterComponentList'] = $masterComponentList;

?>
