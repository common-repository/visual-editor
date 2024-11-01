<?php

add_action('init', function () {
    wp_enqueue_script('jquery-color');
    register_meta('user', '_ve_enable_guideline', array(
        'type'          => 'string',
        'single'        => true,
        'default'       => 'hover',
        'show_in_rest'  => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));

    register_meta('user', '_ve_show_name', array(
        'type'          => 'boolean',
        'single'        => true,
        'default'       => true,
        'show_in_rest'  => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));
	
	register_meta('user', '_ve_show_rightmouver', array(
        'type'          => 'boolean',
        'single'        => true,
        'default'       => false,
        'show_in_rest'  => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));

    register_meta('user', '_ve_show_blur', array(
        'type'          => 'boolean',
        'single'        => true,
        'default'       => false,
        'show_in_rest'  => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));
    
    register_meta('user', '_ve_color_guideline', array(
        'type'          => 'string',
        'single'        => true,
        'default'       => '#99119',
        'show_in_rest'  => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));
	
	register_meta('user', '_ve_color_mouver', array(
        'type'          => 'string',
        'single'        => true,
        'default'       => '#99119',
        'show_in_rest'  => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));


    register_meta('user', '_ve_style_guideline', array(
        'type'          => 'string',
        'single'        => true,
        'default'       => 'solid',
        'show_in_rest'  => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));
	
	register_meta('user', '_ve_toolbar_scale', array(
        'type'          => 'string',
        'single'        => true,
        'default'       => '1',
        'show_in_rest'  => true,
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        },
    ));
});

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script(
        'visual-editor-option',
        plugins_url('skin/show-guidelines-option.js', __FILE__),
        array('wp-data'),
        filemtime(dirname(__FILE__) . '/skin/show-guidelines-option.js')
    );

    wp_enqueue_script(
        'visual-editor-showname-option',
        plugins_url('skin/show-name-option.js', __FILE__),
        array('wp-data'),
        filemtime(dirname(__FILE__) . '/skin/show-name-option.js')
    );
    
	wp_enqueue_script(
        'visual-editor-showrightmouver-option',
        plugins_url('skin/show-rightmouver-option.js', __FILE__),
        array('wp-data'),
        filemtime(dirname(__FILE__) . '/skin/show-rightmouver-option.js')
    );
    
    wp_enqueue_script(
        'visual-editor-showblur-option',
        plugins_url('skin/show-blur-option.js', __FILE__),
        array('wp-data'),
        filemtime(dirname(__FILE__) . '/skin/show-blur-option.js')
    );

    wp_enqueue_script(
        'visual-editor-guideline-color-option',
        plugins_url('skin/show-guideline-color-option.js', __FILE__),
        array('wp-data'),
        filemtime(dirname(__FILE__) . '/skin/show-guideline-color-option.js')
    );
	
    wp_enqueue_script(
        'visual-editor-mouver-color-option',
        plugins_url('skin/show-mouver-color-option.js', __FILE__),
        array('wp-data'),
        filemtime(dirname(__FILE__) . '/skin/show-mouver-color-option.js')
    );

    wp_enqueue_script(
        'visual-editor-guideline-style-option',
        plugins_url('skin/show-guideline-style-option.js', __FILE__),
        array('wp-data'),
        filemtime(dirname(__FILE__) . '/skin/show-guideline-style-option.js')
    );
	
	wp_enqueue_script(
        'visual-editor-toolbar-scale-option',
        plugins_url('skin/show-toolbar-scale-option.js', __FILE__),
        array('wp-data'),
        filemtime(dirname(__FILE__) . '/skin/show-toolbar-scale-option.js')
    );

    wp_enqueue_script(
        'visual-editor-sidebar',
        plugins_url('sidebar.js', __FILE__),
        array('visual-editor-option', 'visual-editor-showname-option', 'visual-editor-guideline-color-option', 'wp-i18n', 'wp-blocks', 'wp-edit-post', 'wp-element', 'wp-editor', 'wp-components', 'wp-data', 'wp-plugins'),
        filemtime(dirname(__FILE__) . '/sidebar.js')
    );
	
	 wp_enqueue_script(
        'visual-editor-hidden-block',
        plugins_url( '/toolbar/duplicate-block.js', __FILE__ ),
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
    );
	
	wp_enqueue_script(
        'visual-editor-delete-block',
        plugins_url( '/toolbar/delete-block.js', __FILE__ ),
		array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor')
    );

    wp_enqueue_script(
        'visual-editor-icon',
        plugins_url('icon.js', __FILE__),
        array('wp-element'),
        filemtime(dirname(__FILE__) . '/icon.js')
    );
});

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('gird-style', plugin_dir_url(__FILE__) . "/block-editor.css", false, '1.0', 'all');
});




add_action('admin_enqueue_scripts', function () {
    wp_enqueue_script(
        'visualeditor-init',
        plugins_url('init.js', __FILE__),
        array('jquery'),
        filemtime(dirname(__FILE__) . '/init.js')
    );

    $current_user    = get_current_user_id();
    $show_name_block = get_user_meta($current_user, '_ve_show_name', true);
	$show_rightmouver_block = get_user_meta($current_user, '_ve_show_rightmouver', true);
	$show_blur_block = get_user_meta($current_user, '_ve_show_blur', true);
    $visualeditorOptions  = array(
        'show_guideline'    => get_user_meta($current_user, '_ve_enable_guideline', true),
        'show_name_block' => ($show_name_block) ? 'true' : 'false',
		'show_rightmouver_block' => ($show_rightmouver_block) ? 'true' : 'false',
        'show_blur_block' => ($show_blur_block) ? 'true' : 'false',
        'guideline_color'   => get_user_meta($current_user, '_ve_color_guideline', true),
		'mouver_color'   => get_user_meta($current_user, '_ve_color_mouver', true),
        'guideline_style'   => get_user_meta($current_user, '_ve_style_guideline', true),
		'toolbar_scale'   => get_user_meta($current_user, '_ve_toolbar_scale', true),
    );
    wp_localize_script('visualeditor-init', 'visualeditorUserOptions', $visualeditorOptions);
});

