<?php
/**
 *  @template       fomantic based OfficeTegels template
 *  @version        see info.php of this template
 *  @author         Gerard Smelt
 *  @copyright      2014-2021 ContractHulp
 *  @license        http://creativecommons.org/licenses/by/3.0/
 *  @license terms  see info.php of this template
 *  @platform       see info.php of this template
 */

// include class.secure.php to protect this file and the whole CMS!
if ( defined( 'LEPTON_PATH' ) ){ include( LEPTON_PATH . '/framework/class.secure.php' );
} else {
  $oneback = "../";
  $root    = $oneback;
  $level   = 1;
  while ( ( $level < 10 ) && ( !file_exists( $root . '/framework/class.secure.php' ) ) ) {
    $root .= $oneback;
    $level += 1; } 
  if ( file_exists( $root . '/framework/class.secure.php' ) ) { include( $root . '/framework/class.secure.php' );
  } else { trigger_error( sprintf( "[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER[ 'SCRIPT_NAME' ] ), E_USER_ERROR ); }
}
// end include class.secure.php

// OBLIGATORY VARIABLES
$template_directory     = 'officetegels';
$template_name          = 'OfficeTegels';
$template_function      = 'template';
$template_version       = '1.0.0';
$template_platform 		= 'Lepton 5.0.0'; //tested on this platform, assumed to be suitable from 4.3.0 onwards
$template_author		= 'Gerard Smelt/ContractHulp see <a href="https://www.contracthulp.nl" target="_blank"> ContractHulp </a>' ;
$template_license		= 'GNU General Public License v2 or later';
$template_license_terms	= 'Available as is, no support';
$template_description   = 'Main menu template based on <a href="https://fomantic-ui.com/" target="_blank">FOMANTIC ( a semantic clone) and news/anynews </a>'; 
$template_guid          = '6938100C-1AF7-41E2-A815-71BC06AC54C5';

// some specific other modules are needed anynews
// some specific droplets which come with the gsmofft package.

// OPTIONAL VARIABLES
  $menu[1] = 'Main';  // main menu in header
  $menu[2] = 'Foot'; // menu in the footer
  $menu[3] = 'Pseudomenu'; // menu provided in side menu
  
  $block[1] = 'Content1'; // main 1 main container
  $block[2] = 'Content2'; // main 2 right column
  $block[3] = 'Content3'; // main 3 wide column
  $block[4] = 'Content4'; // main 4 footer left column
  $block[5] = 'Content5'; // main 5 footer right column
  $block[6] = 'Content6'; // Intro meu / picture
?>