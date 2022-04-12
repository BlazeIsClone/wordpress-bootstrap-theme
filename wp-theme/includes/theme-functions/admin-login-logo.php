<?php

/**
 * Custom admin login logo
 */
if (function_exists('get_field') && get_field('theme_header_logo', 'option')) {
    function custom_login_logo()
    {
        ?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url(<?php echo get_field('theme_header_logo', 'option')[
        'url'
    ]; ?>);
				background-size: 200px;
				width: unset;
			}
		</style>

<?php
    }
    add_action('login_enqueue_scripts', 'custom_login_logo');
}
