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
$add_class=$class='';
$args = array(
    'category_name'  => $atts['category_name'],
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $atts['number_post'],
);


if( $atts['type_post'] == 'featured' ){
    $meta_query[] = array(
        'key' => '_featured',
        'value' => 'yes'
    );
    $args['meta_query'] = $meta_query;
}

$arr2=array();
if( $atts['type_post'] == 'views' ){
    $arr2 = array(
        'meta_key'      => 'post_views_count',
        'orderby'       =>'meta_value_num',
        'order'         =>'DESC',
        'date_query' => array( array( 'after' =>  $atts['dates'] ) ),
    );
}

switch ($atts['columns']) {
    case '2':
        $class .= "col-xs-6 col-sm-6 col-md-6";
        break;
    case '3':
        $class .= "col-xs-12 col-sm-4 col-md-4";
        break;
    case '4':
        $class .= "col-xs-6 col-sm-6 col-md-3";
        break;
    default:
        $class .= "col-xs-6 col-sm-6 col-md-6";
        break;
}
$att=array_merge($args,$arr2);
$the_query = new WP_Query($att);
$count = $the_query->found_posts;
$num_pages = $the_query->max_num_pages;

if(isset($atts['category_name']) & !empty($atts['category_name'])){
    $categories = explode( ',', $atts['category_name'] );
} else{
    $categories=get_the_category();
}

?>

