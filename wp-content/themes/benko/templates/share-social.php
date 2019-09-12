<?php
$share_facebook     = get_theme_mod('benko_share_facebook',false);
$share_twitter      = get_theme_mod('benko_share_twitter',false);
$share_google       = get_theme_mod('benko_share_google',false);
$share_linkedin     = get_theme_mod('benko_share_linkedin',false);
$share_pinterest    = get_theme_mod('benko_share_pinterest',false);
$share_whatsapp    = get_theme_mod('benko_share_whatsapp',false);
?>
<?php if($share_facebook || $share_twitter || $share_pinterest ):?>
<div class="social share-links clearfix">
    <ul class="social-icons list-unstyled list-inline">
        <?php if ($share_facebook):?>
        <li class="social-item facebook">
            <a href="//www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="<?php echo esc_attr('facebook'); ?>" class="post_share_facebook facebook" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        <?php endif; ?>
        <?php if ($share_twitter):?>
        <li class="social-item twitter">
            <a href="//twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo the_title();?>&via=<?php echo esc_attr(get_the_author());?>" title="<?php echo esc_attr('twitter'); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="product_share_twitter twitter">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
        <?php endif; ?>
        <?php if ($share_google):?>
        <li class="social-item google">
            <a href="//plus.google.com/share?url=<?php the_permalink(); ?>" class="googleplus" title="<?php echo esc_attr('google +'); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <i class="fa fa-google-plus"></i>
            </a>
        </li>
        <?php endif; ?>
        <?php if ($share_linkedin):?>
        <li class="social-item linkedin">
            <a href="//www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php echo esc_attr('pinterest'); ?>&summary=<?php echo get_the_title(); ?>&source=<?php echo get_the_title(); ?>">
                <i class="fa fa-linkedin"></i>
            </a>
        </li>
        <?php endif; ?>
        <?php if ($share_pinterest):?>
            <li class="social-item pinterest">
                <a href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if(function_exists('the_post_thumbnail')) echo wp_get_attachment_url(get_post_thumbnail_id()); ?>&description=<?php echo get_the_title(); ?>" title="<?php echo esc_attr('pinterest'); ?>" class="pinterest">
                    <i class="fa fa-pinterest"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($share_whatsapp):?>
            <li class="social-item whatsapp">
                <a href="whatsapp://send?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share">
                    <i class="fa fa-whatsapp"></i>
                </a>
            </li>
        <?php endif; ?>

    </ul>
</div>
<?php endif; ?>