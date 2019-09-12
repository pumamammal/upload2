<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
/**
 * Enqueues front-end CSS for the page Font.
 *
 * @since nanoagency
 *
 * @see wp_add_inline_style()
 */
add_action( 'wp_enqueue_scripts', 'benko_font_google');
function benko_font_google()
{
    $font_family = get_theme_mod('benko_body_font_google', 'Roboto');
    if ($font_family != 'Roboto') {
        $query_args = array(
            'family' => urlencode($font_family),
            'subset' => urlencode('latin,latin-ext'),
        );
        $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
        $benko_google_font = esc_url_raw($fonts_url);
        wp_enqueue_style('benko-fonts-customize', $benko_google_font, array(), null);
    }
}

function benko_title_font_google() {
    $font_title_font         = 'Roboto';
    $font_title   = get_theme_mod('benko_title_font_google',$font_title_font);

    // Don't do anything if the current color is the default.
    if ( $font_title === $font_title_font ) {
        return;
    }

    $css = '
		/* Custom  Font size */
		.entry-title,.widgettitle,.title-left{
            font-family: %1$s;
		}
	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $font_title ) );
}
add_action( 'wp_enqueue_scripts', 'benko_title_font_google', 109 );

function benko_menu_font_google() {
    $font_menu_font         = 'Roboto';
    $font_menu   = get_theme_mod('benko_menu_font_google',$font_menu_font);

    // Don't do anything if the current color is the default.
    if ( $font_menu === $font_menu_font ) {
        return;
    }

    $css = '
		/* Custom  Font size */
		#na-menu-primary ul > li > a{
            font-family: %1$s;
		}
	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $font_menu ) );
}
add_action( 'wp_enqueue_scripts', 'benko_menu_font_google', 10 );

function benko_body_font_family() {
    $default_font         = 'Roboto';
    $font_family   = get_theme_mod('benko_body_font_google',$default_font);

    // Don't do anything if the current color is the default.
    if ( $font_family === $default_font ) {
        return;
    }

    $css = '
		/* Custom  Font size */
		body {
            font-family: %1$s;
		}
	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $font_family ) );
}
add_action( 'wp_enqueue_scripts', 'benko_body_font_family', 11 );

function benko_body_font_size() {
    $default_font         = '14';
    $benko_body_font_size   = get_theme_mod('benko_body_font_size',$default_font);
    // Don't do anything if the current color is the default.
    if ( $benko_body_font_size === $default_font ) {
        return;
    }

    $css = '
		/* Custom  Font size */
		body ,.entry-content {
            font-size: %1$spx;
		}
	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_body_font_size ) );
}
add_action( 'wp_enqueue_scripts', 'benko_body_font_size', 12 );

function benko_menu_font_size() {
    $default_font         = '16';
    $benko_menu_font_size   = get_theme_mod('benko_menu_font_size',$default_font);
    // Don't do anything if the current color is the default.
    if ( $benko_menu_font_size === $default_font ) {
        return;
    }

    $css = '
		/* Custom  Font size */
		#na-menu-primary .na-menu > li a {
            font-size: %1$spx;
		}
	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_menu_font_size ) );
}
add_action( 'wp_enqueue_scripts', 'benko_menu_font_size', 13 );

function benko_color_footer() {
    $default         = '';
    $benko_color_footer       = get_theme_mod('benko_color_footer',$default);

    // Don't do anything if the current color is the default.
    if ( $benko_color_footer === $default ) {
        return;
    }

    $css = '
		/* Custom  color title  */
        #na-footer .widgettitle,#na-footer ul li,#na-footer ul li a,#na-footer ul li b,[class*="ion-social-"],#na-footer,#na-footer .footer-bottom .coppy-right a
		{
		    color:%1$s;
		}
		[class*="ion-social-"]{
		    border-color:%1$s;
		}

	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_color_footer ) );
}
add_action( 'wp_enqueue_scripts', 'benko_color_footer', 23 );

