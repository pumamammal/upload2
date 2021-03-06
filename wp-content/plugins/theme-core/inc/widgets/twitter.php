<?php
/**
 * @package     wide
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */

class benko_twitter extends WP_Widget{

    /*function construct*/
    public function __construct() {
        parent::__construct(
            'twitter',esc_html__('+NA: Twitter','benko'),
            array('description'=>esc_html__('Update news from your twitter', 'benko'))
        );
    }
    /**
     * font-end widgets
     */
    public function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo ent2ncr($args['before_widget']);

        if($title) {
            echo ent2ncr($args['before_title']) . esc_html($title) . ent2ncr($args['after_title']);
        }
        wp_enqueue_script('tweets-widgets');
        ?>
        <div class="benko-twitter">
                   <a class="twitter-timeline" href="https://twitter.com/<?php echo esc_attr($instance['username']);?>"
                        data-chrome="noheader noscrollbar nofooter noborders transparent"
                        data-width="<?php echo esc_attr($instance['width']);?>"
                        data-height="<?php echo esc_attr($instance['height']);?>"
                        data-theme="<?php echo esc_attr($instance['theme']);?>" >
                       <?php esc_html_e('Tweets by','benko');?>
                       <?php echo esc_attr($instance['username']);?>
                   </a>
        </div>
        <?php
        echo ent2ncr($args['after_widget']);
    }

    /**
     * Back-end widgets form
     */
    public function form($instance){
        $instance =   wp_parse_args($instance,array(
            'title'             =>  esc_html__('Latest Tweets', 'benko'),
            'username'          =>  'nanoagency2017',
            'width'             =>  '300',
            'height'            =>  '250',
            'theme'             =>  'dark',
        ));
        ?>
        <p>
            <label for=<?php echo esc_attr($this->get_field_id('title')); ?>><?php echo esc_html_e('Title:','benko') ; ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('username')); ?>"><?php echo esc_html_e('Twitter Username: :','benko'); ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('username')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('username')); ?>" value="<?php echo esc_attr($instance['username']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('theme')); ?>">
                <strong><?php esc_html_e('Theme: ', 'benko') ?>:</strong>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id('type')); ?>"
                        name="<?php echo esc_attr($this->get_field_name('theme')); ?>">
                    <option
                        value="light"<?php echo (isset($instance['theme']) && $instance['theme'] == 'light') ? ' selected="selected"' : '' ?>><?php esc_html_e('Light', 'benko') ?>
                    </option>
                    <option
                        value="dark"<?php echo (isset($instance['theme']) && $instance['theme'] == 'dark') ? ' selected="selected"' : '' ?>><?php esc_html_e('dark', 'benko') ?>
                    </option>
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('width')); ?>"><?php echo esc_html_e('Width:','benko'); ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('width')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('width')); ?>" value="<?php echo esc_attr($instance['width']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('height')); ?>"><?php echo esc_html_e('Height:','benko'); ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('height')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('height')); ?>" value="<?php echo esc_attr($instance['height']); ?>" />
        </p>
        <?php
    }

    /**
     * function update widget
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']                      = $new_instance['title'];
        $instance['username']                   = $new_instance['username'];
        $instance['width']                      = $new_instance['width'];
        $instance['height']                     = $new_instance['height'];
        $instance['theme']                      = $new_instance['theme'];
        return $instance;
    }
}
function benko_twitter(){
    register_widget('benko_twitter');
}
add_action('widgets_init','benko_twitter');
?>