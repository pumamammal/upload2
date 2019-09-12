<?php
/**
 * @package     NA Core
 * @version     2.0
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

$configTopbar = str_replace('','',benko_topbar_config() );

?>
<div id="na-top-navbar" class="top-navbar <?php echo esc_attr($configTopbar);?>">
    <div class="container">
        <div class="row">
            <div class="topbar-left hidden-xs col-sm-6 col-md-6 clearfix">
                <?php if(is_active_sidebar( 'custom-topbar-left' )){
                        dynamic_sidebar('custom-topbar-left');
                    }?>
            </div>
            <div class="topbar-right col-xs-12 col-sm-6 col-md-6">
                    <div class="na-topbar clearfix ">
                        <nav id="na-top-navigation" class="collapse navbar-collapse container-inner">
                            <?php
                            if (has_nav_menu('top_navigation')) :
                                // Main Menu
                                wp_nav_menu( array(
                                    'theme_location' => 'top_navigation',
                                    'menu_class'     => 'nav navbar-nav na-menu',
                                    'container'      => '',
                                ) );
                            endif;
                            ?>
                        </nav>
                    </div>
            </div>
        </div>

    </div>
</div>