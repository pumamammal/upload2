<?php
/**
 * The default template for displaying content
 *
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */

$format = get_post_format();

//number word content
$number_word = get_theme_mod('benko_number_content_post','25');

?>
<article  <?php post_class('post-item post-text clearfix'); ?>>
    <div class="article-content">
        <div class="entry-header clearfix">
            <header class="entry-header-title">
                <?php
                the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
                ?>
            </header>
        </div>
        <div class="article-meta clearfix">
            <?php benko_entry_meta(); ?>
        </div>
    </div>
</article><!-- #post-## -->
