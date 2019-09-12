<?php
/**
 * @package     wide
 * @version     1.0
 * @author      NanoAgency
 * @link        http://www.nanoagency.co
 * @copyright   Copyright (c) 2016 NanoAgency
 * @license     GPL v2
 */

class benko_instagram extends WP_Widget{

    /*function construct*/
    public function __construct() {
        parent::__construct(
            'instagram',esc_html__('+NA: Instagram','benko'),
            array('description'=>esc_html__('Update news from your instagram', 'benko'))
        );
    }
    function generate_transient_key( $usernames_or_hashtags ) {

        $id = $this->id . $usernames_or_hashtags;

        $transient_key = md5( 'benko_instagram_widget_' . $id );

        return $transient_key;

    }
    protected function get_follow_link( $usernames_or_hashtags ) {

        $usernames_hashtags_array = explode( ',', $usernames_or_hashtags );
        $number_of_username_hashtag = count( $usernames_hashtags_array );

        if ( $number_of_username_hashtag !== 1 ) return '';

        return  $this->get_instagram_url( $usernames_or_hashtags );
    }

    function limit_images_number( $photos, $limit = 1 ) {
        if ( empty( $photos ) || is_wp_error( $photos ) ) {
            return array();
        }
        return array_slice( $photos, 0, $limit );
    }
    function get_instagram_url( $searched_term ) {

        $searched_term = trim( strtolower( $searched_term ) );

        switch ( substr( $searched_term, 0, 1 ) ) {
            case '#':
                return $url = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $searched_term );
                break;

            default:
                return $url = 'https://instagram.com/' . str_replace( '@', '', $searched_term );
                break;
        }
    }

    function parse_instagram_images( $images ) {

        $pretty_images = array();

        foreach ( $images as $image ) {

            $pretty_images[] = array(
                'caption'    => isset( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ? $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] : '',
                'link'       => trailingslashit( 'https://instagram.com/p/' . $image['node']['shortcode'] ),
                'time'     	 => $image['node']['taken_at_timestamp'],
                'comments'   => $image['node']['edge_media_to_comment']['count'],
                'likes'   	 => $image['node']['edge_liked_by']['count'],
                'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ), //150
                'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][1]['src'] ), //240
                'medium'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ), //320
                'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][3]['src'] ), //480
                'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
            );

        }

        return $pretty_images;
    }

    function get_instagram_data( $url )
    {

        $request = wp_remote_get($url);

        if (is_wp_error($request) || empty($request)) {
            return new WP_Error('invalid_response', esc_html__('Unable to communicate with Instagram.', 'benko'));
        }

        $body = wp_remote_retrieve_body($request);

        $shared = explode('window._sharedData = ', $body);
        $json = explode(';</script>', $shared[1]);
        $data = json_decode($json[0], true);

        if (empty($data)) {
            return new WP_Error('bad_json', esc_html__('Instagram has returned empty data. Please check your username/hashtag.','benko'));
        }

        if (isset($data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'])) {
            $images = $data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
        } elseif (isset($data['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'])) {
            $images = $data['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
        } else {
            return new WP_Error('bad_json_2', esc_html__('Instagram has returned invalid data.', 'benko'));
        }

        $images = $this->parse_instagram_images($images);

        if (empty($images)) {
            return new WP_Error('no_images', esc_html__('Images not found. This may be a temporary problem. Please try again soon.', 'benko'));
        }

        return $images;
    }

    function get_photos( $usernames_or_hashtags ) {

        if ( empty( $usernames_or_hashtags ) ) {
            return false;
        }

        $transient_key = $this->generate_transient_key( $usernames_or_hashtags );

        $cached = get_transient( $transient_key );

        if ( !empty( $cached ) ) {
            return $cached;
        }

        $usernames_or_hashtags = explode( ',', $usernames_or_hashtags );

        $images = array();

        foreach ( $usernames_or_hashtags as  $username_or_hashtag ) {

            $username_or_hashtag = trim( $username_or_hashtag );

            $url = $this->get_instagram_url( $username_or_hashtag );
            $data = $this->get_instagram_data( $url );

            if ( is_wp_error( $data )) {
                return $data;
            }

            $images[] = $data;
        }

        $images =  array_reduce( $images, 'array_merge', array() );

        usort( $images, function ( $a, $b ) {
            if ( $a['time'] == $b['time'] ) return 0;
            return ( $a['time'] < $b['time'] ) ? 1 : -1;
        } );

        set_transient( $transient_key, $images, DAY_IN_SECONDS );

        return $images;
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
        ?>
        <?php
        $photos = $this->get_photos( $instance['username'] );
        $photos = $this->limit_images_number( $photos, $instance['photos_number'] );
        $size = $instance['container_size'];
        $follow_link = $this->get_follow_link( $instance['username'] );

        if ( !empty($photos) ): ?>
            <div class="instagram-row space-<?php echo esc_attr($instance['photo_space']);?> clearfix">
                <?php foreach ( $photos as $photo ): ?>
                        <div class="item-instagram col-<?php echo esc_attr($instance['columns']);?> ">
                            <a href="<?php echo esc_attr( $photo['link'] ); ?>" title="<?php echo esc_attr( $photo['caption'] ); ?>" target="_blank" rel="nofollow">
                                <img src="<?php echo esc_attr( $photo[$size]); ?>" alt="<?php echo esc_attr( $photo['caption'] ); ?>">
                            </a>
                        </div>
                <?php endforeach; ?>
            </div>
        <?php endif;?>

        <?php if ( !empty($instance['link_text']) && !empty($follow_link) ): ?>
            <p class="instagram-follow-link">
                <a href="<?php echo esc_attr( $follow_link ) ?>" target="_blank" rel="nofollow" class="author_link btn-follow"><i class="fa fa-instagram"></i> <?php echo esc_html( $instance['link_text'] ); ?></a>
            </p>

        <?php endif; ?>

       <?php  echo ent2ncr($args['after_widget']);
    }

    /**
     * Back-end widgets form
     */
    public function form($instance){
        $instance =   wp_parse_args($instance,array(
            'title'             =>  esc_html__('Follow Instagram', 'benko'),
            'username'          =>  '@nano_benko',
            'photos_number'     =>  '9',
            'columns'           =>  '3',
            'photo_space'       =>  '15',
            'container_size'    =>  'thumbnail',
            'link_text'         =>  'Follow @ Nano benko',
        ));
        ?>
        <p>
            <label for=<?php echo esc_attr($this->get_field_id('title')); ?>><?php echo esc_html_e('Title:','benko') ; ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('username')); ?>"><?php echo esc_html_e('Instagram Username:','benko'); ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('username')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('username')); ?>" value="<?php echo esc_attr($instance['username']); ?>" />
            <small class="howto"><?php esc_html_e( 'Multiple usernames and hastags are alowed.Example 1: @benko_nano', 'benko'); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('photos_number')); ?>"><?php echo esc_html_e('Number of photos:','benko'); ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id('photos_number')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('photos_number')); ?>" value="<?php echo esc_attr($instance['photos_number']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('columns')); ?>">
                <strong><?php esc_html_e('Columns: ', 'benko') ?>:</strong>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id('type')); ?>"
                        name="<?php echo esc_attr($this->get_field_name('columns')); ?>">
                    <option
                        value="3"<?php echo (isset($instance['columns']) && $instance['columns'] == '3') ? ' selected="selected"' : '' ?>><?php esc_html_e('3 ', 'benko') ?>
                    </option>
                    <option
                        value="4"<?php echo (isset($instance['columns']) && $instance['columns'] == '4') ? ' selected="selected"' : '' ?>><?php esc_html_e('4', 'benko') ?>
                    </option>
                    <option
                            value="5"<?php echo (isset($instance['columns']) && $instance['columns'] == '5') ? ' selected="selected"' : '' ?>><?php esc_html_e('5', 'benko') ?>
                    </option>
                    <option
                            value="6"<?php echo (isset($instance['columns']) && $instance['columns'] == '6') ? ' selected="selected"' : '' ?>><?php esc_html_e('6', 'benko') ?>
                    </option>
                    <option
                            value="7"<?php echo (isset($instance['columns']) && $instance['columns'] == '7') ? ' selected="selected"' : '' ?>><?php esc_html_e('7', 'benko') ?>
                    </option>
                    <option
                            value="8"<?php echo (isset($instance['columns']) && $instance['columns'] == '8') ? ' selected="selected"' : '' ?>><?php esc_html_e('8', 'benko') ?>
                    </option>
                </select>
            </label>
            <small class="howto"><?php _e( 'Choose in how many columns you would like to display your photos','benko'); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('photo_space')); ?>">
                <strong><?php esc_html_e('Photo spacing: ', 'benko') ?>:</strong>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id('type')); ?>"
                        name="<?php echo esc_attr($this->get_field_name('photo_space')); ?>">
                    <option
                            value="0"<?php echo (isset($instance['photo_space']) && $instance['photo_space'] == '0') ? ' selected="selected"' : '' ?>><?php esc_html_e('0', 'benko') ?>
                    </option>
                    <option
                            value="5"<?php echo (isset($instance['photo_space']) && $instance['photo_space'] == '5') ? ' selected="selected"' : '' ?>><?php esc_html_e('5', 'benko') ?>
                    </option>
                    <option
                            value="10"<?php echo (isset($instance['photo_space']) && $instance['photo_space'] == '10') ? ' selected="selected"' : '' ?>><?php esc_html_e('10', 'benko') ?>
                    </option>
                    <option
                            value="15"<?php echo (isset($instance['photo_space']) && $instance['photo_space'] == '15') ? ' selected="selected"' : '' ?>><?php esc_html_e('15', 'benko') ?>
                    </option>
                </select>
            </label>
            <small class="howto"><?php _e( 'Specify a spacing between your photos', 'benko' ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('container_size')); ?>">
                <strong><?php esc_html_e('Image size: ', 'benko') ?>:</strong>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id('type')); ?>"
                        name="<?php echo esc_attr($this->get_field_name('container_size')); ?>">
                    <option
                            value="thumbnail"<?php echo (isset($instance['container_size']) && $instance['container_size'] == 'thumbnail') ? ' selected="selected"' : '' ?>><?php esc_html_e('Default', 'benko') ?>
                    </option>
                    <option
                            value="small"<?php echo (isset($instance['container_size']) && $instance['container_size'] == 'small') ? ' selected="selected"' : '' ?>><?php esc_html_e('Small', 'benko') ?>
                    </option>
                    <option
                            value="medium"<?php echo (isset($instance['container_size']) && $instance['container_size'] == 'medium') ? ' selected="selected"' : '' ?>><?php esc_html_e('Medium', 'benko') ?>
                    </option>
                    <option
                            value="large"<?php echo (isset($instance['container_size']) && $instance['container_size'] == 'large') ? ' selected="selected"' : '' ?>><?php esc_html_e('Large', 'benko') ?>
                    </option>
                    <option
                            value="original"<?php echo (isset($instance['container_size']) && $instance['container_size'] == 'original') ? ' selected="selected"' : '' ?>><?php esc_html_e('Big', 'benko') ?>
                    </option>
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo esc_html($this->get_field_id( 'link_text' )); ?>"><?php _e( '"Follow" link text', 'benko' ); ?>:</label>
            <input class="widefat" id="<?php echo esc_html($this->get_field_id( 'link_text' )); ?>" name="<?php echo esc_html($this->get_field_name( 'link_text' )); ?>" type="text" value="<?php echo esc_attr( $instance['link_text'] ); ?>" />
            <small class="howto"><?php _e( 'Specify a text for your "follow" link, or leave empty if you do not want to display the "follow" link', 'benko' ); ?></small>
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
        $instance['photos_number']              = $new_instance['photos_number'];
        $instance['columns']                    = $new_instance['columns'];
        $instance['photo_space']                = $new_instance['photo_space'];
        $instance['container_size']             = $new_instance['container_size'];
        $instance['link_text']                  = $new_instance['link_text'];
        return $instance;
    }

}
function benko_instagram(){
    register_widget('benko_instagram');
}
add_action('widgets_init','benko_instagram');
?>