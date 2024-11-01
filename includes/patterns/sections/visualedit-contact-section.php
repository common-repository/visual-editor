<?php
/**
 * VISUALEDIT Templates.
 *
 */

return array(
	array(
		'type'       => 'section',
		'key'        => 'visualedit-contact-01-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-contact-section',
			'label'     => __( 'Contact', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:group {"paragraphAttribute":"custom"} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="has-text-align-center">Block tagline</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"padding":{"top":"50px","right":"50px","bottom":"50px","left":"50px"}}},"backgroundColor":"theme-palette7"} -->
<div class="wp-block-columns has-theme-palette-7-background-color has-background" style="padding-top:50px;padding-right:50px;padding-bottom:50px;padding-left:50px"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading -->
<h2 class="">General Inquiries</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">4696 Simpson Avenue, Brockport, USA<br>+717-972-7844<br><a href="mailto:hello@company.com">hello@company.com</a> </p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="">Press &amp; Media</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">Please contact our Press Team at:<br><a href="mailto:press@company.com">press@company.com</a> </p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="">Connect on Social Media</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">You can connect with our company on social media.</p>
<!-- /wp:paragraph -->

<!-- wp:social-links -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"https://www.facebook.com/#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:code -->
<pre class="wp-block-code"><code><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d55129.13489533154!2d-97.7418918037632!3d30.277804241531342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sde!4v1633608546376!5m2!1sen!2sde" style="border:0;" allowfullscreen="" loading="lazy" width="600" height="450"></iframe></code></pre>
<!-- /wp:code --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
		'name'       => esc_html__( 'Contact 01', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Contact', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Contact', 'visual-editor-blocks' ),
			esc_html__( 'Contact 01', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Contact-01.jpg',
	),//Contact 2
	array(
		'type'       => 'section',
		'key'        => 'visualedit-contact-02-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-contact-section',
			'label'     => __( 'Contact', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:cover {"customOverlayColor":"#f5f5f5","isDark":false,"align":"full"} -->
<div class="wp-block-cover alignfull is-light"><span aria-hidden="true" class="has-background-dim-100 wp-block-cover__gradient-background has-background-dim" style="background-color:#f5f5f5"></span><div class="wp-block-cover__inner-container"><!-- wp:image {"align":"wide","sizeSlug":"large"} -->
<figure class="wp-block-image alignwide size-large"><img src="http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/contact1.jpg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":5,"style":{"typography":{"fontSize":44}}} -->
<h5 class="" style="font-size:44px"><strong>NY</strong></h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">25 E 77th St, New York, NY 10075, United States</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="">1 234 567 890</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":5,"style":{"typography":{"fontSize":44}}} -->
<h5 class="" style="font-size:44px"><strong>SYDN</strong></h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">18-40 Anderson St, Paramatta NSW 2150, Australia</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="">1 234 567 890</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":5,"style":{"typography":{"fontSize":44}}} -->
<h5 class="" style="font-size:44px"><strong>UAE</strong></h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">C39 Dubai Production City - Dubai - United Arab Emirates</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="">1 234 567 890</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":5,"style":{"typography":{"fontSize":44}}} -->
<h5 class="" style="font-size:44px"><strong>LNDN</strong></h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">10 Bridge St, Westminster, London SW1A 2JR, United Kingdom</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="">1 234 567 890</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->
',
		'name'       => esc_html__( 'Contact 02', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Contact', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Contact', 'visual-editor-blocks' ),
			esc_html__( 'Contact 02', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Contact-02.jpg',
	),//Contact 3
	array(
		'type'       => 'section',
		'key'        => 'visualedit-contact-03-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-contact-section',
			'label'     => __( 'Contact', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:group {"className":"bbp-pattern bbp-pattern-general-contact-2","paragraphAttribute":"custom"} -->
<div class="wp-block-group bbp-pattern bbp-pattern-general-contact-2"><!-- wp:heading {"textAlign":"center","className":"bbp-pattern__title"} -->
<h2 class="has-text-align-center bbp-pattern__title">Block tagline</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"bbp-pattern__description"} -->
<p class="has-text-align-center bbp-pattern__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"padding":{"top":"50px","right":"50px","bottom":"50px","left":"50px"}}},"url":"http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/feature1.jpg","id":324,"backgroundSize":"cover","borderRadius":30} -->
<div class="wp-block-columns has-backgrond-image has-no-repete" style="border-radius:30px;background-image:url(http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/feature1.jpg);background-size:cover;padding-top:50px;padding-right:50px;padding-bottom:50px;padding-left:50px"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"textColor":"theme-palette9","className":"bbp-column__title is-style-hd-underline"} -->
<h2 class="bbp-column__title is-style-hd-underline has-theme-palette-9-color has-text-color">General Inquiries</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"theme-palette9","className":"bbp-column__excerpt"} -->
<p class="bbp-column__excerpt has-theme-palette-9-color has-text-color">4696 Simpson Avenue, Brockport, USA<br>+717-972-7844</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"theme-palette7"} -->
<p class="has-theme-palette-7-color has-text-color"><strong><a href="mailto:hello@company.com">hello@company.com</a></strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"theme-palette9","className":"bbp-column__subtitle is-style-hd-underline"} -->
<h3 class="bbp-column__subtitle is-style-hd-underline has-theme-palette-9-color has-text-color">Press &amp; Media</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"theme-palette9"} -->
<p class="has-theme-palette-9-color has-text-color">Please contact our Press Team at:<br><strong><a href="mailto:press@company.com">press@company.com</a> </strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"theme-palette9","className":"bbp-column__subtitle is-style-hd-underline"} -->
<h3 class="bbp-column__subtitle is-style-hd-underline has-theme-palette-9-color has-text-color">Connect on Social Media</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"theme-palette9"} -->
<p class="has-theme-palette-9-color has-text-color">You can connect with our company on social media.</p>
<!-- /wp:paragraph -->

