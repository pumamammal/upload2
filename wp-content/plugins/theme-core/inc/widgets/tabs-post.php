<?php
/**
 * @package     benko
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */

class benko_tabs_post extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'tabs_post',esc_html__('+NA: Tabs Post','benko'),
            array('description'=>esc_html__('Tabs Post Most Views, Featured , Recent Posts', 'benko'))
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $posts = $instance['posts'];
        $featured = $instance['featured'];
        $tags_count = $instance['tags'];

        $title_most_view =$instance['title_most_view'];
        $title_recent_posts =$instance['title_recent_posts'];
        $title_featured_posts =$instance['title_featured_posts'];

        $show_popular_posts = isset($instance['show_popular_posts']) ? 'true' : 'false';
        $show_recent_posts = isset($instance['show_recent_posts']) ? 'true' : 'false';
        $show_featured_posts = isset($instance['show_featured_posts']) ? 'true' : 'false';
        echo ent2ncr($args['before_widget']);?>
        <ul class="nav nav-tabs widget-title">
            <?php if($show_popular_posts == 'true'): ?>
                <li class="active ">
                    <a href="#tab-popular" class="tabs-title-product" aria-expanded="true" data-toggle="tab"><?php echo esc_attr($title_most_view); ?></a>
                </li>
            <?php endif; ?>
            <?php if($show_featured_posts == 'true'): ?>
                <li <?php if($show_featured_posts != 'true') echo 'class="active"'; ?>>
                    <a href="#tab-featured" class="tabs-title-product" aria-expanded="false" data-toggle="tab"><?php echo esc_attr($title_featured_posts); ?></a>
                </li>
            <?php endif; ?>
            <?php if($show_recent_posts == 'true'): ?>
                <li <?php if($show_popular_posts != 'true') echo 'class="active"'; ?>>
                    <a href="#tab-recent" class="tabs-title-product" aria-expanded="false" data-toggle="tab"><?php echo esc_attr($title_recent_posts);; ?></a>
                </li>
            <?php endif; ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <?php if($show_popular_posts == 'true'): ?>
                <div class="tab-pane active posts-listing article-content archive-blog" id="tab-popular">
                    <?php
                    $arr = array(
                        'showposts'     => $posts,
                        'post_type'     => 'post',
                        'post_status'   => 'publish',
                        'orderby'       => 'date',
                        'order'         => 'DESC',
                    );
                    $arr2 = array(
                        'meta_key'      => 'post_views_count',
                        'orderby'       =>'meta_value_num',
                        'date_query'    => array( array( 'after' => '-2 year' ) ),
                    );
                    $att=array_merge($arr,$arr2);
                    $popular_posts = new WP_Query( $att);
                    $n=1;
                    if($popular_posts->have_posts()): ?>
                            <?php while($popular_posts->have_posts()): $popular_posts->the_post(); ?>
                                <?php
                                    if($n==1){
                                        get_template_part( 'templates/layout/content-grid');
                                    }
                                    else {
                                        get_template_part('templates/layout/content-sidebar');
                                    }
                                ?>
                            <?php $n++; endwhile; ?>
                    <?php endif;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>

            <?php if($show_featured_posts == 'true'): ?>
                <div class="tab-pane posts-listing article-content archive-blog" id="tab-featured">
                    <?php
                    $arr = array(
                        'showposts'     => $featured,
                        'post_type'     => 'post',
                        'post_status'   => 'publish',
                        'orderby'       => 'date',
                        'order'         => 'DESC',
                    );
                    $meta_query[] = array(
                        'key'   => '_featured',
                        'value' => 'yes'
                    );
                    $arr['meta_query'] = $meta_query;
                    $popular_posts = new WP_Query( $arr);
                    $n=1;
                    if($popular_posts->have_posts()): ?>
                        <?php while($popular_posts->have_posts()): $popular_posts->the_post(); ?>
                            <?php
                            if($n==1){
                                get_template_part( 'templates/layout/content-grid');
                            }
                            else {
                                get_template_part('templates/layout/content-sidebar');
                            }
                            ?>
                        <?php $n++; endwhile; ?>
                    <?php endif;
                    wp_reset_postdata();

                    ?>

                </div>
            <?php endif; ?>

            <?php if($show_recent_posts == 'true'): ?>
                <div class="tab-pane article-content archive-blog" id="tab-recent">
                    <?php
                    $recent_posts = new WP_Query('showposts='.$tags_count);
                    $n=1;
                    if($recent_posts->have_posts()):  ?>
                            <?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                                <?php
                                if($n==1){
                                    get_template_part( 'templates/layout/content-grid');
                                }
                                else {
                                    get_template_part('templates/layout/content-sidebar');
                                }
                                ?>
                            <?php $n++; endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
        echo ent2ncr($args['after_widget']);;
    }
