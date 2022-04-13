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
get_header();

use Timber\Timber;

$context = Timber::context();

$context['title'] = 'Theme Ready!';
$context['paragraph'] = 'Edit index.php';
$context['button'] = 'Admin Dashboard';
$context['image'] = THEME_THEMEROOT . '/assets/src/images/image.png';
$context['adminUrl'] = admin_url();

Timber::render('index.twig', $context);

get_footer();
