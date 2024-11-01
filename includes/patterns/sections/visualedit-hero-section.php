<?php
/**
 * VISUALEDIT Templates.
 *
 */

return array(
	array(
		'type'       => 'section',
		'key'        => 'visualedit-hero-01-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-hero-section',
			'label'     => __( 'Hero', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:cover {"url":"http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/sergey-shmidt-koy6FlCCy5s-unsplash2.jpg","id":388,"dimRatio":80,"customOverlayColor":"#171717","minHeight":750,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:750px"><span aria-hidden="true" class="has-background-dim-80 wp-block-cover__gradient-background has-background-dim" style="background-color:#171717"></span><img class="wp-block-cover__image-background wp-image-388" alt="" src="http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/sergey-shmidt-koy6FlCCy5s-unsplash2.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:heading {"level":1,"style":{"color":{"text":"#ffffff"}},"className":"animated fadeInLeft"} -->
<h1 class="animated fadeInLeft has-text-color" style="color:#ffffff">This Is the Main Heading You Can Edit</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#d7d7d7"}},"className":"animated fadeInLeft delay-2s"} -->
<p class="animated fadeInLeft delay-2s has-text-color" style="color:#d7d7d7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"50px"}},"className":"animated fadeInLeft delay-4s slow"} -->
<div class="wp-block-button animated fadeInLeft delay-4s slow"><a class="wp-block-button__link" style="border-radius:50px">Call To Action</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->',
		'name'       => esc_html__( 'Hero 01', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
			esc_html__( 'Hero 01', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Hero-01.jpg',
	),//Hero 2
	array(
		'type'       => 'section',
		'key'        => 'visualedit-hero-02-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-hero-section',
			'label'     => __( 'Hero', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:cover {"url":"https://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/aniket-bhattacharya-CgyrwbE6Hm4-unsplash.jpg","id":390,"dimRatio":70,"customOverlayColor":"#171717","minHeight":750,"contentPosition":"center center","align":"full","className":"is-position-center-center"} -->
<div class="wp-block-cover alignfull is-position-center-center" style="min-height:750px"><span aria-hidden="true" class="has-background-dim-70 wp-block-cover__gradient-background has-background-dim" style="background-color:#171717"></span><img class="wp-block-cover__image-background wp-image-390" alt="" src="https://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/aniket-bhattacharya-CgyrwbE6Hm4-unsplash.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":4,"style":{"color":{"text":"#d7d7d7"}},"className":"animated backInRight"} -->
<h4 class="has-text-align-center animated backInRight has-text-color" style="color:#d7d7d7">Optional Subheading</h4>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":1,"style":{"color":{"text":"#ffffff"}},"className":"animated backInRight delay-500ms"} -->
<h1 class="has-text-align-center animated backInRight delay-500ms has-text-color" style="color:#ffffff">Main Heading You Can Edit</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#d7d7d7"}},"className":"animated backInRight delay-1s"} -->
<p class="has-text-align-center animated backInRight delay-1s has-text-color" style="color:#d7d7d7">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"animated slideInRight"} -->
<div class="wp-block-button animated slideInRight"><a class="wp-block-button__link">Call to action</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->
',
		'name'       => esc_html__( 'Hero 02', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
			esc_html__( 'Hero 02', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Hero-02.jpg',
	),//Contact 3
	array(
		'type'       => 'section',
		'key'        => 'visualedit-hero-03-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-hero-section',
			'label'     => __( 'Hero', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:cover {"url":"https://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/dhruv-dfal3sONbVg-unsplash-scaled.jpg","id":397,"dimRatio":0,"focalPoint":{"x":"0.52","y":"0.69"},"minHeight":499,"minHeightUnit":"px","isDark":false,"align":"full"} -->
<div class="wp-block-cover alignfull is-light" style="min-height:499px"><span aria-hidden="true" class="has-background-dim-0 wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-397" alt="" src="https://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/dhruv-dfal3sONbVg-unsplash-scaled.jpg" style="object-position:52% 69%" data-object-fit="cover" data-object-position="52% 69%"/><div class="wp-block-cover__inner-container"><!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:cover -->

<!-- wp:cover {"customOverlayColor":"#171717","align":"full"} -->
<div class="wp-block-cover alignfull"><span aria-hidden="true" class="has-background-dim-100 wp-block-cover__gradient-background has-background-dim" style="background-color:#171717"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":1,"style":{"color":{"text":"#ffffff"}}} -->
<h1 class="has-text-color" style="color:#ffffff">This is the Main Heading You Can Edit</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#d7d7d7"}}} -->
<p class="has-text-color" style="color:#d7d7d7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link">Call to Action</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->
',
		'name'       => esc_html__( 'Hero 03', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
			esc_html__( 'Hero 03', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Hero-03.jpg',
	),//Hero 4
	
	array(
		'type'       => 'section',
		'key'        => 'visualedit-hero-04-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-hero-section',
			'label'     => __( 'Hero', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:media-text {"align":"full","mediaId":400,"mediaLink":"https://demowebsite.4wp.it/hero/mohammad-amin-qsnfsvcdec4-unsplash/","mediaType":"image","mediaWidth":39,"verticalAlignment":"center","imageFill":false,"backgroundColor":"black"} -->
<div class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-center has-black-background-color has-background" style="grid-template-columns:39% auto"><figure class="wp-block-media-text__media"><img src="https://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/mohammad-amin-qsnfSvCdec4-unsplash-576x1024.jpg" alt="" class="wp-image-400 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:paragraph {"textColor":"white"} -->
<p class="has-white-color has-text-color">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, <br>consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"textColor":"white"} -->
<h4 class="has-white-color has-text-color">Supporting Subheading</h4>
<!-- /wp:heading -->

<!-- wp:heading {"level":1,"textColor":"white","className":"animated fadeInLeftBig"} -->
<h1 class="animated fadeInLeftBig has-white-color has-text-color">This Is the Main Heading <br>You Can Edit</h1>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"animated fadeInLeftBig delay-200ms"} -->
<div class="wp-block-button animated fadeInLeftBig delay-200ms"><a class="wp-block-button__link">Call To Action 1</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"white","textColor":"vivid-cyan-blue","className":"is-style-fill animated fadeInLeftBig delay-500ms"} -->
<div class="wp-block-button is-style-fill animated fadeInLeftBig delay-500ms"><a class="wp-block-button__link has-vivid-cyan-blue-color has-white-background-color has-text-color has-background">Call To Action 2</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:media-text -->',
		'name'       => esc_html__( 'Hero 04', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
			esc_html__( 'Hero 04', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Hero-04.jpg',
	),//Hero 5
array(
		'type'       => 'section',
		'key'        => 'visualedit-hero-05-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-hero-section',
			'label'     => __( 'Hero', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"13em","bottom":"13em"}},"color":{"gradient":"linear-gradient(135deg,rgb(6,147,227) 13%,rgb(155,81,224) 84%)"}},"textColor":"white"} -->
<div class="wp-block-group alignfull has-white-color has-text-color has-background" style="background:linear-gradient(135deg,rgb(6,147,227) 13%,rgb(155,81,224) 84%);padding-top:13em;padding-bottom:13em"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.2"}},"textColor":"theme-palette9"} -->
<h2 class="has-text-align-center has-theme-palette-9-color has-text-color" id="art-beaute" style="line-height:1.2">This Is the Main Heading </h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Writing that influences modern culture</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color" href="#0">Subscribe</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
		'name'       => esc_html__( 'Hero 05', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
			esc_html__( 'Hero 05', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Hero-05.jpg',
	),//Hero 6
array(
		'type'       => 'section',
		'key'        => 'visualedit-hero-06-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-hero-section',
			'label'     => __( 'Hero', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"13em","bottom":"13em"}},"color":{"gradient":"linear-gradient(150deg,rgba(255,255,255,0) 0%,rgba(255,255,255,0) 25%,rgb(34,34,34) 25%,rgb(232,29,29) 51%,rgb(17,17,17) 75%,rgba(255,255,255,0) 75%,rgba(248,213,165,0) 100%)"}},"textColor":"white"} -->
<div class="wp-block-group alignfull has-white-color has-text-color has-background" style="background:linear-gradient(150deg,rgba(255,255,255,0) 0%,rgba(255,255,255,0) 25%,rgb(34,34,34) 25%,rgb(232,29,29) 51%,rgb(17,17,17) 75%,rgba(255,255,255,0) 75%,rgba(248,213,165,0) 100%);padding-top:13em;padding-bottom:13em"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.2"}},"textColor":"theme-palette9"} -->
<h2 class="has-text-align-center has-theme-palette-9-color has-text-color" id="art-beaute" style="line-height:1.2">This Is the Main Heading </h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Writing that influences modern culture</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color" href="#0">Subscribe</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
		'name'       => esc_html__( 'Hero 06', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Hero', 'visual-editor-blocks' ),
			esc_html__( 'Hero 06', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Hero-06.jpg',
	),
);