// Widget Backend
    public function form( $instance ) {
        $instance = wp_parse_args($instance,array(
            'title'       =>  esc_html__('Tabs Post', 'benko'),
            'posts' => 4,
            'featured' => 4,
            'tags' => '4',

            'title_most_view' => 'Most Views',
            'title_recent_posts' => 'Recent Posts',
            'title_featured_posts' => 'Featured Posts',

            'show_popular_posts' => 'on',
            'show_recent_posts' => 'on',
            'show_featured_posts' => 'on',
        ));
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title_most_view')); ?>"><?php echo esc_html__('Title Most Views:', 'benko' ); ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_most_view')); ?>" name="<?php echo esc_attr($this->get_field_name('title_most_view')); ?>" value="<?php echo esc_attr($instance['title_most_view']); ?>" />

            <label for="<?php echo esc_attr($this->get_field_id('posts')); ?>"><?php echo esc_html__('Number of Most Views posts:', 'benko' ); ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('posts')); ?>" name="<?php echo esc_attr($this->get_field_name('posts')); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title_recent_posts')); ?>"><?php echo esc_html__('Title Recent Posts:', 'benko' ); ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_recent_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('title_recent_posts')); ?>" value="<?php echo esc_attr($instance['title_recent_posts']); ?>" />

            <label for="<?php echo esc_attr($this->get_field_id('tags')); ?>"><?php echo esc_html__('Number of Recent Posts:', 'benko' ); ?></label>
            <input class="widefat" type="text"  id="<?php echo esc_attr($this->get_field_id('tags')); ?>" name="<?php echo esc_attr($this->get_field_name('tags')); ?>" value="<?php echo esc_attr($instance['tags']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title_featured_posts')); ?>"><?php echo esc_html__('Title Featured Posts:', 'benko' ); ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_featured_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('title_featured_posts')); ?>" value="<?php echo esc_attr($instance['title_featured_posts']); ?>" />

            <label for="<?php echo esc_attr($this->get_field_id('featured')); ?>"><?php echo esc_html__('Number of Featured Posts:', 'benko' ); ?></label>
            <input class="widefat" type="text"  id="<?php echo esc_attr($this->get_field_id('featured')); ?>" name="<?php echo esc_attr($this->get_field_name('featured')); ?>" value="<?php echo esc_attr($instance['featured']); ?>" />
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_popular_posts'], 'on'); ?> id="<?php echo esc_attr($this->get_field_id('show_popular_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('show_popular_posts')); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id('show_popular_posts')); ?>"><?php echo esc_html__('Show Most Views posts', 'benko' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_recent_posts'], 'on'); ?> id="<?php echo esc_attr($this->get_field_id('show_recent_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('show_recent_posts')); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id('show_recent_posts')); ?>"><?php echo esc_html__('Show Recent Posts', 'benko' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_featured_posts'], 'on'); ?> id="<?php echo esc_attr($this->get_field_id('show_featured_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('show_featured_posts')); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id('show_featured_posts')); ?>"><?php echo esc_html__('Show Featured Posts', 'benko' ); ?></label>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['posts'] = $new_instance['posts'];
        $instance['tags'] = $new_instance['tags'];
        $instance['featured'] = $new_instance['featured'];

        $instance['title_most_view'] = $new_instance['title_most_view'];
        $instance['title_recent_posts'] = $new_instance['title_recent_posts'];
        $instance['title_featured_posts'] = $new_instance['title_featured_posts'];

        $instance['show_popular_posts'] = $new_instance['show_popular_posts'];
        $instance['show_recent_posts'] = $new_instance['show_recent_posts'];
        $instance['show_featured_posts'] = $new_instance['show_featured_posts'];
        return $instance;

    }
}
function benko_tabs_post(){
    register_widget('benko_tabs_post');
}
add_action('widgets_init','benko_tabs_post');