<!-- wp:social-links -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"https://www.facebook.com/#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:code -->
<pre class="wp-block-code"><code><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d55129.13489533154!2d-97.7418918037632!3d30.277804241531342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sde!4v1633608546376!5m2!1sen!2sde" style="border:0;" allowfullscreen="" loading="lazy" width="600" height="450"></iframe></code></pre>
<!-- /wp:code --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
',
		'name'       => esc_html__( 'Contact 03', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Contact', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Contact', 'visual-editor-blocks' ),
			esc_html__( 'Contact 03', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Contact-03.jpg',
	),//Contact 4
	
	array(
		'type'       => 'section',
		'key'        => 'visualedit-contact-04-cb-section',
		'collection' => array(
			'slug'      => 'visualedit-contact-section',
			'label'     => __( 'Contact', 'visual-editor-blocks' ),
		),
		'content'    => '<!-- wp:cover {"url":"http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/services-bg-1.jpg","id":316,"dimRatio":70,"align":"full"} -->
<div class="wp-block-cover alignfull"><span aria-hidden="true" class="has-background-dim-70 wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-316" alt="" src="http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/services-bg-1.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"bottom","align":"wide","paddingSlug":"large"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-bottom is-padding-large"><!-- wp:column {"verticalAlignment":"bottom"} -->
<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:heading -->
<h2 class="">Contact Us</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">It elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4 class="">Washington DC</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">16 Pennsylvania, Washington, DC 20500<br>contact@example.com<br>+1 234 567 890</p>
<!-- /wp:paragraph -->

<!-- wp:image {"width":450,"height":248,"sizeSlug":"large","className":"animated fadeIn"} -->
<figure class="wp-block-image size-large is-resized animated fadeIn"><img src="http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/dc-office-1.jpg" alt="" width="450" height="248"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom"} -->
<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:heading {"level":4} -->
<h4 class="">New York</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">23 Schenecy Ave, Brooklyn, NY 11213<br>contact@example.com<br>+1 234 567 890</p>
<!-- /wp:paragraph -->

<!-- wp:image {"width":450,"height":248,"sizeSlug":"large","className":"animated fadeIn delay-200ms"} -->
<figure class="wp-block-image size-large is-resized animated fadeIn delay-200ms"><img src="http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/ny-office-1.jpg" alt="" width="450" height="248"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom"} -->
<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:code {"className":"animated fadeIn delay-500ms"} -->
<pre class="wp-block-code animated fadeIn delay-500ms"><code><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12103.303956555927!2d-73.94039993127441!3d40.677802893666076!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25c79d4b868bd%3A0x6938ae0d0b05f06a!2s23%20Schenectady%20Ave%2C%20Brooklyn%2C%20NY%2011213!5e0!3m2!1sen!2sus!4v1591071570401!5m2!1sen!2sus" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" width="100%" height="500" frameborder="0"></iframe></code></pre>
<!-- /wp:code --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->',
		'name'       => esc_html__( 'Contact 04', 'visual-editor-blocks' ),
		'category'   => array(
			esc_html__( 'Contact', 'visual-editor-blocks' ),
		),
		'keywords'   => array(
			esc_html__( 'Contact', 'visual-editor-blocks' ),
			esc_html__( 'Contact 04', 'visual-editor-blocks' ),
			esc_html__( 'Business', 'visual-editor-blocks' ),
		),
		'image'      => 'http://demowebsite.4wp.it/wp-content/uploads/sites/32/2022/03/Contact-04.jpg',
	),
);