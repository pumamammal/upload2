<article <?php post_class('vlog-lay-c vlog-post col-lg-6 col-md-6 col-sm-6 col-xs-12'); ?>>
	
	<?php if( $fimg = vlog_get_featured_image('vlog-lay-c') ) : ?>
    <div class="entry-image">
	    <?php $quick_view = vlog_get_post_format() == 'video' ? vlog_get_option('lay_c_quick_view') : false; ?>
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" class="<?php echo $quick_view ? esc_attr('vlog-quick-view') : ''; ?>"  data-id="<?php echo get_the_ID();?>">
            <?php echo $fimg; ?>
            <?php if( $labels = vlog_labels('c', 'medium') ) : ?>
                       <?php echo $labels; ?>
            <?php endif; ?>
	        <?php if($quick_view): ?>
                <span class="vlog-format-action small"><i class="fa fa-play"></i></span>
	        <?php endif; ?>
        </a>
    </div>
	<?php endif; ?>

	<div class="entry-header">

		<?php $taxs = array(); ?>
        <?php if( vlog_get_option( 'lay_c_cat' ) && $cat = vlog_get_category() ) : ?>
            <?php $taxs[] = $cat; ?>
        <?php endif; ?>

        <?php if( vlog_get_option( 'lay_c_serie' ) && $serie = vlog_get_serie() ) : ?>
            <?php $taxs[] = $serie; ?>
        <?php endif; ?>

        <?php if( !empty($taxs) ): ?>
            <span class="entry-category"><?php echo implode(', ', $taxs ); ?></span>
        <?php endif; ?>

	    <?php the_title( sprintf( '<h2 class="entry-title h2"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</div>
	    
	<?php if( $meta = vlog_get_meta_data( 'c' ) ) : ?>
	    <div class="entry-meta"><?php echo $meta; ?></div>
	<?php endif; ?>


	<?php if( vlog_get_option('lay_c_excerpt') ) : ?>
	    <div class="entry-content">
	        <?php echo vlog_get_excerpt( 'c' ); ?>
	    </div>
	<?php endif; ?>

    <?php if( vlog_get_option('lay_c_rm') ) : ?>
    	<a class="vlog-rm" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo __vlog('read_more'); ?></a>
	<?php endif; ?>
    

</article>