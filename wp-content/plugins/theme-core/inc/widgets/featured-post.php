<?php
/**
 * @package     benko
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */

class benko_featured_post extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'featured_post',esc_html__('+NA: Featured Post','benko'),
            array('description'=>esc_html__('Featured Post', 'benko'))
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $number     = $instance['number'];
        $categories = $instance['categories'];
        $type_post  = $instance['type_post'];
        $style_post = $instance['style_post'];
        $title = apply_filters('widget_title', $instance['title']);
        $arr2=array();
        $arr = array(
            'category_name' => $categories,
            'showposts'     => $number,
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'orderby'       => 'date',
            'order'         => 'DESC'
        );
        if( $type_post == 'featured' ){
            $meta_query[] = array(
                'key'   => '_featured',
                'value' => 'yes'
            );
            $arr['meta_query'] = $meta_query;
        }
        if( $type_post == 'views' ){
            $arr2 = array(
                'meta_key'      => 'post_views_count',
                'orderby'       =>'meta_value_num',
            );
        }
        $att=array_merge($arr,$arr2);
        $popular_posts = new WP_Query( $att);

        echo ent2ncr($args['before_widget']);
        if($title) {
            echo ent2ncr($args['before_title']) . esc_html($title) . ent2ncr($args['after_title']);
        }
        ?>

        <!-- Tab panes -->
        <div class="article-content archive-blog">
                <div class="featured-post">
                        <?php $n=1;
                        if($popular_posts->have_posts()): ?>
                                <?php while($popular_posts->have_posts()): $popular_posts->the_post(); ?>
                                    <?php
                                        if ($style_post == 'grid'){
                                            get_template_part( 'templates/layout/content-grid');
                                        }
                                        elseif ($style_post == 'text'){
                                            get_template_part( 'templates/layout/content-text');
                                        }
                                        else{
                                            if($n==1){
                                                get_template_part( 'templates/layout/content-grid');
                                            }
                                            else {
                                                get_template_part('templates/layout/content-sidebar');
                                            }
                                        }
                                    ?>
                                <?php $n++; endwhile;  wp_reset_postdata(); ?>
                        <?php endif; ?>
                </div>
        </div>
        <?php
        echo ent2ncr($args['after_widget']);
    }
// Widget Backend
    public function form( $instance ) {
        $instance = wp_parse_args($instance,array(
            'title'         => esc_html__('Most Popular','benko'),
            'number'        => '5',
            'type_post'     => 'news',
            'categories'    => '',
            'style_post'    => 'grid'
        ));

        // Widget admin form
        ?>
        <p>
            <label for=<?php echo esc_attr($this->get_field_id('title')); ?>><?php echo esc_html_e('Title:','benko') ; ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php echo esc_html_e('Number posts:','benko'); ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Categories:', 'benko') ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('categories')); ?>" name="<?php echo esc_attr($this->get_field_name('categories')); ?>" class="widefat categories">
                <option value='' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php  esc_html_e('All categories', 'benko'); ?></option>
                <?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
                <?php foreach($categories as $category) { ?>
                    <option value='<?php echo esc_attr($category->slug); ?>' <?php if ($category->slug == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_html($category->cat_name); ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('type_post')); ?>"></label>
                <strong><?php esc_html_e('Type Post', 'benko') ?>:</strong>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id('type')); ?>"
                        name="<?php echo esc_attr($this->get_field_name('type_post')); ?>">
                    <option
                        value="news"<?php echo (isset($instance['type_post']) && $instance['type_post'] == 'news') ? ' selected="selected"' : '' ?>><?php esc_html_e('News', 'benko') ?>
                    </option>
                    <option
                        value="views"<?php echo (isset($instance['type_post']) && $instance['type_post'] == 'views') ? ' selected="selected"' : '' ?>><?php esc_html_e('Most Views', 'benko') ?>
                    </option>
                    <option
                        value="featured"<?php echo (isset($instance['type_post']) && $instance['type_post'] == 'featured') ? ' selected="selected"' : '' ?>><?php esc_html_e('Featured', 'benko') ?>
                    </option>

                </select>

        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('style_post')); ?>"><?php esc_html_e('Style:', 'benko') ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('style_post')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('style_post')); ?>">
                <option
                    value="grid"<?php echo (isset($instance['style_post']) && $instance['style_post'] == 'grid') ? ' selected="selected"' : '' ?>><?php esc_html_e('Grid', 'benko') ?>
                </option>
                <option
                    value="list"<?php echo (isset($instance['style_post']) && $instance['style_post'] == 'list') ? ' selected="selected"' : '' ?>><?php esc_html_e('List', 'benko') ?>
                </option>
                <option
                    value="text"<?php echo (isset($instance['style_post']) && $instance['style_post'] == 'text') ? ' selected="selected"' : '' ?>><?php esc_html_e('Text', 'benko') ?>
                </option>
            </select>
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']  = $new_instance['title'];
        $instance['number'] = $new_instance['number'];
        $instance['categories']    = $new_instance['categories'];
        $instance['type_post']    = $new_instance['type_post'];
        $instance['style_post']    = $new_instance['style_post'];
        return $instance;
    }
}
function benko_featured_post(){
    register_widget('benko_featured_post');
}
add_action('widgets_init','benko_featured_post');