function benko_bg_footer() {
    $default         = '';
    $benko_bg_footer       = get_theme_mod('benko_bg_footer',$default);

    // Don't do anything if the current color is the default.
    if ( $benko_bg_footer === $default ) {
        return;
    }

    $css = '
		/* Custom  color title  */
        #na-footer,#na-footer .footer-bottom,#na-footer .footer-center
		{
		    background:%1$s;
		}

	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_bg_footer ) );
}
add_action( 'wp_enqueue_scripts', 'benko_bg_footer', 24 );

function benko_color_topbar() {
    $default         = '';
    $benko_color_topbar       = get_theme_mod('benko_color_topbar',$default);

    // Don't do anything if the current color is the default.
    if ( $benko_color_topbar === $default ) {
        return;
    }

    $css = '
		/* Custom  color title  */
        .wrap-select-currency::after,
        .wrap-select-country::after,
        #benko-top-navbar,
        #benko-top-navbar .topbar-left a,
        #benko-top-navbar a
		{
		    color:%1$s;
		}

	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_color_topbar ) );
}
add_action( 'wp_enqueue_scripts', 'benko_color_topbar', 25 );

function benko_bg_topbar() {
    $default         = '';
    $benko_bg_topbar       = get_theme_mod('benko_bg_topbar',$default);

    // Don't do anything if the current color is the default.
    if ( $benko_bg_topbar === $default ) {
        return;
    }

    $css = '
		/* Custom  color title  */
		#benko-top-navbar{
		    background:%1$s;
		}

	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_bg_topbar ) );
}
add_action( 'wp_enqueue_scripts', 'benko_bg_topbar', 25 );

function benko_bg_header() {
    $default         = '';
    $benko_bg_header       = get_theme_mod('benko_bg_header',$default);

    // Don't do anything if the current color is the default.
    if ( $benko_bg_header === $default ) {
        return;
    }

    $css = '
		/* Custom  color title  */
		#benko-header,.header-drawer #benko-header,.header-content-menu{
		    background:%1$s;
		}

	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_bg_header ) );
}
add_action( 'wp_enqueue_scripts', 'benko_bg_header', 26 );

//padding
function benko_padding_layout() {
    $padding_layout       = '';
    $benko_padding_layout       = get_post_meta(get_the_ID(), 'padding_layout',true);
    // Don't do anything if the current color is the default.
    if ( $benko_padding_layout === $padding_layout ) {
        return;
    }

    $css = '        
        .page-content{
            padding: %1$s;
        }
    ';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_padding_layout ) );
}
add_action( 'wp_enqueue_scripts', 'benko_padding_layout', 99 );

function benko_color_menu() {
    $default         = '';
    $benko_color_menu       = get_theme_mod('benko_color_menu',$default);

    // Don't do anything if the current color is the default.
    if ( $benko_color_menu === $default ) {
        return;
    }

    $css = '
		/* Custom  color title  */
		.menu-drawer #na-menu-primary ul.mega-menu > li > a,
		#na-menu-primary ul > li[class*="-has-children"] > a::before,
		.menu-drawer #na-menu-primary ul > li[class*="-has-children"] > a::before,
		.btn-mini-search, .na-cart .icon-cart,
		.benko_icon-bar,
        #na-menu-primary ul.mega-menu > li > a
		{
		    color:%1$s;
		}

	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_color_menu ) );
}
add_action( 'wp_enqueue_scripts', 'benko_color_menu', 27 );


function benko_body_background() {
    $default         = '';
    $benko_bg_body       = get_theme_mod('benko_bg_body',$default);

    // Don't do anything if the current color is the default.
    if ( $benko_bg_body === $default ) {
        return;
    }

    $css = '
		/* Custom  color title  */
		body,
		.sliders-column3 .box-large .entry-header,.sliders-column3 .box-small .entry-header,
		.post-grid-large .article-content
		{
		    background:%1$s;
		}

	';
    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_bg_body ) );
}
add_action( 'wp_enqueue_scripts', 'benko_body_background', 28 );

/**
 * Enqueues front-end CSS for the Primary  Color .
 *
 * @since benko
 *
 * @see wp_add_inline_style()
 */

