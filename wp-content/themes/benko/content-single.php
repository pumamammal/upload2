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
<?php
/**
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

$benko_content_single   = get_theme_mod('benko_ads_single_comment',false);
?>

    <?php //author
    if ( '' !== get_the_author_meta( 'description' ) ) {?>
        <div class="box box-author">
            <?php get_template_part('templates/about_author');?>
        </div>
    <?php } ?>

    <?php //comments
    if(get_theme_mod('benko_comments',true)) {
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    }
    ?>

    <?php //advertising
    if($benko_content_single) {?>
        <div class="advertising_content_single">
            <?php echo wp_kses_post(get_theme_mod('benko_ads_leaderboard'));?>
        </div>
    <?php }?>

    <?php //related
    if(get_theme_mod('benko_related',true)) {
        get_template_part('templates/related_posts');
    }
    ?>

    <?php  //read more
    if(get_theme_mod('benko_readmore_box')) {
        get_template_part('templates/layout/content-load');
    }
    ?>

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<?php  benko_zoom_image(); ?>
