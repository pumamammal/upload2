<?php if(get_theme_mod('benko_enable_footer', '1')) { ?>
    <footer id="na-footer" class="na-footer  footer-1">

        <!--    Footer center-->
        <?php  if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )){ ?>
            <!--    Footer center-->
            <div class="footer-center clearfix">
                <div class="container">
                    <div class="container-inner">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>

        <!--    Footer bottom-->
        <div class="footer-bottom clearfix">
            <div class="container">
                <div class="container-inner">
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="coppy-right">
                                <?php if(get_theme_mod('benko_copyright_text')) {?>
                                    <span><?php echo  wp_kses_post(get_theme_mod('benko_copyright_text'));?></span>
                                <?php } else {
                                    echo '<span>'.esc_html('Copyrights &copy;','benko').' '.date("Y").'<a href="'.esc_url('http://benko.nanoagency.co').'">'.esc_html('  Benko Theme. ','benko').'</a>'.esc_html(' All Rights Reserved.','benko').'</span>';
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 footer-bottom-right">
                            <?php dynamic_sidebar('copy-right'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </footer><!-- .site-footer -->
<?php } ?>
