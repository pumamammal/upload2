<?php
/**
 * The template for displaying the footer
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
?>
        </div><!-- .site-content -->
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
            $layout_footer = '';
            if(is_page() || is_single() || is_front_page()){
                $layout_footer = get_post_meta($post->ID, 'layout_footer', true);
            }
            if($layout_footer == 'global' || empty($layout_footer)){
                get_template_part('templates/footer/footer', get_theme_mod('benko_footer', '1'));
            }
            else{
                get_template_part('templates/footer/footer', $layout_footer);
            }
        ?>
    </div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>