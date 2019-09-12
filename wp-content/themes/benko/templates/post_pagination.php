<div class="entry_pagination">
	<div class="post-pagination pagination clearfix">
		<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		?>
		<?php if (!empty( $prev_post )) : ?>
			<a class="page-numbers pull-left page-prev" title="<?php echo esc_attr__('prev post','benko');?>" href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>">
				<i class="ti-arrow-left" aria-hidden="true"></i>
				<span class="btn-prev"><?php esc_html_e('Previous post','benko')?></span>
				<p class="title-pagination"><?php echo esc_html(wp_strip_all_tags($prev_post->post_title)); ?></p>
			</a>
		<?php endif; ?>
		<?php if (!empty( $next_post )) : ?>
			<a class="page-numbers pull-right page-next" title="<?php echo esc_attr__('next post','benko');?>" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
				<span class="btn-next"><?php esc_html_e('Next post','benko')?></span>
				<i class="ti-arrow-right" aria-hidden="true"></i>
				<p class="title-pagination"><?php echo esc_html(wp_strip_all_tags($next_post->post_title)); ?></p>
			</a>
		<?php endif; ?>
	</div>
</div>