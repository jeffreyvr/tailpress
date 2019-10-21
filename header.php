<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="max-w-xl md:max-w-4xl mx-auto">

    <?php do_action( 'tailpress_header' ); ?>

    <header class="mt-8 md:mt-12 mb-8 sm:mb-12 md:mb-16">

        <?php if ( has_custom_logo() ) { ?>

            <?php the_custom_logo(); ?>

        <?php } else { ?>

            <div class="text-lg uppercase">
                <?php echo get_bloginfo('name'); ?>
            </div>

            <p class="text-sm font-bold text-gray-600">
                <?php echo get_bloginfo('description'); ?>
            </p>

        <?php } ?>

    </header>

    <div id="content" class="site-content">

        <?php do_action( 'tailpress_content_start' ); ?>