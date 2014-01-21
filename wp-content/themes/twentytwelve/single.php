<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
	<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="description" content="湖南省工业设计协会" />
        <meta name="keywords" content="工业设计协会，湖南省工业设计协会" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/single.css"/>
        <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/jquery-1.10.2.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/HNID.UIManager.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/googleAnalytics.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/index.js"></script>
        <title><?php wp_title("|",true,"right"); ?></title>
    </head>
    <!--头部-->
    <?php get_header(); ?>
    <div id="primary" class="site-content">
        <div id="content" role="main">

            <?php while (have_posts()) : the_post(); ?>

            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>

                <p class="entry-date" datetime="2013-03-08T16:35:20+00:00"><?php the_date(); ?></p>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <?php echo get_the_tag_list('<ul class="entry-tags"><li>', '</li><li>', '</li></ul>'); ?>

            <nav class="nav-single">
                <h3 class="assistive-text"><?php _e('Post navigation', 'twentytwelve'); ?></h3>
                <span class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'twentytwelve') . '</span> %title'); ?></span>
                <span class="nav-next"><?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'twentytwelve') . '</span>'); ?></span>
            </nav>

            <?php endwhile; // end of the loop. ?>
        </div>
        <!-- #content -->
    </div>
    <!-- #primary -->
    <?php /*?><?php get_sidebar(); ?><?php */?>
	<?php get_footer(); ?>