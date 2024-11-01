<?php
/*
Plugin Name: Visual Editor
Description: Improves the use of the gutenberg editor 
Version: 1.0.5
Author: Roberto Bottalico
Author URI: https://4wp.it
License: GPLv2 or later
Text Domain: visual-editor-blocks
*/


if (!defined('ABSPATH')) {
    exit;
}

define( 'VISUAL_EDITOR_BLOCKS_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'VISUAL_EDITOR_BLOCKS_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'VISUAL_EDITOR_BLOCKS_VER', '1.0.3' );
define( 'VISUAL_EDITOR_BLOCKS_BASENAME', plugin_basename( __FILE__ ) );


add_action(
	'plugins_loaded',
	function () {
		// call this only if Gutenberg is active.
		if ( function_exists( 'register_block_type' ) ) {
			require_once dirname( __FILE__ ) . '/class-common-core-blocks-animation.php';

			if ( class_exists( '\VISUALEDIT\Animations\Visual_Editor_Blocks_Animation' ) ) {
				\VISUALEDIT\Animations\Visual_Editor_Blocks_Animation::instance();
			}
		}
	
	    if ( function_exists( 'register_block_type' ) ) {
			require_once dirname( __FILE__ ) . '/class-common-core-blocks-css.php';

			if ( class_exists( '\VISUALEDIT\CustomCss\Visual_Editor_Blocks_CSS' ) ) {
				\VISUALEDIT\CustomCss\Visual_Editor_Blocks_CSS::instance();
			}
		}
	}
);

require plugin_dir_path( __FILE__ ) . 'class-visual-editor-sidebar.php';

require_once plugin_dir_path( __FILE__ ) . 'class-common-core-blocks-extra.php';

if ( class_exists( 'VISUALEDIT\Extra\Visual_Editor_Blocks_Extra' ) ) {
	new \VISUALEDIT\Extra\Visual_Editor_Blocks_Extra();
};

require plugin_dir_path( __FILE__ ) . 'includes/class-visual-editor-blocks.php';

function run_visual_editor_blocks() {

	$plugin = new Visual_Editor_Blocks();
}

run_visual_editor_blocks();