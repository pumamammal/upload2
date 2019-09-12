<?php
/**
 * @package     benko
 * @version     2.0
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2015 NanoAgency
 * @license     GPL v2
 */
class WP_Customize_Layout_Control extends WP_Customize_Control {

/**
* The type of customize control being rendered.
*/

public $type = 'layout';

/**
* Displays the multiple select on the customize screen.
*/

public function  render_content() {

	if ( empty( $this->choices ) )

	return;

	?>
		<div class="customize-control-<?php echo esc_html( $this->type ); ?> ">
	    	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			
			<?php foreach ( $this->choices as $value => $label ) { ?>

				<?php $selected = $this->value(); ?>

				<label <?php echo esc_attr( $value == $selected ) ? 'class="selected"' : ''; ?> >

					<input type="radio" name="benko_<?php echo esc_attr( $this->type ); ?>" value="<?php echo esc_attr( $value ); ?>" data-id="<?php echo esc_attr($this->id); ?>"
						<?php echo esc_attr( $selected == $value ) ? 'checked="checked"' : '';?>
					>

					<?php if ( $label == 'none' ) { ?>

                    <img src="<?php echo esc_url(benko_PLUGIN_URL. '/assets/images/right.png'); ?>" alt="<?php echo esc_attr__('Layout','benko'); ?>" />

                    <?php } else { ?>

                    <img src="<?php echo esc_attr( $label ); ?>" alt="<?php echo esc_attr__('Layout','benko'); ?>" />

                    <?php } ?>

				</label>

			<?php } ?>
		</div>

	<?php }
}
