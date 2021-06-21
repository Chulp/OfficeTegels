<?php

/**
 *  @template       Semantic
 *  @version        see info.php of this template
 *  @author         cms-lab
 *  @copyright      2014-2020 CMS-LAB
 *  @license        http://creativecommons.org/licenses/by/3.0/
 *  @license terms  see info.php of this template
 *  @platform       see info.php of this template
 */

// include class.secure.php to protect this file and the whole CMS!
if ( defined( 'LEPTON_PATH' ) )
{
    include( LEPTON_PATH . '/framework/class.secure.php' );
} 
else
{
    $oneback = "../";
    $root    = $oneback;
    $level   = 1;
    while ( ( $level < 10 ) && ( !file_exists( $root . '/framework/class.secure.php' ) ) )
    {
        $root .= $oneback;
        $level += 1;
    } 
    if ( file_exists( $root . '/framework/class.secure.php' ) )
    {
        include( $root . '/framework/class.secure.php' );
    } 
    else
    {
        trigger_error( sprintf( "[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER[ 'SCRIPT_NAME' ] ), E_USER_ERROR );
    }
}
// end include class.secure.php

// initialize twig template engine
$oTWIG = lib_twig_box::getInstance();
$oTWIG->registerPath( dirname(__FILE__)."/templates/"  );

/**	*********
 *	languages
 *
 */
$languages = array();
$database->execute_query( 
	"SELECT `directory`,`name` from `".TABLE_PREFIX."addons` where `type`='language'",
 	true,
 	$languages,
 	true
);

if ($database->is_error()) die ( LEPTON_tools::display( $database->get_error()) );

$language = array();
foreach($languages as $data)
{
	$language[] = array(
		'LANG_CODE' 	=>	$data['directory'],
		'LANG_NAME'		=>	$data['name'],
		'LANG_SELECTED'	=> (LANGUAGE == $data['directory']) ? " selected='selected'" : ""
	);
}

/**	****************
 *	default timezone
 *
 */
$timezone_table = LEPTON_basics::get_timezones();
$timezone = array();
foreach ($timezone_table as $title)
{
	$timezone[] = array(
		'TIMEZONE_NAME' => $title,
		'TIMEZONE_SELECTED' => ($oLEPTON->get_timezone_string() == $title) ? ' selected="selected"' : ''
	);
}

/**	***********
 *	date format
 */

$date_format = array();
$user_time = true;
$DATE_FORMATS =  LEPTON_basics::get_dateformats();
foreach($DATE_FORMATS AS $format => $title) {

	$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)
	
	$value = ($format != 'system_default') ? $format : "";

	if(DATE_FORMAT == $format AND !isset($_SESSION['USE_DEFAULT_DATE_FORMAT'])) {
		$sel = "selected='selected'";
	} elseif($format == 'system_default' AND isset($_SESSION['USE_DEFAULT_DATE_FORMAT'])) {
		$sel = "selected='selected'";
	} else {
		$sel = '';	
	}			
	$date_format[] = array(
		'DATE_FORMAT_VALUE'	=>	$value,
		'DATE_FORMAT_TITLE'	=>	$title,
		'DATE_FORMAT_SELECTED' => $sel
	);

}

/**	***********
 *	time format
 */
$time_format = array();

$TIME_FORMATS =  LEPTON_basics::get_timeformats();
foreach($TIME_FORMATS AS $format => $title) {
	$format = str_replace('|', ' ', $format); // Add's white-spaces (not able to be stored in array key)

	$value = ($format != 'system_default') ? $format : "";

	if(TIME_FORMAT == $format AND !isset($_SESSION['USE_DEFAULT_TIME_FORMAT'])) {
		$sel = "selected='selected'";	
	} elseif($format == 'system_default' AND isset($_SESSION['USE_DEFAULT_TIME_FORMAT'])) {
		$sel = "selected='selected'";
	} else {
		$sel = '';
	}			
	$time_format[] = array(
		'TIME_FORMAT_VALUE'	=>	$value,
		'TIME_FORMAT_TITLE'	=>	$title,
		'TIME_FORMAT_SELECTED' => $sel
	);
}

/**
 *	Build an access-preferences-from secure hash
 */
if(!function_exists("random_string")) require_once( LEPTON_PATH."/framework/functions/function.random_string.php");
$hash = sha1( microtime().$_SERVER['HTTP_USER_AGENT'].random_string( 32 ) );
$_SESSION['wb_apf_hash'] = $hash;

/**
 *	Delete any "result_message" if there is one.
 */
if( true === isset($_SESSION['result_message']) ) unset($_SESSION['result_message']);

$data = array(
	'TEMPLATE_DIR' 				=>	TEMPLATE_DIR,
	'PREFERENCES_URL'			=>	PREFERENCES_URL,
	'LOGOUT_URL'				=>	LOGOUT_URL,
	'DISPLAY_NAME'				=>	$oLEPTON->get_display_name(),
	'GET_EMAIL'					=>	$oLEPTON->get_email(),
	'USER_ID'					=>	(isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : '-1'),
	'r_time'					=>	TIME(),
	'HASH'						=>	$hash,
	'RESULT_MESSAGE'			=> (isset($_SESSION['result_message'])) ? $_SESSION['result_message'] : "",
	'AUTH_MIN_LOGIN_LENGTH'		=> AUTH_MIN_LOGIN_LENGTH,
	'language'	=> $language,
	'timezone'	=> $timezone,
	'date_format' => $date_format,
	'time_format' => $time_format	
);

echo $oTWIG->render("preferences_form.lte", $data);		

?>