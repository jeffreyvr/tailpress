<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header>

		<div class="lg:flex lg:justify-between lg:items-center mx-auto container border-b py-8">
			<div class="flex justify-between">
				<div>
					<?php if ( has_custom_logo() ) { ?>
						<a href="<?php echo get_bloginfo( 'url' ); ?>">
							<?php the_custom_logo(); ?>
						</a>

					<?php } else { ?>
						<div class="text-lg uppercase">
							<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-lg uppercase">
								<?php echo get_bloginfo( 'name' ); ?>
							</a>
						</div>

						<p class="text-sm font-light text-gray-600">
							<?php echo get_bloginfo( 'description' ); ?>
						</p>

					<?php } ?>
				</div>

				<div class="lg:hidden">
					<a href="#" id="primary-menu-toggle" class="bg-gray-700 border-b-3 border-gray-900 text-white uppercase font-semibold p-2">MENU</a>
				</div>
			</div>

			<?php
				wp_nav_menu(
					array(
						'container_id'    => 'primary-menu',
						'container_class' => 'hidden lg:block',
						'menu_class'      => 'lg:flex lg:-mx-4',
						'theme_location'  => 'primary',
						'li_class'        => 'lg:mx-4',
						'fallback_cb'     => false,
					)
				);
				?>
		</div>

	</header>

	<div id="content" class="site-content flex-grow">

		<!-- Start introduction -->
		<?php if ( is_front_page() ) : ?>
		<div class="container mx-auto my-12 border-b pb-12">
			<h1 class="font-bold text-lg text-secondary uppercase">TailPress</h1>
			<h2 class="text-7xl tracking-tight font-extrabold my-4">Rapidly build your WordPress theme with <a href="https://tailwindcss.com" class="text-primary">TailwindCSS</a> and <a href="https://laravel-mix.com" class="text-primary">Laravel Mix</a>.</h2>
			<p class="max-w-screen-lg text-gray-700 text-lg sm:text-2xl sm:leading-10 font-medium mb-10 sm:mb-11">TailPress is your go-to starting point for developing WordPress themes with TailwindCSS and comes with basic block-editor support out of the box.</p>
			<a href="https://github.com/jeffreyvr/tailpress" class="w-full sm:w-auto flex-none bg-gray-900 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200">View on Github</a>
		</div>
		<!-- End introduction -->
		<?php endif; ?>

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
