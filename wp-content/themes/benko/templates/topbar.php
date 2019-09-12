<?php
/**
 * @package     NA Core
 * @version     2.0
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
?>
<div id="benko-top-navbar" class="top-navbar">
    <div class="container">
        <div class="row">
            <div class="topbar-left col-xs-12 col-sm-6 col-md-6">
                <div class="na-topbar clearfix">
                    <?php
                    if(is_active_sidebar( 'topbar-left' )){
                        dynamic_sidebar('topbar-left');
                    }?>

                </div>
            </div>
            <div class="topbar-right hidden-xs col-sm-6 col-md-6 clearfix">
                <?php
                if(is_active_sidebar( 'topbar-right' )){
                    dynamic_sidebar('topbar-right');
                }?>
            </div>

        </div>
    </div>
</div>