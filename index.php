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

/* history template engine  
 * 20200715 larger character size
 * 20201208 initial version based on office 607 template
 
 */
//Selecting the corrrect template combi if not default
/* -----		the default values					------- */
$template_foot 	= true; 	// footer present
$template_follow = "index, follow"; 	// behaviour instruction for SEO crawler
$template_right = true; 	// template with left and right column
$template_css 	= "/css/styles.css";	// default css template
$template_img 	= 1; 	// image number if 0 content(6) is to describe the header
/* -----		fill out the page types per page id ------- */
switch (PAGE_ID ) {
	case 100: //landing page: full width intro image in the page 
		$template_right = false;
		$template_img = 0; 
		break;
	case 101: //template_file = "center.lte";
		$template_right = false;
		$template_foot = false;
		break;
	case 102: // no follow no footer
		$template_right = false;
		$template_follow = "noindex, nofollow";
		$template_foot = false;
		break;
	case 103: // default with other CSS;
		$template_css = "/css/styles1.css";
		break;
	case 104: // default with other different image;
		$template_img = 2;
		break;
	default: // default appearance
		break;
}
?>
<!DOCTYPE HTML>
<html>
  <head>
<!-- Meta data -->	
  	<meta http-equiv='Content-Type' content='text/html; charset=<?php echo DEFAULT_CHARSET; ?>' />
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
	<meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0'>

<!-- Application specific -->	
	<title><?php page_title(); ?></title>  
	<meta name='description' content='<?php page_description(); ?>' />
	<meta name='keywords' content='<?php page_keywords(); ?>' />
	<meta name='robots' content='<?php echo $template_follow; ?>'>
	<meta name='language' content='<?php echo LANGUAGE; ?>'>

<!-- javascripts jQuery  and fomantic-ui and style sheets-->	
	<link rel='shortcut icon' type='image/x-icon' href='<?php echo TEMPLATE_DIR;?>/img/favicon.ico'>		
	<script type='text/javascript' src='<?php echo LEPTON_URL; ?>/modules/lib_jquery/jquery-core/jquery-core.min.js' ></script>
	<script type='text/javascript' src='<?php echo LEPTON_URL; ?>/modules/lib_jquery/jquery-core/jquery-migrate.min.js' ></script>
	<script type='text/javascript' src='<?php echo LEPTON_URL; ?>/modules/lib_fomantic/dist/semantic.min.js' ></script>
	<script type='text/javascript' src='<?php echo TEMPLATE_DIR; ?>/js/functionality.js' ></script>	

	<link rel='stylesheet' type='text/css' href='<?php echo LEPTON_URL; ?>/modules/lib_fomantic/dist/semantic.min.css' media='screen, projection, print' />
	<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel="stylesheet" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic' rel="stylesheet" type="text/css" media="screen, print" />
<!--<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_DIR; ?>/css/navigation.css" media="screen" /> add this line for navigation-->	
	<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_DIR.$template_css; ?>" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_DIR; ?>/css/print.css" media="print" />

<!-- Begin specific functionality -->
    <?php get_page_headers(); ?>

<!-- Begin cookie functionality -->
	[[site-cookie]]
</head>

<body id='tegels' class='basic minimal' >  <!-- begin remove after testing - -  ontouchstart="" oncontextmenu="return false" ondragstart="return false" onselectstart="return false" > - - end remove after testing -->
<!-- Sidebar Menu -->
<div class="ui inverted vertical sidebar menu">
<!-- Main Menu level 1 -->
  <div class="item">
    <a href="/"><b>Menu</b></a>
    <a class="ui logo icon image" href="[wblink1]"><img src="<?php echo TEMPLATE_DIR; ?>/img/logo.png"></a>
    <div class="menu">
       <?php show_menu2( 1, SM2_ROOT, SM2_ALL, SM2_ALL|SM2_PRETTY, '<a href="[url]" target="[target]" class="item">[menu_title]</a>', ' '); ?>
    </div>
  </div>
  <div class="item">
<!-- Main Menu pseudomenu -->
    <div class="header">Links</div>
    <div class="menu">
      <?php show_menu2(2, SM2_ROOT, SM2_START, SM2_ALL|SM2_PRETTY, '<a href="[url]" target="[target]" class="item">[menu_title]</a>', ' '); ?>
    </div>
  </div>
  <div class="item">
  <!-- Main Menu  footer menu -->
    <div class="header">--</div>
    <div class="menu">
      <?php show_menu2( 3, SM2_ROOT, SM2_START, SM2_ALL|SM2_PRETTY, '<a href="[url]" target="[target]" class="item">[menu_title]</a>', ' '); ?>
    </div>
  </div>
  <div class="item">
    <a href="[wblink2]"><b>Copyright 2015-[[year]]</b></a>
  </div>
  <div class="item">
    [[Gsm_login?pos=left&kleur=black]]
  </div> 
