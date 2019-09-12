<?php
/**
 * The template for displaying the header
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
	<meta name="propeller" content="c77e94d3ecd3c4ff42775928f7e64493">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="wrapper site">
    <div class="canvas-overlay"></div>
    <?php
    $layout_header = '';
    if(is_active_sidebar( 'header-top')){?>
        <div class="header-top">
            <?php dynamic_sidebar('header-top');?>
        </div>
    <?php }
    if(is_page()){
        $layout_header = get_post_meta($post->ID, 'layout_header', true);
    }
    if($layout_header == 'global' || empty($layout_header)){
        get_template_part('templates/header/header', get_theme_mod('benko_header', 'simple'));
    }
    else{
        get_template_part('templates/header/header', $layout_header);
    }
    ?>
	<div align="center">
		

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Billboarde -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:250px"
     data-ad-client="ca-pub-4876469280300711"
     data-ad-slot="6485966898"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>	
	</div>
	<div id="content" class="site-content">