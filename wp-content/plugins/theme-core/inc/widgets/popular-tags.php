<?php
/**
 * Widget Name: Most tags Widget
 */


class benko_widget_tags extends WP_Widget {

    /*function construct*/
    public function __construct() {
        parent::__construct(
            'popular-tags',esc_html__('+NA: Popular tags','benko'),
            array('description'=>esc_html__('Display Most Popular Tags', 'benko'))
        );
    }


    public function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo ent2ncr($args['before_widget']);

        if($title) {
            echo ent2ncr($args['before_title']) . esc_html($title) . ent2ncr($args['after_title']);
        }

        $tags = get_tags();
        $arr = array(
            'smallest'                => 12,
            'largest'                 => 12,
            'unit'                    => 'px',
            'number'                  => $instance['nubmer'],
            'separator'               => " ",
            'orderby'                 => 'count',
            'order'                   => 'DESC',
            'show_count'              => $instance['show_nubmer'],
            'echo'                    => false
        );
        $tag_string = wp_generate_tag_cloud( $tags, $arr );

        echo $tag_string;


        echo ent2ncr($args['after_widget']);
    }


    public function form( $instance ) {
        $instance =   wp_parse_args($instance,array(
            'title'             =>  esc_html__('Popular tags', 'benko'),
            'nubmer'            =>  '15',
            'show_nubmer'       =>  '1',
        ));
        ?>
        <p>
            <label for=<?php echo esc_attr($this->get_field_id('title')); ?>><?php echo esc_html_e('Title:','benko') ; ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
            <label for=<?php echo esc_attr($this->get_field_id('nubmer')); ?>><?php echo esc_html_e('Nubmer:','benko') ; ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('nubmer')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('nubmer')); ?>" value="<?php echo esc_attr($instance['nubmer']); ?>" />
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['show_nubmer'], 'on'); ?> id="<?php echo esc_attr($this->get_field_id('show_nubmer')); ?>" name="<?php echo esc_attr($this->get_field_name('show_nubmer')); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id('show_nubmer')); ?>"><?php echo esc_html__('Show tag counts', 'benko' ); ?></label>
        </p>
    <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']                      = $new_instance['title'];
        $instance['nubmer'] = strip_tags($new_instance['nubmer']);
        $instance['show_nubmer'] = strip_tags($new_instance['show_nubmer']);
        return $instance;
    }

}
function benko_widget_tags(){
    register_widget('benko_widget_tags');
}
add_action('widgets_init','benko_widget_tags');
?>