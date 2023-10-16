<?php
/* Plugin Name: CL Web Pagespeed
* Plugin URI: http://cldigitaldesign.com
* Description: Plugin for testing code for Wordpress pagespeed optimization.
* Author: Charles Loehle
* Version: 1.5.50
* Author URI: http://cldigitaldesign.com
* Text Domain: clweb-pagespeed
* Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Run only on specified page
// function my_test_func() {
// 	$var = '<h1>This is the about us page!</h1>';

// 	if (is_page('about-us')) {
// 		print_r($var);
// 		var_dump(is_page('about-us'));
// 	}
// }
// add_action( 'wp','my_test_func' );

// Eliminate unused CSS
function my_dequeue_script(){
	wp_dequeue_style('wp-block-library');	
	wp_dequeue_style('hello-elementor-theme-style');
	wp_dequeue_style('hello-elementor');
}
add_action('wp_enqueue_scripts', 'my_dequeue_script', 99 );

// First Contentful Paint (FCP) and render blocking resources
function my_preload() {
	?>
		<!-- Eliminate render blocking CSS with preloading -->
		<!-- https://web.dev/defer-non-critical-css/ -->
		<link rel="preload" as="style" href="http://wilsonport-elementor.local/wp-content/cache/wpo-minify/1682098332/assets/wpo-minify-header-1acd49d9.min.css" onload="this.onload=null;this.rel='stylesheet'"/>
		<link rel="preload" as="style" href="http://wilsonport-elementor.local/wp-content/plugins/unlimited-elements-for-elementor/assets_libraries/font-awesome5/css/fontawesome-all.min.css" onload="this.onload=null;this.rel='stylesheet'"/>
		<link rel="preload" as="style" href="http://wilsonport-elementor.local/wp-content/plugins/unlimited-elements-for-elementor/assets_libraries/font-awesome5/css/fontawesome-v4-shims.css" onload="this.onload=null;this.rel='stylesheet'"/>
		<link rel="preload" as="style" href="http://wilsonport-elementor.local/wp-content/uploads/ac_assets/uc_flip_box_base/animations/ue-flipbox-styles.css" onload="this.onload=null;this.rel='stylesheet'"/>
		<link rel="preload" as="style" href="http://wilsonport-elementor.local/wp-content/plugins/elementor/assets/css/widget-icon-list.min.css" onload="this.onload=null;this.rel='stylesheet'"/>

		<!-- First Contentful Paint - preload hero image -->
		<!-- https://web.dev/preload-critical-assets/ -->
		<link rel="preload" as="image" href="http://wilsonport-elementor.local/wp-content/uploads/2022/04/truck-bg.jpg"/>

	<?php
}
add_action('wp_head', 'my_preload', 3 );
