<?php
/*------------------------------------------------------------------------
# mod_pqbcarrusel.php(module)
# ------------------------------------------------------------------------
# version		1.0.0
# author    	Guillermo
# copyright 	Copyright (c) 2011 Top Position All rights reserved.
# @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website		http://www.desarrollowebtutorial.com
This module uses 	 
	 *	jQuery carouFredSel 6.2.0
	 *	Demo's and documentation:
	 *	caroufredsel.dev7studios.com
	 *
	 *	Copyright (c) 2013 Fred Heusschen
	 *	www.frebsite.nl
	 *
	 *	Dual licensed under the MIT and GPL licenses.
	 *	http://en.wikipedia.org/wiki/MIT_License
	 *	http://en.wikipedia.org/wiki/GNU_General_Public_License
 *
-------------------------------------------------------------------------
*/
// no direct access
defined('_JEXEC') or die;
$w = $params->get('width','900');
$h = $params->get('height','180');
$iw = $params->get('imgwidth','250');
$ih = $params->get('imgheight','150');
$scroll = $params->get('scroll','1');
$paths	= $params->get('item_image');
$paths	= str_replace(array("\r\n","\r"), "\n", $paths);
if($paths!="") $paths	= explode("\n", $paths);
else $paths = array();
$links	= $params->get('item_link');
$links	= str_replace(array("\r\n","\r"), "\n", $links);
if($links!="") $links	= explode("\n", $links);
else $links = array();
$items = $params->get('items');
$duration = $params->get('duration');
$target = $params->get('target');
$target = ($target=='_blank') ? 'target="_blank"': '';
$auto = $params->get('auto');
$auto = ($auto==1) ? 'true' : 'false';
$responsive = $params->get('responsive');
$responsive = ($responsive==1) ? 'true' : 'false';
if($responsive=='true') $w = '100%';
$infinite = $params->get('infinite');
$infinite = ($infinite==1) ? 'true' : 'false';
$circular = $params->get('circular');
$circular = ($circular==1) ? 'true' : 'false';
$direction = $params->get('direction');
$pauseonhover = $params->get('pauseonhover');
$navigation = $params->get('navigation');
$prev = $params->get('prev');
$next = $params->get('next');
$document->addStyleDeclaration( '
			.pqbcarrusel_wrapper {
				text-align: center;
				width: '.$w.'px;
				margin: 0;
				padding: 0p;
				height: '.$h.'px;
				margin-left: auto;
				margin-right: auto;
				position: relative;
			}
			.pqbcarrusel_wrapper .caroufredsel_wrapper{
				margin: 0 !important;
			}
			.pqbcarrusel_wrapper img{
				width:'.$iw.'px;
				height:'.$ih.'px;
				border:1px #e2e2e2 solid;
				background-color:#FFF;
				margin-right:20px;
				padding:5px;
				border-radius:4px;
			}			
			.pqbcarrusel_link{
				display:block;
			}
			.pqbcarrusel_list{
				list-style:none;
			}
			.pqbcarrusel_list li{
				float:left;
			}
			.pqbcarrusel_wrapper .prev, .pqbcarrusel_wrapper .next{
				left: -20px;
				position: absolute;
				top: 50%;
			}
			.pqbcarrusel_wrapper .next{
				left:auto;
				right: -20px;
			}
' );
$document->addScript(JURI::base().'/modules/mod_pqbcarrusel/assets/jquery.carouFredSel-6.2.0-packed.js');
$document->addScript(JURI::base().'/modules/mod_pqbcarrusel/assets/helper-plugins/jquery.mousewheel.min.js');
$document->addScript(JURI::base().'/modules/mod_pqbcarrusel/assets/helper-plugins/jquery.transit.min.js');
$document->addScript(JURI::base().'/modules/mod_pqbcarrusel/assets/helper-plugins/jquery.ba-throttle-debounce.min.js');
?>
		<script type="text/javascript" language="javascript">
			jQuery(function() {
				jQuery('#pqbcarrusel_<?php echo $module->id;?>').carouFredSel({
					responsive:<?php echo $responsive?>,
					infinite: <?php echo $infinite?>,
					circular : <?php echo $circular?>,
					direction : '<?php echo $direction?>',
					<?php if($navigation==1){?>
					prev: '#prev_<?php echo $module->id;?>',
            		next: '#next_<?php echo $module->id;?>',
            		<?php }?>
					items: {
                        // width: 400,
                    	// height: '30%',  //  optionally resize item-height
                        visible: {
                            min: 2,
                            max: 5
                        }
                    },
                    scroll:{
                    	<?php if($items>0){?>items:<?php echo $items;?>,<?php }?>
                    	duration : <?php echo $duration?>,
                    },
					width   : '<?php echo $w?>',
					auto: {
						play: <?php echo $auto?>,
						<?php if($pauseonhover!=""){?>pauseOnHover:'<?php echo $pauseonhover;?>',<?php }?>
						timeoutDuration:1000
							}
					}, 
					{transition: false}					
				);
			});
		</script>
	<div class="pqbcarrusel_wrapper">
        	<?php 
        	if(count($paths)>0){
	        	echo '<ul class="pqbcarrusel_list" id="pqbcarrusel_'.$module->id.'">';
				foreach($paths as $key=>$filename){			
					$ext = pathinfo($filename, PATHINFO_EXTENSION);	
					if($ext=='jpg'||$ext=='jpeg'||$ext=='png'||$ext=='gif')  { 
						$href = (array_key_exists($key, $links)) ? $links[$key] : '';
						if($href!=""){							
							echo '<li><a '.$target.' class="pqbcarrusel_link" href="'.$href.'"><img src='.JURI::base().$filename.' /></a></li>';
						}else{
							echo '<li><img class="img-carousel" src='.JURI::base().$filename.' /></li>';						
						}
					}
				}
				echo '</ul>';
				if($navigation==1){
					echo '<div class="clearfix"></div>
		                <a id="prev_'.$module->id.'" class="prev" href="#">&laquo;</a>
		                <a id="next_'.$module->id.'" class="next" href="#">&raquo;</a>';
	            }
			}
			?>
    </div>