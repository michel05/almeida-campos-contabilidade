<?php
global $systemProperties;

require_once (_ENV_COMMONS_CLASSPATH . 'component' . DIRECTORY_SEPARATOR . 'PageContext.class.php');

$pageContext = new PageContext();
$masterComponentList = array();
$pageProperties = array();

//Page Level Properties
$systemProperties['system']['page'] = array();
$systemProperties['system']['page']['id'] = '8a4986c94ac11584014ac5e5a8cd3df6';
$systemProperties['system']['page']['name'] = 'index.php';
$systemProperties['system']['page']['type'] = 'Home - Super Flat';
$systemProperties['system']['page']['protected'] = 'false';
$systemProperties['system']['page']['layout'] = 'layout_A';
$systemProperties['system']['page']['lastModified'] = '1420723380';
$systemProperties['system']['page']['etag'] = '1d3f2d90d37cf0a0e5a1537b34ce915e';

            $systemProperties['properties']['meta']['keywords'] = 'Contabilidade, Contabilidade em Goiânia, Escritório de Contabilidade, Planejamento Tributário, Assessoria Contábil, Auditoria';
                $systemProperties['properties']['meta']['description'] = 'Empresa Contábil, contando com equipe especializada para atender as demandas de um mercado crescente e dinâmico.';
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

    $pageProperties['includes'][] = 'classes/components/Image/layouts/Default/Default.css';


//ComponentResources
$pageProperties['componentResources'] = array();



$pageProperties['regions'] = array();

//Define the regions for the page
	$pageProperties['regions']['sys_region_1'] = array();
		
					
		//Text_2 Component
		$text_2_1_componentProps = array();
                        $text_2_1_componentProps['id'] = 'I1';
                        $text_2_1_componentProps['sys_displayType'] = 'block';
                        $text_2_1_componentProps['sys_layoutName'] = 'Default';
                        $text_2_1_componentProps['sys_className'] = 'Text_2_Default';
                        $text_2_1_componentProps['sys_hasCSS'] = false;
                        $text_2_1_componentProps['sys_hasDynamicCSS'] = false;


                                                                    $text_2_1_componentProps['margin'] = '0 0 0 0';
                                                                                            $text_2_1_componentProps['padding'] = '';
                                                                                            $text_2_1_componentProps['text'] = '<h2>Almeida & Campos Contabilidade tem a experiência para ajudá-lo a crescer!</h2>';
                                                        	
		//Add the 'Text_2' component to the region
                require_once (_ENV_COMPONENT_CLASSPATH . "Text_2/Text_2.class.php");
		$text_2_1 = new Text_2($pageContext, $text_2_1_componentProps);
		$masterComponentList[] = $text_2_1;		
		$pageProperties['regions']['sys_region_1'][] = $text_2_1;

					
		//Layout1 Component
		$layout1_2_componentProps = array();
                        $layout1_2_componentProps['id'] = 'I2';
                        $layout1_2_componentProps['sys_displayType'] = 'block';
                        $layout1_2_componentProps['sys_layoutName'] = 'Default';
                        $layout1_2_componentProps['sys_className'] = 'Layout1_Default';
                        $layout1_2_componentProps['sys_hasCSS'] = false;
                        $layout1_2_componentProps['sys_hasDynamicCSS'] = false;


                                                                    $layout1_2_componentProps['lw'] = '50%';
                                                                                            $layout1_2_componentProps['margin'] = '0 0 0 0';
                                                                                            $layout1_2_componentProps['rw'] = '50%';
                                                                                            $layout1_2_componentProps['left_column']['padding'] = '0';
                                                                                            $layout1_2_componentProps['right_column']['padding'] = '0';
                                                        		//Find regions for this component
										
				//Text_2 Component
				$text_2_3_componentProps = array();			
                                        $text_2_3_componentProps['id'] = 'I3';
                                        $text_2_3_componentProps['sys_displayType'] = 'block';
                                        $text_2_3_componentProps['sys_layoutName'] = 'Default';
                                        $text_2_3_componentProps['sys_className'] = 'Text_2_Default';
                                        $text_2_3_componentProps['sys_hasCSS'] = false;
                                        $text_2_3_componentProps['sys_hasDynamicCSS'] = false;

				                                                                                    $text_2_3_componentProps['margin'] = '0 0 0 0';
                                        				                                                                                    $text_2_3_componentProps['padding'] = '';
                                        				                                                                                    $text_2_3_componentProps['text'] = '<h3>Sobre nós</h3>
