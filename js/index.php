<?php
/*
 *  @template       fomantic based 605 template
<?php
/**
 *  @template       Semantic based 600 template
 *  @version        see info.php of this template
 *  @author         Gerard Smelt
 *  @copyright      2014-2019 ContractHulp
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

/* history template engine office605
 * 20191028 include the full screen image pages  
 */
//Selecting the corrrect template if not default
/* ------------- fill out the page types per page id (if not the default template---------------- */
$template_foot = true; // add footer can not be combined with $template_full 
$template_follow = "index, follow"; // behaviour instruction SEO crawler
$template_full = false; // full size 4 page picture set-up 
$template_right = false; // template with left and right column can not be combined with $template_full
// twigg templates are not yet used
switch (PAGE_ID ) {
	case 1: //template_file = "land.lte";
		break;
	case 101: //template_file = "center.lte";
		$template_foot = false;
		break;
	case 102: //template_file = "full.lte";
		$template_full = true;
		$template_foot = false;
		break;		
	case 103: //template_file = "center.lte";
		$template_follow = "noindex, nofollow";
		$template_foot = false;
		break;		
	default: //template_file = "right.lte"; // default appearance
		$template_right = true;
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
	<meta name='robots' content='index, follow'>
	<meta name='language' content='NL'>
<!-- javascripts jQuery  and fomantic-ui and style sheets-->	
	<link rel='shortcut icon' type='image/x-icon' href='<?php echo TEMPLATE_DIR;?>/img/favicon.ico'>		
	<script type='text/javascript' src='<?php echo LEPTON_URL; ?>/modules/lib_jquery/jquery-core/jquery-core.min.js' ></script>
	<script type='text/javascript' src='<?php echo LEPTON_URL; ?>/modules/lib_jquery/jquery-core/jquery-migrate.min.js' ></script>
	<script type='text/javascript' src='<?php echo LEPTON_URL; ?>/modules/lib_fomantic/dist/semantic.min.js' ></script>
	<script type='text/javascript' src='<?php echo TEMPLATE_DIR; ?>/js/functionality.js' ></script>
<?php if ($template_full) {	
		echo "<script type='text/javascript' src='" . TEMPLATE_DIR ."/js/full/jquery.fullPage.min.js' ></script> ";
		echo "<script type='text/javascript' src='" . TEMPLATE_DIR ."/js/main.js' ></script>";
		echo "<link rel='stylesheet' type='text/css' href='='" . TEMPLATE_DIR ."/css/full/jquery.fullPage.css' />";
	}?>		
	<link rel='stylesheet' type='text/css' href='<?php echo LEPTON_URL; ?>/modules/lib_fomantic/dist/semantic.min.css' media='screen,projection' />
	<link rel='stylesheet' type='text/css' href='<?php echo TEMPLATE_DIR; ?>/css/styles.css' media='screen,projection' />
	<link rel='stylesheet' type='text/css' href='<?php echo TEMPLATE_DIR; ?>/css/print.css' media='print' />	
<!-- Begin specific functionality -->
    <?php get_page_headers(); ?>
	[[site-cookie]]
</head>
<body id='605' class='basic minimal' >  <!-- begin remove after testing - -  ontouchstart="" oncontextmenu="return false" ondragstart="return false" onselectstart="return false" > - - end remove after testing -->
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
      <?php show_menu2(3, SM2_ROOT, SM2_START, SM2_ALL|SM2_PRETTY, '<a href="[url]" target="[target]" class="item">[menu_title]</a>', ' '); ?>
    </div>
  </div>
  <div class="item">
  <!-- Main Menu  footer menu -->
    <div class="header">Overige</div>
    <div class="menu">
      <?php show_menu2( 2, SM2_ROOT, SM2_START, SM2_ALL|SM2_PRETTY, '<a href="[url]" target="[target]" class="item">[menu_title]</a>', ' '); ?>
    </div>
  </div>
  <div class="item">
    <a href="[wblink2]"><b>Copyright 2016-[[year]]</b></a>
  </div>
  <div class="item">
	<a href="http://www.contracthulp.nl" target="_blank" >Powered by <span style="font: normal 16px impact,chicago; color: #ff0000; ">ContractHulp</span></a>
  </div>
  <div class="item">
    [[Gsm_login?pos=left&kleur=black]]
  </div> 
</div>

<!-- Page Contents -->
<div class="pusher">
	<div id="header">
		<div id="hwrap" class="ui fixed container">
			<div class="ui small secondary pointing menu">
				<div class="left menu">
					<a class="toc item">
						<div class="blue ui icon button" > <i class="content icon"></i> <?php echo WEBSITE_HEADER; ?></div>
					</a>
				</div>
<!-- vervang SM2_start door SM2_ALL als nodig -->
				<div id="main-navigation">
					<?php show_menu2( 1, SM2_ROOT, SM2_START, SM2_ALL|SM2_NUMCLASS|SM2_PRETTY); ?>
				</div>
<!-- activate multilanguage begin multi lingual - - <div class="right menu"><button class="ui button"><?php echo easymultilang_menu(); ?></button></div> 
- - eind multi lingual -->
				<div class="right menu">[[Gsm_login]]</div>
			</div>
		</div>
	</div>
	
<?php if ($template_full) {  // full page
		echo '<div id="fullpage">
			<div class="section active" id="section0"> 
			<div class="layer"><div class="ui container">';
		page_content(1);
		echo '</div></div></div>
			<div class="section" id="section1">
			<div class="layer"><div class="ui container">';
		page_content(2);
		echo '</div></div></div>
			<div class="section" id="section2">
			<div class="layer"><div class="ui container">';
		page_content(3);
		echo '</div></div></div>
			<div class="section" id="section3">
			<div class="layer"><div class="ui container">';
		page_content(4);
		echo '</div></div></div></div>';
	} else {   // not full page
		echo '<div id="main1">';
		page_content(1);
		echo '</div>';
		if ($template_right) {  // two and 3 next to each other
			echo '<div  id="main2" class="ui vertical stripe basic segment"> 
				<div class="ui stackable grid container">
				<div class="row">
				<div class="twelve wide column">';
			page_content(2);
			echo '</div><div id="main3" class="four wide column">';
			page_content(3);
			echo '</div></div></div></div>';
		} else { // two and 3 next on top
			echo '<div id="main2" class="ui container">';
			page_content(2);
			echo '</div><div id="main3" >';
			page_content(3);
			echo '</div>';
		} 
		echo '<div id="main4" class="ui container">';
		page_content(4);
		echo '</div>';
	}?>
	
<?php if ($template_foot){	// footer
		echo '<div  id="main5" class="ui vertical stripe segment">
			<div class="ui stackable grid container">
			<div class="row">
			<div class="ten wide column">';
		page_content(5);
		echo '<div class="ui stackable grid container">
			<div class="eight wide column">
			<h3>Menu</h3>
			<div class="menu">';
		show_menu2( 1, SM2_ROOT, SM2_START, SM2_ALL|SM2_PRETTY, '<a href="[url]" target="[target]" class="itemb">[menu_title]</a><br/>', ' ');
		echo '</div></div>
			<div class="eight wide column">
			<h3>Links</h3>
			<div class="menu">';
		show_menu2(3, SM2_ROOT, SM2_START, SM2_ALL|SM2_PRETTY, '<a href="[url]" target="[target]" class="itemb">[menu_title]</a><br/>', ' ');
		echo '</div></div></div></div>';
		echo '<div id="main6" class="six wide column">';
		page_content(6);
		echo '<h3>'.WEBSITE_FOOTER;
		/* pas aan het jaartal link kan vervangen worden door image */
		echo '</h3><a class="raam" href="[wblink2]" >
			<i class="copyright icon"></i> 2016-[[year]]<br />
			[[Gsm_ref?blocks=0]]<br />
			<i class="mail icon"></i> [[Gsm_ref?blocks=2]]<br />
			<i class="call icon"></i> [[Gsm_ref?blocks=3]]
			</a></div></div></div></div>';
	} ?>	
	
</div>
<?php get_page_footers(); ?>
</body>
</html>