function benko_primary_body() {
    $default         = '';
    $benko_primary_color       = get_theme_mod('benko_primary_body',$default);

    // Don't do anything if the current color is the default.
    if ( $benko_primary_color === $default ) {
        return;
    }

    $css = '
        .btn-outline .badge,
        .btn-inverse,
        .btn-inverse:hover, .btn-inverse:focus, .btn-inverse:active, .btn-inverse.active,
        .open .btn-inverse.dropdown-toggle,
        .btn-inverse.disabled, .btn-inverse.disabled:hover, .btn-inverse.disabled:focus, .btn-inverse.disabled:active, .btn-inverse.disabled.active, .btn-inverse[disabled], .btn-inverse[disabled]:hover, .btn-inverse[disabled]:focus, .btn-inverse[disabled]:active, .btn-inverse[disabled].active, fieldset[disabled] .btn-inverse, fieldset[disabled] .btn-inverse:hover, fieldset[disabled] .btn-inverse:focus, fieldset[disabled] .btn-inverse:active, fieldset[disabled] .btn-inverse.active,
        .btn-varian,
        .button:hover, .button:focus, .button:active, .button.active ,
        .open .button.dropdown-toggle,
        .button.single_add_to_cart_button:hover, .button.single_add_to_cart_button:focus, .button.single_add_to_cart_button:active, .button.single_add_to_cart_button.active ,
        .page-content .vc_btn3.vc_btn3-style-custom ,
        .page-content .vc_btn3.vc_btn3-style-custom:hover, .page-content .vc_btn3.vc_btn3-style-custom:focus, .page-content .vc_btn3.vc_btn3-style-custom:active, .page-content .vc_btn3.vc_btn3-style-custom.active ,
        .add_to_cart_button .badge, .button.product_type_simple .badge ,
        .added_to_cart .badge,
        #loadmore-button:hover,
        .yith-wcwl-wishlistexistsbrowse a:after ,
        .quick-view a ,
        .btn-checkout ,
        .btn-order,
        .slick-prev:hover,
        .slick-next:hover,
        .na-cart .icon-cart .mini-cart-items,
        #cart-panel-loader > *:before,
        #calendar_wrap #today ,
        .expand-icon:hover::after, .expand-icon:hover::before,
        .benko_icon:hover .benko_icon-bar,
        .scrollup:hover,
        .product-image.loading::before,
        .widget_layered_nav ul li.chosen > a:before, .widget_layered_nav_filters ul li.chosen > a:before,
        .widget_layered_nav ul li a:hover:before, .widget_layered_nav_filters ul li a:hover:before,
        .onsale,
        .list-view .add_to_cart_button,
        .list-view .add_to_cart_button:hover, .list-view .add_to_cart_button:focus,
        .product-detail-wrap .product-nav .fa:hover,
        .variations_form.cart .att_label:hover, .variations_form.cart .att_label.selected,
        .blog-recent-post .na-grid .bg_gradients > a ,
        .box-list .link-more a:hover,
        .post-format .ti-control-play:hover, .post-format .ti-camera:hover, .post-format .ti-headphone:hover, .post-format .ti-quote-left:hover,
        .tags a:hover,
        div.affect-border:before, div.affect-border:after,
        div.affect-border-inner:before,
        div.affect-border-inner:after,
        .nano > .nano-pane > .nano-slider,
        .btn-primary,.btn-primary:hover,
        .entry_pagination .page-numbers:hover i,
        .btn-variant:hover, .btn-variant:focus, .btn-variant:active, .btn-variant.active,
        .newsletters .btn-newsletter,
        .btn-read:hover,button, html input[type="button"], input[type="reset"], input[type="submit"],
        input[type="submit"]:hover,
        .sliders-column3 .box-large .entry-header::after,.sliders-column3 .box-small .entry-header::after,
        .post-grid-large .article-content::after,.widgettitle::after,
        blockquote:before
        {
            background-color: %1$s;
        }

        .link:hover,
        a:hover, a:focus,
        .tags-list a:hover, .tagcloud a:hover,
        .btn-outline,
        .btn-outline:hover, .btn-outline:focus, .btn-outline:active, .btn-outline.active,
        .open .btn-outline.dropdown-toggle,
        .btn-inverse .badge,
        .btn-variant .badge,
        .add_to_cart_button, .button.product_type_simple,
        .add_to_cart_button:hover, .add_to_cart_button:focus, .add_to_cart_button:active, .add_to_cart_button.active, .button.product_type_simple:hover, .button.product_type_simple:focus, .button.product_type_simple:active, .button.product_type_simple.active,
        .open .add_to_cart_button.dropdown-toggle, .open .button.product_type_simple.dropdown-toggle,
        .added_to_cart,
        .added_to_cart:hover, .added_to_cart:focus, .added_to_cart:active, .added_to_cart.active,
        .open .added_to_cart.dropdown-toggle,
        .nav-tabs > li.active > a ,
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus,
        .na-filter-wrap #na-filter .widget .na-ajax-load a:hover ,
        .na-filter-wrap .chosen,
        .na-filter-wrap .na-remove-attribute,
        .btn-mini-search:hover,
        #na-top-navbar #language-switch ul > li span:hover,
        #cart-panel-loader > *:before,
        .cart-header .close:hover ,
        .alert a,
        .share-links .count-share:hover ,
        .share-links .count-share i,
        #sb_instagram #sbi_load .fa, #sb_instagram .sbi_follow_btn .fa,
        .sidebar a:hover,
        .sidebar ul li.current-cat > a,
        .sidebar #recentcomments li > a,
        #na-footer .footer-bottom .coppy-right a:hover ,
        .page-cart .product-name a,
        .contact .fa,
        #benko-quickview .price,
        .product-image.loading::after,
        .product-image.loading::before ,
        .is-active > a,
        #benko-top-navbar a:hover, #benko-top-navbar a:focus ,
        #benko-top-navbar .topbar-left a:hover,
        #na-footer ul li a:hover ,
        .widget_layered_nav ul li.chosen, .widget_layered_nav_filters ul li.chosen,
        .widget_layered_nav ul li.chosen > a, .widget_layered_nav_filters ul li.chosen > a,
        .widget_layered_nav ul li:hover .count, .widget_layered_nav_filters ul li:hover .count ,
        .widget.recent_blog .entry-title a:hover,
        .name a:hover ,
        .price,
        .single-1 .box-article .post-cat a,
        .single-2 .box-article .post-cat a,
        .single-3 .box-article .post-cat a,
        .price ins,
        .list-view .price,
        .product-detail-wrap .price,
        .product-detail-wrap .product_meta > * span:hover, .product-detail-wrap .product_meta > * a:hover,
        .cart .quantity .input-group-addon:hover ,
        .sidebar .widget_tabs_post .widget-title li.active a,
        .sidebar .widget_tabs_post .widget-title li a:hover, .sidebar .widget_tabs_post .widget-title li a:focus, .sidebar .widget_tabs_post .widget-title li a:active ,
        .widget.about .benko-social-icon a:hover,
        .widget-product .group-title .link-cat:hover,
        .post-list .entry-header .posted-on a:hover,
        .post-list .author strong:hover,
        .box-list .name-category,
        .box-list .name-category > a,
        .post-cat ,
        .entry-title > a:hover,
        .entry-avatar .author-title,
        .entry-avatar .author-link,
        .post-comment .fa,
        #comments .text-user > a,
        .post-related .author-link:hover,
        .item-related .post-title > a:hover ,
        .entry_pagination .pagination .fa,
        .entry_pagination .pagination .page-numbers:hover .fa ,
        .entry_pagination .page-numbers i,
        .entry_pagination .page-numbers:hover ,
        .entry_pagination .page-numbers .btn-prev,
        .entry_pagination .page-numbers .btn-next,
        .entry-content a,
        .pagination .current,.post-list .article-meta a:hover,.pagination .nav-links a:hover,
        .post-grid .article-meta a:hover,
        #na-menu-primary ul > li.current-menu-item:hover > a, #na-menu-primary ul > li.current-menu-item:focus > a,
        #na-menu-primary ul > li.current-menu-item > a,
        #na-menu-primary ul > li > a:hover, #na-menu-primary ul > li > a:focus,
        #na-menu-primary ul > li.current-menu-item,
        #na-menu-primary ul.mega-menu > li > a:hover, #na-menu-primary ul.mega-menu > li > a:focus,
        #na-menu-primary ul > li:hover[class*="-has-children"] > a:before,
        #na-menu-primary ul > li > ul li[class*="-has-children"]:hover:after,
        .post-tran .entry-title a:hover,
        .post-tran .article-meta a:hover, .post-tran .article-meta .fa:hover,
        .box-videos .video-carousel .post-item:hover .entry-title > a,
        .byline:hover i,
        .posted-on:hover i,
        .slick-dots li button:hover, .slick-dots li button:focus,
        .box-videos .video-carousel .slick-dots li.slick-active button::before, .box-videos .video-carousel .slick-dots li:hover button::before,
        .slider-sidebar .entry-title:hover,.slider-sidebar:hover .entry-title,.article-meta a:hover,
        .post-cat a,.style_white #na-menu-primary ul > li.current-menu-item > a,
        .style_white.header-center #na-menu-primary ul > li.current-menu-item > a, .style_white .header-center #na-menu-primary ul > li.current-menu-item:focus > a,
        .box-sliders-half .slick-dots li button::before,.style_white .btn-mini-search:hover,
        .post-list .post-cat a
        {
          color: %1$s;
        }

       .btn-outline,
        .btn-outline:hover, .btn-outline:focus, .btn-outline:active, .btn-outline.active,
        .open .btn-outline.dropdown-toggle,
        .btn-outline.disabled, .btn-outline.disabled:hover, .btn-outline.disabled:focus, .btn-outline.disabled:active, .btn-outline.disabled.active, .btn-outline[disabled], .btn-outline[disabled]:hover, .btn-outline[disabled]:focus, .btn-outline[disabled]:active, .btn-outline[disabled].active, fieldset[disabled] .btn-outline, fieldset[disabled] .btn-outline:hover, fieldset[disabled] .btn-outline:focus, fieldset[disabled] .btn-outline:active, fieldset[disabled] .btn-outline.active,
        .btn-inverse,
        .btn-inverse:hover, .btn-inverse:focus, .btn-inverse:active, .btn-inverse.active,
        .open .btn-inverse.dropdown-toggle,
        .button:hover, .button:focus, .button:active, .button.active ,
        .open .button.dropdown-toggle,
        .form-control:focus,
        .searchform .form-control:focus,
        .page-links span.page-numbers:hover ,
        .list-view .add_to_cart_button,
        .list-view .add_to_cart_button:hover, .list-view .add_to_cart_button:focus,
        #loadmore-button:hover,
        .button.single_add_to_cart_button:hover, .button.single_add_to_cart_button:focus, .button.single_add_to_cart_button:active, .button.single_add_to_cart_button.active,
        .page-content .vc_btn3.vc_btn3-style-custom,
        .page-content .vc_btn3.vc_btn3-style-custom:hover, .page-content .vc_btn3.vc_btn3-style-custom:focus, .page-content .vc_btn3.vc_btn3-style-custom:active, .page-content .vc_btn3.vc_btn3-style-custom.active,
        .btn-checkout ,
        .btn-order,
        .product-block.border:hover ,
        .variations_form.cart .att_img:hover > img, .variations_form.cart .att_img.selected > img,
        .post-format .ti-control-play:hover, .post-format .ti-camera:hover, .post-format .ti-headphone:hover, .post-format .ti-quote-left:hover,
        blockquote,.btn-primary,
        .btn-variant:hover, .btn-variant:focus, .btn-variant:active, .btn-variant.active,
        .btn-read:hover,
        button, html input[type="button"], input[type="reset"], input[type="submit"],input[type="submit"]:hover,
        .search-transition-wrap .searchform .input-group
        {
          border-color: %1$s;
        }
        .entry-content a{
                box-shadow: 0 -2px 0 %1$s inset;
        }
        .button:hover{
            color:white;
        }

	';

    wp_add_inline_style( 'benko-style', sprintf( $css, $benko_primary_color ) );
}
add_action( 'wp_enqueue_scripts', 'benko_primary_body', 29 );
?>