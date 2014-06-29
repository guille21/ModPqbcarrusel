<?php
/*------------------------------------------------------------------------
# mod_pqbcarrusel.php(module)
# ------------------------------------------------------------------------
# version		1.0.0
# author    	Guillermo
# copyright 	Copyright (c) 2011 Top Position All rights reserved.
# @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website		http://mastermarketingdigital.org/open-source-joomla-extensions

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
$document = JFactory::getDocument();
require(JModuleHelper::getLayoutPath('mod_pqbcarrusel', $params->get('layout', 'default')));

?>