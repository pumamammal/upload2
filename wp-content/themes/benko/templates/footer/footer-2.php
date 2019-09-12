<?php if(get_theme_mod('benko_enable_footer', '1')) { ?>
    <footer id="na-footer" class="na-footer  footer-2">
        <!--    Footer top-->
        <?php if(is_active_sidebar( 'footer-top' )): ?>
            <div class="footer-top clearfix">
                <div class="rows">
                    <div class="footer-top-inner">
                        <?php dynamic_sidebar('footer-top'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--    Footer bottom-->
        <div class="footer-bottom clearfix">
            <div class="container">
                <div class="container-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="coppy-right">
                                <?php if(get_theme_mod('benko_copyright_text')) {?>
                                    <span><?php echo  wp_kses_post(get_theme_mod('benko_copyright_text'));?></span>
                                <?php } else {
                                    echo '<span>'.esc_html('Copyrights &copy;','benko').' '.date("Y").'<a href="'.esc_url('http://benko.nanoagency.co').'">'.esc_html('  benko Theme. ','benko').'</a>'.esc_html(' All Rights Reserved.','benko').'</span>';
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 footer-bottom-left">
                            <?php dynamic_sidebar('copy-right'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer><!-- .site-footer -->

<?php } ?>