<p>Nossos profissionais são experientes e altamente qualificados, discretos, com ótimas referências e uma ampla gama de treinamento para o projeto.</p>
<h3>Serviços</h3>
<p>Temos anos de experiência para ajudá-lo a otimizar&nbsp;o seu negócio. Quando você quiser organizar sua&nbsp;Contabilidade, realizar uma Auditoria, fazer um Planejamento Tributário, estamos aqui para ajudá-lo.</p>
<p><a href="contact-us.php">Entre em contato conosco agora.</a></p>';
                                        					
					                                
                                //Add the 'Text_2' component to the region
                                require_once (_ENV_COMPONENT_CLASSPATH . "Text_2/Text_2.class.php");
				$text_2_3 = new Text_2($pageContext, $text_2_3_componentProps);
				$masterComponentList[] = $text_2_3;
				$layout1_2_componentProps['regions']['Right'][] = $text_2_3;	
													
				//Image Component
				$image_4_componentProps = array();			
                                        $image_4_componentProps['id'] = 'I4';
                                        $image_4_componentProps['sys_displayType'] = 'block';
                                        $image_4_componentProps['sys_layoutName'] = 'Default';
                                        $image_4_componentProps['sys_className'] = 'Image_Default';
                                        $image_4_componentProps['sys_hasCSS'] = false;
                                        $image_4_componentProps['sys_hasDynamicCSS'] = false;

				                                                                                    $image_4_componentProps['alt'] = '';
                                        				                                                                                    $image_4_componentProps['imgwidth'] = '';
                                        				                                                                                    $image_4_componentProps['link']['href'] = '';
                                        				                                                                                    $image_4_componentProps['margin'] = '0 0 0 0';
                                        				                                                                                    $image_4_componentProps['optimize'] = 'n';
                                        				                                                                                    $image_4_componentProps['padding'] = '';
                                        				                                                                                    $image_4_componentProps['position'] = 'left';
                                        				                                                                                    $image_4_componentProps['src'] = '//s2.yolacdn.net/ide/images/template/consulting/image.jpg';
                                        					
					                                
                                //Add the 'Image' component to the region
                                require_once (_ENV_COMPONENT_CLASSPATH . "Image/Image.class.php");
				$image_4 = new Image($pageContext, $image_4_componentProps);
				$masterComponentList[] = $image_4;
				$layout1_2_componentProps['regions']['Left'][] = $image_4;	
						
		//Add the 'Layout1' component to the region
                require_once (_ENV_COMPONENT_CLASSPATH . "Layout1/Layout1.class.php");
		$layout1_2 = new Layout1($pageContext, $layout1_2_componentProps);
		$masterComponentList[] = $layout1_2;		
		$pageProperties['regions']['sys_region_1'][] = $layout1_2;

					
		//Horizontal_Line Component
		$horizontal_line_5_componentProps = array();
                        $horizontal_line_5_componentProps['id'] = 'I5';
                        $horizontal_line_5_componentProps['sys_displayType'] = 'block';
                        $horizontal_line_5_componentProps['sys_layoutName'] = 'Default';
                        $horizontal_line_5_componentProps['sys_className'] = 'Horizontal_Line_Default';
                        $horizontal_line_5_componentProps['sys_hasCSS'] = false;
                        $horizontal_line_5_componentProps['sys_hasDynamicCSS'] = false;


                                                                    $horizontal_line_5_componentProps['horizontal-line-color'] = '#cccccc';
                                                                                            $horizontal_line_5_componentProps['horizontal-line-style'] = 'solid';
                                                                                            $horizontal_line_5_componentProps['horizontal-line-thickness'] = '1px';
                                                                                            $horizontal_line_5_componentProps['margin'] = '20px 0 20px 0';
                                                        	
		//Add the 'Horizontal_Line' component to the region
                require_once (_ENV_COMPONENT_CLASSPATH . "Horizontal_Line/Horizontal_Line.class.php");
		$horizontal_line_5 = new Horizontal_Line($pageContext, $horizontal_line_5_componentProps);
		$masterComponentList[] = $horizontal_line_5;		
		$pageProperties['regions']['sys_region_1'][] = $horizontal_line_5;

					
		//Text_2 Component
		$text_2_6_componentProps = array();
                        $text_2_6_componentProps['id'] = 'I6';
                        $text_2_6_componentProps['sys_displayType'] = 'block';
                        $text_2_6_componentProps['sys_layoutName'] = 'Default';
                        $text_2_6_componentProps['sys_className'] = 'Text_2_Default';
                        $text_2_6_componentProps['sys_hasCSS'] = false;
                        $text_2_6_componentProps['sys_hasDynamicCSS'] = false;


                                                                    $text_2_6_componentProps['margin'] = '0 0 0 0';
                                                                                            $text_2_6_componentProps['padding'] = '';
                                                                                            $text_2_6_componentProps['text'] = '<h3>Nosso Compromisso</h3>
<p>Você pode confiar que o seu negócio e assuntos pessoais serão tratados com profissionalismo, integridade e a máxima discrição. O resultado final será preciso, dentro do prazo e você obterá grandes resultados.</p>
<h3></h3>
<p><br></p>';
                                                        	
		//Add the 'Text_2' component to the region
                require_once (_ENV_COMPONENT_CLASSPATH . "Text_2/Text_2.class.php");
		$text_2_6 = new Text_2($pageContext, $text_2_6_componentProps);
		$masterComponentList[] = $text_2_6;		
		$pageProperties['regions']['sys_region_1'][] = $text_2_6;

	
$pageProperties['masterComponentList'] = $masterComponentList;

?>
