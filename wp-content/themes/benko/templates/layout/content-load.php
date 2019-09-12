<?php
/**
 * The default template for displaying content
 *
 * @author      Nanobenko
 * @link        http://nanobenko.co
 * @copyright   Copyright (c) 2015 Nanobenko
 * @license     GPL v2
 */

$format         = get_post_format();
$layout         = get_theme_mod('benko_readmore_layout','list');
$number         = get_theme_mod('benko_readmore_show',6);
$content        = get_theme_mod('benko_readmore_content',false);
$meta           = get_theme_mod('benko_readmore_meta',false);
$show_cats      = get_theme_mod('benko_readmore_view_cats',true);

$cat='';
if(get_theme_mod('benko_readmore_cat')) {
    $cat = implode(',', get_theme_mod('benko_readmore_cat'));
}
//layout
if(isset($_GET['layout'])){
    $layout=$_GET['layout'];
}

//class for option columns.
$class = 'col-xs-12';
if($layout == 'grid'){
    $class='col-xs-12 col-sm-6';
}

$view_more = 'hidden-description';
if ($content){
    $view_more = 'show-description';
}

$view_meta = 'hidden-meta';
if ($meta){
    $view_meta = 'show-meta';
}

$view_cats = 'hidden-cate';
if ($show_cats){
    $view_cats = 'show-cate';
}


$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
    'category_name'       => $cat,
    'posts_per_page'      =>($number > 0) ? $number : get_option('posts_per_page')
);
$args['paged'] = (nano_get_query_var('paged')) ? nano_get_query_var('paged') : 1;
$the_query = new WP_Query($args);
$number_pages = $the_query->max_num_pages;

$i=1;
?>

<div class="<?php echo 'wrapper-posts box-recent box-single-recent type-loadMore layout-' . esc_attr($layout); ?>"
     data-layout="<?php echo esc_attr($layout);?>"
     data-paged="<?php echo esc_attr($number_pages);?>"
     data-col="<?php echo esc_attr($class);?>"
     data-cat="<?php echo esc_attr($cat)?>"
     data-number="<?php echo esc_attr($number)?>"
     data-ads="">
    <span class="agr-loading"></span>
    <div class="tab-content">
        <div id="allCat" class="archive-blog affect-isotopes row active <?php echo esc_attr($view_more);?> <?php echo esc_attr($view_meta);?> <?php echo esc_attr($view_cats);?>">
            <?php if($layout == 'grid'){?>
                <?php if ($the_query->have_posts()):
                    while ($the_query->have_posts()): $the_query->the_post(); ?>
                        <div class="col-item col-xs-12 col-sm-6 ">
                            <?php get_template_part('templates/layout/content-grid');?>
                        </div>

                    <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            <?php }
            else{
                if ($the_query->have_posts()):
                    while ($the_query->have_posts()): $the_query->the_post(); ?>

                        <div class="col-item col-xs-12 col-1">
                            <?php get_template_part('templates/layout/content-list');?>
                        </div>

                        <?php $i++; endwhile;
                endif;
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>

    <?php //paging
    if (get_theme_mod('benko_readmore_btn',true)):?>
        <span id="loadMore" class="button">
            <?php esc_html_e('Load More','benko');?>
        </span>
    <?php
    endif;
    ?>
</div>
