<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

<div class="container index py-5">
  <img class="mb-3"
    src="<?php echo THEME_THEMEROOT . '/assets/src/images/image.png';  ?>" />
  <h1>Theme Ready!</h1>
  <p>Edit index.php</p>
  <a href="<?php echo admin_url(); ?>"
    class="btn btn-primary mt-2">Admin Dashboard</a>
</div>

<?php get_footer();
