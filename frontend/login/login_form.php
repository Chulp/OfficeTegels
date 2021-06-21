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


/* Include template engine */
$oTWIG = lib_twig_box::getInstance();

// register path to make sure twig is looking in this module template folder first
$oTWIG->registerPath( dirname(__FILE__)."/templates/" );

$thisApp = LEPTON_login::getInstance();

/**
 *	Building a secure-hash
 *
 */
$hash = sha1( microtime().$_SERVER['HTTP_USER_AGENT'] );
$_SESSION['wb_apf_hash'] = $hash;

$salt = md5(microtime());
/**
 *	we want different hashes for the two fields
 *
 */
$username_fieldname = 'username_'.substr($salt, 0, 7);
$password_fieldname = 'password_'.substr($salt, -7);

$data = array(
	'LOGIN_URL'		=>	LOGIN_URL,
	'LOGOUT_URL'	=>	LOGOUT_URL,
	'FORGOT_URL'	=>	FORGOT_URL,  
	'MESSAGE'		=>	$thisApp->message, 
	'signup_message'=> (isset($_SESSION["signup_message"]) ? $_SESSION["signup_message"] : ''),	
	'REDIRECT_URL'	=>	$thisApp->redirect_url,   
	'HASH'			=>	$hash,
    'username_fieldname'    => $username_fieldname,
    'password_fieldname'    => $password_fieldname
);
			
echo $oTWIG->render("login_form.lte", $data);
		
if (isset($_SESSION["signup_message"])) unset ($_SESSION["signup_message"]);
if (isset($_SESSION["result_message"])) unset ($_SESSION["result_message"]);		
?>