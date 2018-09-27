<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php
	get_template_part('inc/section','slider');
	get_template_part('inc/section','feature-product');
	get_template_part('inc/section','about');
	get_template_part('inc/section','blog');
	get_template_part('inc/section','selling-system');
?>
<?php get_footer(); ?>