<?php
switch ($atts['layout_types']) {

    case 'box1':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box1" data-layout="box1" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>"  data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>
                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row box-small clearfix">
                    <?php  while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <div class="<?php echo esc_html($class);?> hidden-description">
                            <?php na_part_templates('layout/content-grid'); ?>
                        </div>
                    <?php } wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box2':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box2 " data-layout="box2" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if ($k ==1) { ?>
                            <div class="col-md-7 col-sm-7 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-grid-large'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <div class="col-md-5 col-sm-5 col-xs-12 box-small hidden-description">
                                <?php na_part_templates('layout/content-sidebar'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box3':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box3 " data-layout="box3" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<5){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>4){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if ($k ==1) { ?>
                            <div class="col-md-8 col-sm-8 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-grid-large'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 box-small hidden-description">
                                <?php na_part_templates('layout/content-grid'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box4':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box4 " data-layout="box4" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat"id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if ($k ==1) { ?>
                            <div class="col-md-12 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-trans'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <div class="col-md-12 box-large">
                                <?php na_part_templates('layout/content-list-large'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box5':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box5 " data-layout="box5" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if ($k ==1) { ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-trans'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 box-small hidden-description">
                                <?php na_part_templates('layout/content-sidebar'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box5a':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box5a" data-layout="box5a" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if ($k ==1) { ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-trans-large'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <div class="col-md-4 col-sm-4 col-xs-6 box-small meta-hidden hidden-description">
                                <?php na_part_templates('layout/content-grid'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box6':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box6 " data-layout="box6" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if ($k ==1) { ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-list'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <div class="col-item col-md-4 col-sm-4 col-xs-12 box-small hidden-description">
                                <?php na_part_templates('layout/content-grid'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box7':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box7 " data-layout="box7" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if ($k ==1) { ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-list'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 box-small  hidden-description">
                                <?php na_part_templates('layout/content-sidebar'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box8':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box8" data-layout="box8" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>

                        <?php if ($k ==1 || $k==2) { ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-grid-large'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <?php if ($k%2 !=0) {
                                $clear='clear';
                            }else{
                                $clear='';
                            } ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 box-small <?php echo esc_html($clear);?>hidden-description">
                                <?php na_part_templates('layout/content-sidebar'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box9':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box9 <?php echo esc_html__('show-cate');?>" data-layout="box9"  data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if(!empty($cat->name) && $n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>

                        <?php if ($k ==1) { ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                <?php na_part_templates('layout/content-grid-big'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 box-small hidden-description">
                                <?php na_part_templates('layout/content-grid'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box10':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box10 " data-layout="box10" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>

                            <div class="col-md-12 col-sm-12 col-xs-12 box-small  hidden-description">
                                <?php na_part_templates('layout/content-sidebar'); ?>
                            </div>

                        <?php
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box11':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box11" data-layout="box11" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>"  data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if(!empty($cat->name) && $n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row box-small clearfix">
                    <?php  while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <div class="<?php echo esc_html($class);?>  hidden-description">
                            <?php na_part_templates('layout/content-grid-vertical'); ?>
                        </div>
                    <?php } wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;

    case 'box12':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box12 " data-layout="box12" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>

                        <?php if ($k ==1) { ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-grid-large'); ?>
                            </div>
                        <?php }
                         elseif ($k ==2) { ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 box-small">
                                <div class="row">
                                     <div class="col-md-6 col-sm-6 col-xs-12 box-small hidden-description">
                                         <?php na_part_templates('layout/content-grid'); ?>
                                     </div>
                        <?php }

                        elseif ( 2 <$k && $k < 6) { ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 box-small hidden-description">
                                <?php na_part_templates('layout/content-grid'); ?>
                            </div>
                        <?php }
                        elseif ($k ==  $atts['number_post'] || $k ==$count ) { ?>
                                </div>
                                </div>
                        <?php }?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;
    case 'box13':?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box13" data-layout="box12" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if ($k ==1 || $k==2) { ?>
                            <div class="col-md-4 col-sm-6 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-grid'); ?>
                            </div>
                        <?php }
                        elseif ($k ==3) { ?>
                            <div class="col-md-4 col-sm-12 col-xs-12 box-large">
                            <div class="row">
                        <?php }
                        elseif ( 3 <$k && $k < 8) { ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 box-small  hidden-description">
                                <?php na_part_templates('layout/content-text'); ?>
                            </div>
                        <?php }
                        elseif ($k ==  $atts['number_post'] || $k ==$count ) { ?>
                            </div>
                            </div>
                        <?php }?>

                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;
    default:?>
        <?php $rand = rand(0,99);?>
        <div class="box-cats wrapper-posts layout-box2 " data-layout="box2" data-typePost="<?php echo esc_attr($atts['type_post']);?>"  data-dates="<?php echo esc_attr($atts['dates']);?>" data-paged="<?php echo esc_attr($num_pages);?>" data-col="<?php echo esc_attr($class);?>" data-cat="<?php echo esc_attr($atts['category_name'])?>" data-number="<?php echo esc_attr($atts['number_post'])?>">
            <?php if ($atts['title']) { ?>
                <div class="box-title clearfix">
                    <h2 class="title-left"><?php echo esc_html($atts['title']); ?></h2>
                    <?php if($atts['filter'] && $atts['type_filter']=='cat_filter' ){?>

                        <div class="box-filter clearfix">
                            <ul class="wrapper-filter" data-filter="true">
                                <?php
                                $n=1;
                                echo '<li class="active"><span class="cat-item" data-catfilter="allCat-'.$rand.'">'.esc_attr('All','nano').'</span></li>';
                                foreach ($categories as $category){
                                    $cat = get_term_by( 'slug',$category, 'category');
                                    if($n<6){
                                        echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                    }
                                    $n++;
                                }
                                ?>
                            </ul>
                            <?php if($n>5){ ?>
                                <div class="wrapper-more">
                                    <span class="filter-more"><?php esc_html_e('...','nano'); ?></span>
                                    <ul class="wrapper-filter more" data-filter="true">
                                        <?php
                                        $m=1;
                                        foreach ($categories as $category){
                                            $cat = get_term_by( 'slug',$category, 'category');
                                            if($m>5){
                                                echo '<li><span class="cat-item"  data-catfilter="'.$category.'" >'.$cat->name.'</span></li>';
                                            }
                                            $m++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if($atts['cat_link'] && !empty($atts['cat_link'])){?>
                        <a class="cat_readmore" href="<?php echo esc_url($atts['cat_link']);?>">
                            <?php esc_html_e('Read More','nano')?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
            <span class="agr-loading"></span>
            <div class="tab-content">
                <div id="allCat-<?php echo esc_attr($rand);?>" class="box-blog archive-blog active row large-vertical clearfix">
                    <?php $k=1;
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); ?>
                        <?php if ($k ==1) { ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 box-large">
                                <?php na_part_templates('layout/content-grid'); ?>
                            </div>
                        <?php }
                        else{ ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 box-small  hidden-description">
                                <?php na_part_templates('layout/content-sidebar'); ?>
                            </div>
                        <?php } ?>
                        <?php $k++;
                    }
                    wp_reset_postdata();?>
                </div>

            </div>
        </div>
        <?php break;
}
?>