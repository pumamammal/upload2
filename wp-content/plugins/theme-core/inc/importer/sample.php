<?php
/**
 * the file for using in ovez theme
 */
add_filter( 'soo_demo_packages', function() {
    $settings=array(
		array(
			'name'       => 'Benko',
            'preview'    => NANO_PLUGIN_URL.'inc/importer/data/main-home.jpg',
			'content'    => NANO_PLUGIN_URL.'inc/importer/data/demo-content.xml',
			'customizer' => NANO_PLUGIN_URL.'inc/importer/data/customizer.dat',
			'widgets'    => NANO_PLUGIN_URL.'inc/importer/data/widgets.wie',
			'pages'      => array(
				'front_page' => 'Home 1',
				'blog'       => 'Blog',
			),
			'menus'      => array(
				'primary_navigation'    => 'primary-navigation',
			)
		),
	);
    return $settings;
} );
?>