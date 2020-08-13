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

	<header class="flex justify-between mt-8 md:mt-12 mb-8 sm:mb-12 md:mb-16 px-4 md:px-12 lg:pl-24 lg:pr-16">

		<div>
			<?php if ( has_custom_logo() ) { ?>

				<a href="<?php echo get_bloginfo( 'url' ); ?>">
					<?php the_custom_logo(); ?>
				</a>

			<?php } else { ?>

				<div class="text-lg uppercase">
					<a href="<?php echo get_bloginfo( 'url' ); ?>">
						<?php echo get_bloginfo( 'name' ); ?>
					</a>
				</div>

				<p class="text-sm font-bold text-gray-600">
					<?php echo get_bloginfo( 'description' ); ?>
				</p>

			<?php } ?>
		</div>

		<div class="md:hidden">
			<a href="#" id="primary-menu-toggle" class="bg-gray-700 border-b-3 border-gray-900 text-white uppercase tracking-wider font-semibold p-2">MENU</a>
		</div>

	</header>

	<div id="content" class="site-content md:flex pb-12">

		<?php do_action( 'tailpress_content_start' ); ?>

		<?php
			wp_nav_menu(
				array(
					'container_id'    => 'primary-menu',
					'container_class' => 'hidden md:block w-1/1 lg:w-1/5 leading-loose',
					'menu_class'      => 'border-r border-gray-200 px-8 py-4 md:py-0 mb-16 text-left md:text-right bg-gray-700 text-white md:bg-white md:text-gray-900 block',
					'theme_location'  => 'primary',
				)
			);
			?>

		<main class="flex-1 min-w-0 px-4 md:px-12 lg:pl-24 lg:pr-16">
