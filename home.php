<?php
/**
 * Clean & Professional Homepage
 *
 * @package TradeSphare
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$hero_title = get_theme_mod(
	'trade_sphare_hero_title',
	__( 'Welcome to Your Website', 'trade-sphare' )
);

$hero_description = get_theme_mod(
	'trade_sphare_hero_description',
	__(
		'A clean and professional space to share ideas, publish content, and build your online presence.',
		'trade-sphare'
	)
);

$show_features = get_theme_mod(
	'trade_sphare_show_features',
	true
);

$show_blog = get_theme_mod(
	'trade_sphare_show_blog',
	true
);

$show_cta = get_theme_mod(
	'trade_sphare_show_cta',
	true
);
?>

<main id="primary" class="ts-site-main ts-homepage">

	<!-- =====================================================
	     HERO
	====================================================== -->

	<section class="ts-home-hero">
		<div class="ts-container">

			<div class="ts-home-hero-content">

				<span class="ts-home-eyebrow">
					<?php esc_html_e( 'Welcome', 'trade-sphare' ); ?>
				</span>

				<h1 class="ts-home-title">
					<?php echo esc_html( $hero_title ); ?>
				</h1>

				<p class="ts-home-description">
					<?php echo esc_html( $hero_description ); ?>
				</p>

				<div class="ts-home-actions">

					<?php if ( $show_blog ) : ?>

						<a
							class="ts-button"
							href="#latest-posts"
						>
							<?php esc_html_e( 'Explore Content', 'trade-sphare' ); ?>
						</a>

					<?php endif; ?>

					<?php if ( $show_features ) : ?>

						<a
							class="ts-button ts-button-outline"
							href="#features"
						>
							<?php esc_html_e( 'Discover More', 'trade-sphare' ); ?>
						</a>

					<?php endif; ?>

				</div>

			</div>

		</div>
	</section>

	<?php if ( $show_features ) : ?>

		<!-- =====================================================
		     FEATURES
		====================================================== -->

		<section
			id="features"
			class="ts-home-features"
			aria-labelledby="ts-features-title"
		>

			<div class="ts-container">

				<div class="ts-section-heading">

					<div>

						<span class="ts-home-eyebrow">
							<?php esc_html_e( 'Built for the Web', 'trade-sphare' ); ?>
						</span>

						<h2 id="ts-features-title">
							<?php esc_html_e( 'Everything You Need for a Professional Website', 'trade-sphare' ); ?>
						</h2>

					</div>

				</div>

				<div class="ts-feature-grid">

					<article class="ts-feature-card">

						<h3>
							<?php esc_html_e( 'Clean Design', 'trade-sphare' ); ?>
						</h3>

						<p>
							<?php esc_html_e( 'A modern and focused design that keeps your content clear, readable, and easy to explore.', 'trade-sphare' ); ?>
						</p>

					</article>

					<article class="ts-feature-card">

						<h3>
							<?php esc_html_e( 'Fully Responsive', 'trade-sphare' ); ?>
						</h3>

						<p>
							<?php esc_html_e( 'A consistent experience across desktops, tablets, and mobile devices.', 'trade-sphare' ); ?>
						</p>

					</article>

					<article class="ts-feature-card">

						<h3>
							<?php esc_html_e( 'Easy to Customize', 'trade-sphare' ); ?>
						</h3>

						<p>
							<?php esc_html_e( 'Flexible layouts and simple structure make it easy to adapt the website to your needs.', 'trade-sphare' ); ?>
						</p>

					</article>

					<article class="ts-feature-card">

						<h3>
							<?php esc_html_e( 'Content Focused', 'trade-sphare' ); ?>
						</h3>

						<p>
							<?php esc_html_e( 'Designed to present articles, pages, ideas, and important information in a clear way.', 'trade-sphare' ); ?>
						</p>

					</article>

					<article class="ts-feature-card">

						<h3>
							<?php esc_html_e( 'WordPress Ready', 'trade-sphare' ); ?>
						</h3>

						<p>
							<?php esc_html_e( 'Built around WordPress standards and ready for websites, blogs, projects, and personal sites.', 'trade-sphare' ); ?>
						</p>

					</article>

					<article class="ts-feature-card">

						<h3>
							<?php esc_html_e( 'RTL Support', 'trade-sphare' ); ?>
						</h3>

						<p>
							<?php esc_html_e( 'Built-in support for right-to-left languages while maintaining a clean English experience.', 'trade-sphare' ); ?>
						</p>

					</article>

				</div>

			</div>
		</section>

	<?php endif; ?>

	<?php if ( $show_blog ) : ?>

		<!-- =====================================================
		     LATEST POSTS
		====================================================== -->

		<section
			id="latest-posts"
			class="ts-home-blog"
			aria-labelledby="ts-blog-title"
		>

			<div class="ts-container">

				<div class="ts-section-heading">

					<div>

						<span class="ts-home-eyebrow">
							<?php esc_html_e( 'From the Blog', 'trade-sphare' ); ?>
						</span>

						<h2 id="ts-blog-title">
							<?php esc_html_e( 'Latest Articles', 'trade-sphare' ); ?>
						</h2>

					</div>

					<?php
					$posts_page_id = (int) get_option( 'page_for_posts' );

					if ( $posts_page_id ) :
						?>

						<a
							class="ts-text-link"
							href="<?php echo esc_url( get_permalink( $posts_page_id ) ); ?>"
						>
							<?php esc_html_e( 'View All Articles', 'trade-sphare' ); ?>
						</a>

					<?php endif; ?>

				</div>

				<div class="ts-home-post-grid">

					<?php
					$latest_posts = new WP_Query(
						array(
							'post_type'           => 'post',
							'post_status'         => 'publish',
							'posts_per_page'      => 3,
							'ignore_sticky_posts' => true,
							'no_found_rows'       => true,
						)
					);
					?>

					<?php if ( $latest_posts->have_posts() ) : ?>

						<?php while ( $latest_posts->have_posts() ) : ?>

							<?php $latest_posts->the_post(); ?>

							<article
								id="post-<?php the_ID(); ?>"
								<?php post_class( 'ts-home-post-card' ); ?>
							>

								<?php if ( has_post_thumbnail() ) : ?>

									<a
										class="ts-home-post-image"
										href="<?php the_permalink(); ?>"
										aria-label="<?php echo esc_attr( get_the_title() ); ?>"
									>

										<?php
										the_post_thumbnail(
											'trade-sphare-card',
											array(
												'loading' => 'lazy',
											)
										);
										?>

									</a>

								<?php endif; ?>

								<div class="ts-home-post-content">

									<div class="ts-post-meta">

										<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
											<?php echo esc_html( get_the_date() ); ?>
										</time>

									</div>

									<h3 class="ts-post-title">

										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>

									</h3>

									<p class="ts-post-excerpt">

										<?php
										echo esc_html(
											wp_trim_words(
												wp_strip_all_tags(
													get_the_excerpt()
												),
												22,
												'…'
											)
										);
										?>

									</p>

									<a
										class="ts-text-link"
										href="<?php the_permalink(); ?>"
										aria-label="<?php echo esc_attr( sprintf( __( 'Read: %s', 'trade-sphare' ), get_the_title() ) ); ?>"
									>
										<?php esc_html_e( 'Read Article →', 'trade-sphare' ); ?>
									</a>

								</div>

							</article>

						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					<?php else : ?>

						<div class="ts-home-empty">

							<p>
								<?php esc_html_e( 'No articles have been published yet.', 'trade-sphare' ); ?>
							</p>

						</div>

					<?php endif; ?>

				</div>

			</div>
		</section>

	<?php endif; ?>

	<?php if ( $show_cta ) : ?>

		<!-- =====================================================
		     CTA
		====================================================== -->

		<section class="ts-home-cta">

			<div class="ts-container">

				<div class="ts-home-cta-box">

					<div>

						<span class="ts-home-eyebrow">
							<?php esc_html_e( 'Get Started', 'trade-sphare' ); ?>
						</span>

						<h2>
							<?php esc_html_e( 'Build Something Great', 'trade-sphare' ); ?>
						</h2>

						<p>
							<?php esc_html_e( 'Create a website that reflects your ideas, content, and unique identity.', 'trade-sphare' ); ?>
						</p>

					</div>

					<div class="ts-home-actions">

						<?php if ( $show_blog ) : ?>

							<a
								class="ts-button"
								href="#latest-posts"
							>
								<?php esc_html_e( 'Explore the Website', 'trade-sphare' ); ?>
							</a>

						<?php else : ?>

							<a
								class="ts-button"
								href="<?php echo esc_url( home_url( '/' ) ); ?>"
							>
								<?php esc_html_e( 'Explore the Website', 'trade-sphare' ); ?>
							</a>

						<?php endif; ?>

					</div>

				</div>

			</div>
		</section>

	<?php endif; ?>

</main>

<?php
get_footer();
?>