</div>

<!-- Page Contents -->
<div class="pusher">
	<div id="header">
		<div id="hwrap" class="ui fixed container">
			<div class="ui inverted secondary pointing menu">
				<div class="left menu">
					<a class="toc item">
						<div class="blue ui icon button" > <i class="content icon"></i> <?php echo WEBSITE_HEADER; ?></div>
					</a>
				</div>
					<div id="main-navigation">
						<?php show_menu2( 1, SM2_ROOT, SM2_START, SM2_ALL|SM2_NUMCLASS|SM2_PRETTY); ?>
					</div>
				<div class="right menu">
<!-- activate facebook - - <a href="http://www.facebook.com/Mibadranken" target="_blank" class="icon" title="Volg ons via Facebook"> <div class="blue ui icon button" > <i class="facebook icon"></i> </div> </a> - - eind facebook button -->	
<!-- multilanguage - - <button class="ui button"><?php echo easymultilang_menu(); ?></button>- - eind multi lingual -->
<!-- login button - - <button class="ui button"><div class="right menu">[[Gsm_login]]</div> - - eind login button -->
<!-- bestel button - - <div class="right menu">[[Gsm_bestel]]</div> - - eind bestel button -->
				</div>
			</div>
		</div>
	</div>
<?php 
	echo '<div id="main1">';
	if( $template_img == 0 ) {
		page_content(6); 
	} else { 
		echo '<div class="full height image'.$template_img.'">
			<p> </p>
			<p> </p>
			<div class="ui horizontal segments">
				<div class="ui basic segment">
					<div class="ui grid">
						<div class="five wide right aligned column"><img src="'.TEMPLATE_DIR.'/img/company.png" height="200" /></div>
						<!-- <div class="five wide left aligned column"><h3 class="ui header"><br /><i class="download icon"></i><div class="content">'.WEBSITE_FOOTER.'<div class="sub header">--</div></div></h3></div> -->
						<div class="eleven wide right aligned column">[[Gsm_title]]</div>
		</div></div></div></div>';
	}
	echo '</div>';
	if ($template_right) {  // 1 and 2 next to each other
		echo '<div  id="main2" class="ui vertical stripe basic segment"> 
			<div class="ui stackable grid container">
			<div class="row">
			<div class="twelve wide column">';
		page_content(1);
		echo '</div><div id="main3" class="four wide column">';
		page_content(2);
		echo '</div></div></div></div>';
	} else { // 1 and 2 next on top
		echo '<div id="main2" class="ui container">';
		page_content(1);
		echo '</div><div id="main3" >';
		page_content(2);
		echo '</div>';
	} 
	echo '<div id="main4"  class="ui container">';
	page_content(3);
	echo '</div>';
	if ($template_foot){	// footer
		echo '<div  id="main5" class="ui vertical stripe segment">
			<div class="ui stackable grid container">
			<div class="row">
			<div class="ten wide column">';
		page_content(4);
		echo '<div class="ui stackable grid container">
			<div class="eight wide column">
			<h3>Menu</h3>
			<div class="menu">';
		show_menu2( 1, SM2_ROOT, SM2_START, SM2_ALL|SM2_PRETTY, '<a href="[url]" target="[target]" class="itemb">[menu_title]</a><br/>', ' ');
		echo '</div></div>
			<div class="eight wide column">
			<h3>Links</h3>
			<div class="menu">';
		show_menu2(2, SM2_ROOT, SM2_START, SM2_ALL|SM2_PRETTY, '<a href="[url]" target="[target]" class="itemb">[menu_title]</a><br/>', ' ');
		echo '</div></div></div></div>';
		echo '<div id="main6" class="six wide column">';
		page_content(5);	
		/* pas aan het jaartal*/
		echo '<a class="item" href="[wblink2]" ><h3>'.WEBSITE_FOOTER.'</h3></a><br />
			<button class="ui tertiary button"><a href="[wblink2]" target="_top" class="item" title="Over ons"><i class="copyright icon"></i> 2015-[[year]] 
			[[Gsm_ref?blocks=0]]</a></button><br />
			<button class="ui tertiary button"><a href="[wblink3]" target="_top" class="item" title="mail naar [[Gsm_ref?blocks=2]]"><i class="mail icon"></i> [[Gsm_ref?blocks=2]]</a></button><br />
			<button class="ui tertiary button"><a href="[wblink4]" target="_top" class="item" title="[[Gsm_ref?blocks=3]] bel terug"><i class="call icon"></i> [[Gsm_ref?blocks=3]]</a></button><br /> 
			<button class="ui tertiary button"><a href="http://www.facebook.com/ContractHulp" target="_top" class="item" title="Volg ons via Facebook"><i class="facebook icon"></i>Volg ons via Facebook</a></button>';
		echo '</div></div></div></div>';
	} 
?>
</div>
<?php get_page_footers(); ?>
</body>
</html>