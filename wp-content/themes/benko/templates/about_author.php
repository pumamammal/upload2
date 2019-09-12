<div class="post-author">
    <div class="author-img">
        <?php echo get_avatar( get_the_author_meta('email'), '120' ); ?>
    </div>
    <div class="author-content">
        <div class="top-author">
            <h5 class="author-name"><?php the_author_posts_link(); ?></h5>
        </div>
        <p><?php the_author_meta('description'); ?></p>
        <div class="content-social-author">
            <?php if(get_the_author_meta('facebook')) : ?>
                <a target="_blank" class="author-social" href="<?php echo esc_url('//facebook.com/');?><?php echo the_author_meta('facebook'); ?>">
                    <?php echo esc_html('Facebook'); ?>
                </a>
            <?php endif; ?>
            <?php if(get_the_author_meta('twitter')) : ?>
                <a target="_blank" class="author-social" href="<?php echo esc_url('//twitter.com/');?><?php echo the_author_meta('twitter'); ?>">
                    <?php echo esc_html('Twitter'); ?>
                </a>
            <?php endif; ?>
            <?php if(get_the_author_meta('instagram')) : ?>
                <a target="_blank" class="author-social" href="<?php echo esc_url('//instagram.com/');?><?php echo the_author_meta('instagram'); ?>">
                    <?php echo esc_html('Instagram'); ?>
                </a>
            <?php endif; ?>
            <?php if(get_the_author_meta('google')) : ?>
                <a target="_blank" class="author-social" href="<?php echo esc_url('//plus.google.com/');?><?php echo the_author_meta('google'); ?>?rel=author">
                    <?php echo esc_html('Google +'); ?>
                </a>
            <?php endif; ?>
            <?php if(get_the_author_meta('pinterest')) : ?>
                <a target="_blank" class="author-social" href="<?php echo esc_url('//pinterest.com/');?><?php echo the_author_meta('pinterest'); ?>">
                    <?php echo esc_html('Pinterest'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>